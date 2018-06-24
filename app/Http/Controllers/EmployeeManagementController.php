<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
class EmployeeManagementController extends Controller
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
        $users = User::all();
        return view('emp-manage/index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emp-manage/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request);
        User::create([
          'name'=> $request['name'],
          'email'=> $request['email'],
          'password'=> Hash::make($request['password']),
          'DOB'=> $request['dob'],
          'hiredDate'=> $request['hiredDate'],

          'address'=> $request['address']

        ]);
        return redirect()->intended('/emp-manage');
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
        $user = User::find($id);
        if($user==null||count($user)==0){
          return redirect()->intended('/emp-manage');
        }
        return view('emp-manage.edit',['user'=>$user]);
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
        $user = User::findOrFail($id);
        $constraint = [
          'name'=> 'required|max:20',
          'address'=>'required|max:255'
        ];
        $input = [
          'name'=> $request['name'],
          'address'=>$request['address']
        ];
        if($request['password']!=null && strlen($request['password'])>0 ){
          $constraint['password']='required|min:6';
          $input['password']=Hash::make($request['password']);
        }
        $this->validate($request,$constraint);
        User::where('id',$id)->update($input);

        return redirect()->intended('/emp-manage');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->intended('/emp-manage');
    }
    private function validateInput($request){
      $this->validate($request,[
        'name'=> 'required|max:20',
        'email'=> 'required|email|max:255|unique:users',
        'password'=> 'required|min:6',
        'dob'=> 'required|date',
        'hiredDate'=>'required|date',
        'address'=>'required|max:255'

      ]);
    }
}
