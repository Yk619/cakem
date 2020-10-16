@extends('layouts.inner')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Dashboard</h1>

        <small>Control panel</small>
        <h1 class="pull-right"><form action="{{route('dashboard')}}" method="GET" id="limitForm">
              <select name="sales" id="myselect">
              <option value="today" {{ ($sales == 'today') ? 'selected' : '' }}>Today</option>
              <option value="weekly" {{ ($sales == 'weekly') ? 'selected' : '' }}>Week</option>
              <option value="monthly" {{ ($sales == 'monthly') ? 'selected' : '' }}>Month</option>
          </select>
        </form></h1>
        <br><br>
        
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!--<div class="row">
        <div class="col-lg-4 col-xs-6">Sales Data
        </div>
        <div class="col-lg-4 col-xs-6">New location
        </div>
        <div class="col-lg-4 col-xs-6">Visited Location
        </div>
        <div class="col-lg-4 col-xs-6">Pending Location
        </div>
        <div class="col-lg-4 col-xs-6">Task Completed
        </div>
        <div class="col-lg-4 col-xs-6">Today login Agents
        </div>
    </div>-->
    <br>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
               @if($sales == 'weekly')
              <h3>{{ $weeklyLocation}}</h3>
              @elseif($sales == 'monthly')
              <h3>{{ $monthlyLocation}}</h3>
              @else
              <h3>{{ $todayLocation}}</h3>
              @endif


              <p>Added Locations</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">

              @if($sales == 'weekly')
              <h3>{{ $weeklyTask}}</h3>
              @elseif($sales == 'monthly')
              <h3>{{ $monthlyTask}}</h3>
              @else
              <h3>{{ $todayTask}}</h3>
              @endif

              <p>Added Tasks</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
          
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">          
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
               @if($sales == 'weekly')
              <h3>{{ $weeklySales}}</h3>
              @elseif($sales == 'monthly')
              <h3>{{ $monthlySales}}</h3>
              @else
              <h3>{{ $todaySales}}</h3>
              @endif
               <p>Sales</p>
                </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        <!-- ./col -->
       
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">

               @if($sales == 'weekly')
              <h3>{{ $weeklyVisited}}</h3>
              @elseif($sales == 'monthly')
              <h3>{{ $monthlyVisited}}</h3>
              @else
              <h3>{{ $todayVisited}}</h3>
              @endif

              <p>Visited Locations</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
               @if($sales == 'weekly')
             <!-- <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
              <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>-->
              <li class="pull-left header"><i class="fa fa-inbox"></i>Weekly Sales</li>
               @elseif($sales == 'monthly')
               <li class="pull-left header"><i class="fa fa-inbox"></i>Monthly Sales</li>
               @else
                <li class="pull-left header"><i class="fa fa-inbox"></i>Today Sales</li>
                @endif

            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
             <canvas id="myChart" width="100" height="50"></canvas>
              <ul class="nav nav-tabs pull-left">
             <!-- <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
              <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>-->
               @if($sales == 'weekly')
               <li class="pull-left header"><i class="fa fa-inbox"></i> Weekly Tasks</li>
                @elseif($sales == 'monthly')
                 <li class="pull-left header"><i class="fa fa-inbox"></i>Monthly Tasks</li>
                 @else
                 <li class="pull-left header"><i class="fa fa-inbox"></i>Today Tasks</li>
                @endif
            </ul>
             
             <canvas id="myChart2" width="100" height="50"></canvas>
               <canvas id="myChart3" width="100" height="50"></canvas>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->

          <!-- Chat box -->
         <!-- <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-comments-o"></i>

              <h3 class="box-title">Chat</h3>

              <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                <div class="btn-group" data-toggle="btn-toggle">
                  <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                </div>
              </div>
            </div>
            <div class="box-body chat" id="chat-box">
              chat item 
              <div class="item">
                <img src="{{asset('assets/img')}}/user4-128x128.jpg" alt="user image" class="online">

                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                    Mike Doe
                  </a>
                  I would like to meet you to discuss the latest news about
                  the arrival of the new theme. They say it is going to be one the
                  best themes on the market
                </p>
                <div class="attachment">
                  <h4>Attachments:</h4>

                  <p class="filename">
                    Theme-thumbnail-image.jpg
                  </p>

                  <div class="pull-right">
                    <button type="button" class="btn btn-primary btn-sm btn-flat">Open</button>
                  </div>
                </div>
                /.attachment 
              </div>
               /.item 
              chat item
              <div class="item">
                <img src="{{asset('assets/img')}}/user3-128x128.jpg" alt="user image" class="offline">

                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                    Alexander Pierce
                  </a>
                  I would like to meet you to discuss the latest news about
                  the arrival of the new theme. They say it is going to be one the
                  best themes on the market
                </p>
              </div>
              /.item 
               chat item 
              <div class="item">
                <img src="{{asset('assets/img')}}/user2-160x160.jpg" alt="user image" class="offline">

                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                    Susan Doe
                  </a>
                  I would like to meet you to discuss the latest news about
                  the arrival of the new theme. They say it is going to be one the
                  best themes on the market
                </p>
              </div>
              /.item 
            </div>
             /.chat 
            <div class="box-footer">
              <div class="input-group">
                <input class="form-control" placeholder="Type message...">

                <div class="input-group-btn">
                  <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                </div>
              </div>
            </div>
          </div>-->
          <!-- /.box (chat box) -->

          <!-- TO DO List -->
          <!--<div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">To Do List</h3>

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
         /.box-header
            <div class="box-body">
               See dist/js/pages/dashboard.js to activate the todoList plugin 
              <ul class="todo-list">
                <li>
               drag handl
                  <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
               checkbox
                  <input type="checkbox" value="">
                 todo text 
                  <span class="text">Design a nice theme</span>
                  Emphasis label 
                  <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                   General tools such as edit or delete-
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">Make the theme responsive</span>
                  <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">Let theme shine like a star</span>
                  <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">Let theme shine like a star</span>
                  <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">Check your messages and notifications</span>
                  <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">Let theme shine like a star</span>
                  <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
              </ul>
            </div>
           /.box-body 
            <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
            </div>
          </div>-->
          <!-- /.box -->

          <!-- quick email widget -->
          <!--<div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Quick Email</h3>-->
              <!-- tools box 
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>-->
              <!-- /. tools 
            </div>
            <div class="box-body">
              <form action="#" method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" placeholder="Subject">
                </div>
                <div>
                  <textarea class="textarea" placeholder="Message"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              </form>
            </div>
            <div class="box-footer clearfix">
              <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                <i class="fa fa-arrow-circle-right"></i></button>
            </div>
          </div>-->

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
          <div class="box box-solid">
            <div class="box-header">
              <!-- tools box -->
              <!--<div class="pull-right box-tools">--->
                <!--<button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip"
                        title="Date range">
                  <i class="fa fa-calendar"></i></button>-->
              <!--  <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                        data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                  <i class="fa fa-minus"></i></button>
              </div>-->
              <!-- /. tools -->
              @if($sales == 'weekly')
              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">
              Weekly Locations
              </h3>
              @elseif($sales == 'monthly')
              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">
              Monthly Locations
              </h3>
              @else
              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">
              Today Locations
              </h3>
              @endif

            </div>
            <div class="box-body">
              <canvas id="myDoughnutChart" height="200" height="200"></canvas>
               <h5 class="box-title text-center">
               Locations
              </h5>
            </div>
            <div class="box-body">
              <canvas id="myDoughnutChart2" height="200" height="200"></canvas>
               <h5 class="box-title text-center">
              Assigned Locations
              </h5>
            </div>
            <!-- /.box-body-->
           <!-- <div class="box-footer no-border">
              <div class="row">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <div id="sparkline-1"></div>
                  <div class="knob-label">Visitors</div>
                </div>
               ./col -->
                <!--<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <div id="sparkline-2"></div>
                  <div class="knob-label">Online</div>
                </div>
             ./col -->
               <!-- <div class="col-xs-4 text-center">
                  <div id="sparkline-3"></div>
                  <div class="knob-label">Exists</div>
                </div>
          ./col 
              </div>
             /.row 
            </div> -->
          </div>
          <!-- /.box -->

          <!-- solid sales graph -->
         <!-- <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Sales Graph</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <div class="box-body border-radius-none">
              <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>-->
            <!-- /.box-body 
            <div class="box-footer no-border">
              <div class="row">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                         data-fgColor="#39CCCC">

                  <div class="knob-label">Mail-Orders</div>
                </div>-->
                <!-- ./col -->
               <!-- <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                         data-fgColor="#39CCCC">

                  <div class="knob-label">Online</div>
                </div>-->
                <!-- ./col -->
               <!-- <div class="col-xs-4 text-center">
                  <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                         data-fgColor="#39CCCC">

                  <div class="knob-label">In-Store</div>
                </div>-->
                <!-- ./col -->
             <!-- </div> -->
              <!-- /.row -->
           <!-- </div>-->
            <!-- /.box-footer -->
          <!--</div>-->
          <!-- /.box -->

          <!-- Calendar -->
         <!-- <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>-->
              <!-- tools box -->
             <!-- <div class="pull-right box-tools">-->
                <!-- button with a dropdown -->
                <!--<div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>-->
              <!-- /. tools -->
           <!-- </div>-->
            <!-- /.box-header -->
            <!--<div class="box-body no-padding">-->
              <!--The calendar -->
             <!-- <div id="calendar" style="width: 100%"></div>-->
           <!-- </div>-->
            <!-- /.box-body -->
           <!-- <div class="box-footer text-black">
              <div class="row">
                <div class="col-sm-6">-->
                  <!-- Progress bars -->
                 <!-- <div class="clearfix">
                    <span class="pull-left">Task #1</span>
                    <small class="pull-right">90%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                  </div>

                  <div class="clearfix">
                    <span class="pull-left">Task #2</span>
                    <small class="pull-right">70%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                  </div>
                </div>-->
                <!-- /.col -->
               <!-- <div class="col-sm-6">
                  <div class="clearfix">
                    <span class="pull-left">Task #3</span>
                    <small class="pull-right">60%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                  </div>

                  <div class="clearfix">
                    <span class="pull-left">Task #4</span>
                    <small class="pull-right">40%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                  </div>
                </div>-->
                <!-- /.col -->
              <!--</div>-->
              <!-- /.row -->
           <!-- </div>
          </div>-->
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>

    <script type="text/javascript">
      $('#myselect').change(function(){
      $('#limitForm').submit();
    });

  var data;
    var ctx = document.getElementById('myChart');
    
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
         labels  : {!! $dataForMonths !!},
      datasets: [
        {
          
            label: 'Sale Graph',
            data: {{ $dataForChart }},
             barPercentage: 0.5,
           barThickness: 50,
        maxBarThickness: 200,
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ]
        
        } 
      ]
    },
    options: {
        scales: {
             xAxes: [{
                stacked: true,
                scaleLabel: {
        display: true,
        labelString: 'Months'
      }
            }],
            yAxes: [{
                stacked: true,
                scaleLabel: {
        display: true,
        labelString: 'Completed Sales'
      }
            }]
        }
    }
});

