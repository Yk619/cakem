<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
   <div class="row">
      <div class="col-md-12">
             @foreach($form as $key => $one) 
            <div>
               @if($one->field_type == ('header'))
               <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-sm-12 col-xs-12">
                        <h1>{{ $one->label }}<h1>
               </div>
               @endif  
               @if($one->field_type == ('paragraph'))  
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-sm-12 col-xs-12">
                        <p>{{ $one->label }}</p>
               </div>
               @endif 
               @endforeach 
               @foreach($reports as $key => $report) 
               @if($report->field_type == ('number') || $report->field_type == ('date') || $report->field_type == ('radio') || $report->field_type == ('checkbox') || $report->field_type == ('select') || $report->field_type == ('textbox')  && count($reports)>0)  
               <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-sm-12 col-xs-12">
                  <label for="passport_no">{{ $report->field->field_type }}</label>
                  <input type="text" name="passport_no" id="passport_no" value="{{ $report->value }}" class="form-control" style="border-radius: 5px;"  placeholder="Passport No" disabled>              
               </div>
               @endif 
               @if($report->field_type == ('signature') && count($reports)>0)
               @if(!empty($report->file) && isset($report->file))
                <div class="col-xs-12 col-sm-12 col-md-12">
               <label>{{ $report->field->field_type }}</label><br><br>
                <div class="form-group">
                <img src="{{ $_SERVER["DOCUMENT_ROOT"].'/Trackbot/storage/app/'.$report->file->file_name }}" width="100" height="100">
                </div>
                @else
                <div class="form-group">
                 <img src="{{ asset('assets/img/default_avatar.jpeg') }}" id="pop" width="100" height="100" style="border-radius: 50%;">
                </div>
            </div>
               @endif
               @endif 
            </div>       
   
            @endforeach
      
         <!--/box-->
      </div>
      <!--<div class="col-md-12">
         <div class="col-md-6">1</div>
         <div class="col-md-6">2</div>
      </div>-->
      <!--12-->
   </div>
   <!--/row-->
</div>
</body>
</html>
