<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use Illuminate\Http\Request;
use App\Models\{User, Location, TaskAssignee, Task,Order, Schedule, TaskQuestion, TaskAnswer, OrderMeta};
use Auth;
use Hash;
use Session;
use Validator;
use DateTime;


class DashboardController extends BackendController
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
  public function index(Request $request)
  {
    $users = User::where('status', 0)->get();
    return view('backend/home', ['users' => $users]);
  }

  public function logout(Request $request)
  {
      Auth::logout();
      return redirect('/login');
  }

}
