<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use Illuminate\Http\Request;
use App\Models\{User, Location, TaskAssignee, Task,Order, Schedule, TaskQuestion, TaskAnswer};
use Auth;
use Hash;
use Session;
use Validator;
use DateTime;


class HomeController extends BackendController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1(Request $request)
    {
        echo "1";die;
        $sales = trim($request->sales);
        dd($sales);
        $sales = (!empty($sales)) ? $sales : 'today';
       // $location = trim($request->location);
       // $task = trim($request->task);

        Session::put('sales', $sales);
      //  Session::put('location', $location);
       // Session::put('task', $task);

        $sales = Session::get('sales');
       // $location = Session::get('location');
       // $task = Session::get('task');

         //$task = TaskAnswer::select('user_id','created_at')->groupby('user_id')->get();
     


         $date = \Carbon\Carbon::today()->subDays(7);

         $task = TaskAnswer::whereDate('created_at', \Carbon\Carbon::today())->groupby('created_at')->get();
         $todayTask = count($task);
    
         $weekTask = TaskAnswer::where('created_at', '>=', $date)->groupby('created_at')->get();

         $weeklyTask = count($weekTask);


         $monthTask = TaskAnswer::whereMonth('created_at',  \Carbon\Carbon::now()->month)->groupby('created_at')->get();

         $monthlyTask = count($monthTask);
       
         
         //$weerklyTask = Task::where('created_at', '>=', $date)->count();
         $todayLocation = Location::whereDate('created_at', \Carbon\Carbon::today())->count();

         $weeklyLocation = Location::where('created_at', '>=', $date)->count();

         $monthlyLocation = Location::whereMonth('created_at', \Carbon\Carbon::now()->month)->count();

         $todayVisited = Schedule::whereDate('created_at', \Carbon\Carbon::today())->where('is_visited' ,'=','yes')->count();

         $weeklyVisited = Schedule::where('created_at', '>=', $date)->where('is_visited' ,'=','yes')->count();

         $monthlyVisited = Schedule::whereMonth('created_at', \Carbon\Carbon::now()->month)->where('is_visited' ,'=','yes')->count();


         $todaySales = Order::whereDate('created_at', \Carbon\Carbon::today())->count();

         $weeklySales = Order::where('created_at', '>=', $date)->count();

         $monthlySales = Order::whereMonth('created_at',  \Carbon\Carbon::now()->month)->count();
         //$todayTask =  2;

         $orders = Order::whereYear('created_at', \Carbon\Carbon::now()->year)->where('status', 'delivered')->select(\DB::raw('sum(total) total'))->selectRaw("MONTH(created_at) as month")->groupby('month')->get();

         $compLoc = Schedule::whereYear('created_at', \Carbon\Carbon::now()->year)->where('is_deactivated', '0')->where('is_checkedIn', '1')->where('is_visited', 'yes')->selectRaw("MONTH(created_at) as month")->groupby('month')->get();

        // dd($compLoc->toArray());
       //  $orders = Order::whereMonth('created_at', \Carbon\Carbon::now()->month)->select(Order::raw('count(id) as `data`'), DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),  Order::raw('YEAR(created_at) year, MONTH(created_at) month'))
//->groupby('year','month')
//  ->get();
       // dd($orders->toArray());

         $dataForChart  = collect();
         $dataForMonths=collect();

         //$date = $orders[0]->created_at->format('d M Y');
       
         foreach ($orders as $key => $order) {
              $dateObj   = DateTime::createFromFormat('!m', $order->month);
             $dataForMonths->push( str_replace('"', ' ', $dateObj->format('F'))) ;
             $dataForChart->push($order->total);
            // dd($date);
         }



         $count = 0;
         //$weeklyTask = 3;
                //($dataForMonths);

         $weeklyVisited = Schedule::where('created_at', '>=', $date)->where('is_visited','=','yes')->count();

        return view('backend/home', ['clients' => $count, 'todayLocation' => $todayLocation,'weeklyLocation'=>  $weeklyLocation, 'todaySales' => $todaySales,'compLoc'=>  $compLoc,'weeklySales'=>  $weeklySales,'todayVisited' => $todayVisited,'weeklyVisited'=>  $weeklyVisited,'monthlyTask' => $monthlyTask,  'monthlyVisited' => $monthlyVisited, 'monthlyLocation'=>  $monthlyLocation, 'monthlySales'=>  $monthlySales,'sales'=>  $sales, 'orders'=>  $orders,'todayTask' => $todayTask,'weeklyTask'=>  $weeklyTask, 'dataForChart'=>  
                $dataForChart,'dataForMonths'=>$dataForMonths

        ]);

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    public function welcomeMail($user = [])
    {

        $to_email = $user->email;
        Mail::to($to_email)->send(new WelcomeEmail);
        return "E-mail has been sent Successfully";
    }
}
