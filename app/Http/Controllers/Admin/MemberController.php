<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;
use App\User;
use Session;
use App\Mail\UserRegisterVerify;
use Mail;
class MemberController extends Controller
{
    public function __construct() 
    {
        $this->viewPrefix = $this->viewPrefix . 'member/';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view($this->viewPrefix . 'member', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->viewPrefix . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users',
            'password' => 'required|min:8',
            'email' => 'required|email',
            'role' => 'required',
            'status' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();

        Mail::to($user->email)
        ->send(new UserRegisterVerify($user,'dev.sst.com/verify/ddlsafjl1dfaueiu123u1i4u'));

        Session::flash('status', 'The new user has insert successful!');
        return redirect()->action('Admin\MemberController@index');


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

        $user = User::where('id',$id)->first();
        return view($this->viewPrefix . 'edit', ['user' => $user]);
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
        $this->validate($request, [
            'password' => 'required|min:8',
            'email' => 'required|email',
            'role' => 'required',
            'status' => 'required',
        ]);

        $user = User::where('id', $id)->update([
            'password' => $request->password,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status
        ]);

        Session::flash('status', 'The user has been edited successful!');
        return redirect()->action('Admin\MemberController@index');

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
}
