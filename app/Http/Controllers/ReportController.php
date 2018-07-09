<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\UserDetail;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $format = 'Y/m/d';
        $now = date($format);
        $to = date($format);
        $constraints = ['from'=> $now,'to'=>$to];
        $employees = $this -> getEmployees($constraints);
        $emps = User::all();

        return view('report/index',['employees'=>$employees,'searchval'=>$constraints,'emps'=>$emps]);
    }
    public function search(Request $request){

        $constraints = [
          'from'=>$request['from'],
          'to'=>$request['to'],
          'emp'=>$request['employee']
        ];
        //$data = UserDetail::where('clock_in_date','>=',$request['from'])->where('clock_in_date','<=',$request['to'])->where('user_id',$request['employee'])->get();
        $employees = $this->getEmployees2($constraints);
        foreach ($employees as $employee){

          $employee->total = $employee->clock_out_time->diff($employee->clock_in_time)->format('%H:%i:%s');
        }

        $emps = User::all();
        //if(==NULL||count($data)==0){
          //return redirect()->intended('report/index');
        //}
          return view('report/index',['employees'=>$employees,'searchval'=>$constraints,'emps'=>$emps]);
    

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    private function getEmployees2($constraints){
      $employees = UserDetail::leftJoin('users','user_login_details.user_id','=','users.id')->where('user_id','=',$constraints['emp'])->where('clock_in_date','>=',$constraints['from'])->where('clock_in_date','<=',$constraints['to'])->get();
      return $employees;
    }
    private function getEmployees($constraints){
      $employees = UserDetail::leftJoin('users','user_login_details.user_id','=','users.id')->where('clock_in_date','>=',$constraints['from'])->where('clock_in_date','<=',$constraints['to'])->get();
      return $employees;
    }
}
