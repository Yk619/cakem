@extends('layouts.inner')

@section('content')

    <!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Orders</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Orders</a></li>
    <li class="active">List</li>
  </ol>
</section>

<section class="content">
  <!--<form action="{{ route('orders') }}" method="GET" id="limitForm" autocomplete="off">
      <div class="form-group input-group col-md-4 pull-right">
         <input type="text" class="form-control" name="searchkey" placeholder="Search for..." value="{{ isset($searchkey) ? $searchkey : '' }}">
         <span class="input-group-btn">
         <button class="btn btn-secondary" type="submit">Search</button>
         </span>
      </div>
      <div id="div" class="form-group">
         <select name="limit" id="myselect">
         <option value="1" {{ ($limit == 1) ? 'selected' : '' }}>1</option>
         <option value="10" {{ ($limit == 10) ? 'selected' : '' }}>10</option>
         <option value="20" {{ ($limit == 20) ? 'selected' : '' }}>20</option>
         <option value="50" {{ ($limit == 50) ? 'selected' : '' }}>50</option>
         </select>
      </div>
   </form>--> 
  <div class="row">
     @if(Session::has('success_msg'))
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 "> 
          <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
        </div>
      @endif
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Order List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th>Order Number</th>
              <th>Cake Name</th>
              <th>Mobile</th>
              <th>Name On Cake</th> 
              <th>size</th>
            </tr>
            <?php $i ='';
                $i = $orders->perPage() * ($orders->currentPage() - 1);
                $i = $i+1;
              ?>                   
            @if($orders && count($orders)>0)  
              @foreach($orders as $key => $order)                   
                <tr>
              <td>{{ $order->id }}</td>
              <td>{{ $order->cake->name }}</td>
              <td>{{ $order->mobile }}</td> 
              <td>{{ $order->name_on_cake}}</td>
              <td>{{ $order->size }}</td>
              <td>{{ $order->total }}</td>  
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

         {{ $orders->appends(['limit' => $limit,'status' => $status])->links() }}
        </div>
      </div>
      
    </div>
  </div>
</section>
  
@endsection