//$.each(data.orders, function(position, order) {
  // first use the invoiceDate as a label
 // if (order.total) {
    // You should probably format that
  //  myChart.labels.push(order.total); 
 //// } else {
    // your last data entry doesn't have an invoiceDate
  //  myChart.labels.push(''); // blank or think of something creative
 // }

  // add the totalBills and totalAmount to the dataset
 // myChart.datasets[0].data.push(order.total);});



  </script> 
 <script>
      monthsName = new Array();

    // monthOne= new Array();
     //// var a = {!!json_encode($compForMonths)!!};

     // var b = JSON.stringify(a);

     var ctx = document.getElementById('myDoughnutChart');
     window.onload = function() {
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
    var date = new Date();
    var i;
   // var arr = Object.keys(a).map((key) => [a[key]]);
 // var arr = Object.keys(a).map(function() { return a[]; });
    for (i = 0; i < date.getMonth()+1; i++) {
  monthsName.push(months[i]);
 // monthOne.push(2);

  //monthsNameWithLoc.push([i, a[i]]);
}



};
//alert(monthsNameWithLoca);




    var myLineChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
    labels:monthsName,
    datasets: [{
      label: 'Completed Locations',
      borderColor: '#26B99a',
      backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
      borderWidth: 2,
      fill: false,
      data: {!! $compForMonths !!};
    }]
  }
});
  </script>
  <script>
     var ctx = document.getElementById('myDoughnutChart');

var com={!! $compLoc !!};
var assigned={!! $assLoc!!};
var comLocationPer=(com*100)/assigned;
var rem=100-comLocationPer;
var resultArray=new Array();
resultArray.push(comLocationPer);
resultArray.push(rem);
var dataLabels=Array("Completed","Total");

    var myLineChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
    labels:dataLabels
,
    datasets: [{
      label: 'Locations',
      borderColor: '#26B99a',
      borderWidth: 2,
      fill: false,
      data: resultArray,
    }]
  },
    options: {
        scales: {
           xAxes: [{
                stacked: true,
                scaleLabel: {
        display: true,
        labelString: 'Months'
      }
            }],
            yAxes: [{
                stacked: true,
                scaleLabel: {
        display: true,
        labelString: 'Locations'
      }
            }]
        },
    
     tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {     
          return  dataLabels[tooltipItem.index]+":"+resultArray[tooltipItem.index]+" %";
        }
      }
    }



},
});
  </script>


    <!-- /.content -->
  
@endsection