@extends('layouts.inner')
@section('content')

<section class="content">
   <div class="row">
      @if(Session::has('success_msg'))
      <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-sm-12 col-xs-12">
         <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
      </div>
      @endif
      <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-sm-12 col-xs-12">
         <div class="box">
            <div class="box-header with-border">
               <h3 class="box-title">Cake List</h3>
               <a class="breadcrumb" href="{{route('cake.form')}}" style="float: right;">Add New</a>
            </div>
               
            <!-- /.box-header -->
            <div class="box-body">
               <table class="table table-bordered">
                  <tr>
                     <th style="width: 10px">#</th>
                     <th>name</th>
                     <th>price</th>
                     <th>quantity</th>
                     <th>type</th>
                     <th>weight</th>
                     <th style="width: 150px">Action</th>
                  </tr>
                  <?php $i ='';
                     $i = $cakes->perPage() * ($cakes->currentPage() - 1);
                     $i = $i+1;
                     ?>                   
                  @if($cakes && count($cakes)>0)  
                  @foreach($cakes as $key => $cake)                   
                  <tr>
                     <th><img src="{{env('APP_URI').'/storage/app/'.$cake->image}}" alt="Logo" style="width: 40px;"> </th>
                     <th>{{ $cake->name}} </th>
                     <th>{{ $cake->price}} </th>
                     <th>{{ $cake->quantity}} </th>
                     <th>{{ $cake->type}} </th>
                     <th>{{ $cake->weight}} </th>
                     <td>
                        <a href="{{ route('cake.show', $cake->id) }}" class="mr-2 btn-sm btn-info" title="Show Product"><i class = "fa fa-eye"></i></a>
                        <a href="{{ route('cake.form', $cake->id) }}" class="mr-2 btn-sm btn-info" title="Assign Product"><i class = "fa fa-edit"></i></a>
                        <a href="{{ route('cake.delete', $cake->id) }}" class="mr-2 btn-sm btn-info" title="Requested Product"><i class = "fa fa-trash"></i></a>
                     </td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                     <td colspan="4">No entries found.</td>
                  </tr>
                  @endif
               </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
               {{ $cakes->appends(['limit' => $limit,'status' => $status])->links() }}
            </div>
         </div>
      </div>
   </div>
</section>
@endsection