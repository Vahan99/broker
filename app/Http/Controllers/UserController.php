<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.admin', ['errorMessage'=>'Ձեր էջը բլոկավօրված է', 'error'=> false]);
    }
    public function list()
    {
        $user = Auth::user();
        $users = $user->brokers;

        if(Auth::user()->Admin() == 1){
            return view('admin.admins.admins-list',['admin' => Auth::user()->Admin(), 'users'=>$users]);
        }
    }
    public function updateAdminBlade($id)
    {
        $admins = DB::table('users')->where('admin', 0)->get();
        $error = false;
        $user = DB::table('users')->where('id', $id)->get();
        $edit = true;
        $admin = Auth::user()->Admin();
        if(Auth::user()->admin == 2){
            return back();
        }else {
            return view('admin.admins.add-admin',compact('user','admin','admins', 'edit', 'error'));
        }


    }
    public function addAdminPost(Request $request)
    {
        $error = false;
        $this->validate($request, [
            'email' => 'required|unique:users|max:255',
            'phone' => 'required|unique:users',
        ]);
        if($request->admin_id){
            $adminId = $request->admin_id;
        }else{
            $adminId = Auth::user()->id;
        }
        $saved = DB::table('users')->insert(
            [
                'name' => $request->name,
                'email' => $request->email,
                'admin' => $request->admin,
                'status' => 1,
                'admin_id' => $adminId,
                'address' => $request->address,
                'phone' => $request->phone,
                'password' => bcrypt($request->password)
            ]
        );
        if($saved) {
            if(Auth::user()->Admin() == 1){
                $users = DB::table('users')->get();
                return redirect('/admin/broker/user-list');
            }else if(Auth::user()->Admin() == 0){
                $users = DB::table('users')->where('id', Auth::user()->id)->orWhere('admin_id', Auth::user()->id)->get();
                return redirect('/admin/broker/user-list');
            }else{
                $users = DB::table('users')->where('id', Auth::user()->id)->where('admin_id', Auth::user()->admin_id)->get();
                return redirect('/admin/broker/user-list');
            }
        }else{
            $error = true;
            $edit = false;
            return redirect('/admin/broker/user-list');
        }
    }
    public function updateUserStatus($id, $status)
    {
        $reality = DB::table('users')->where('id', $id)->update(['status' => $status]);

        if($reality){
            return response(['error' => false, 'message' => 'Ստատուսը փոփոխվեց']);
        }else{
            return response(['error' => true, 'message' => 'Փորցեք մի փոքր ուշ']);
        }
    }
    public function updateAdminPost($id, Request  $request)
    {
        $this->validate($request, [
            'email' => 'unique:users,email,'.$id
        ]);

        $error = false;
        if (Auth::check()) {
            if($request->admin_id){
                $adminId = $request->admin_id;
            }else{
                $adminId = Auth::user()->id;
            }
            $saved = DB::table('users')
                ->where('id', $id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'admin' => $request->admin,
                    'admin_id' => $adminId,
                    'address' => $request->address,
                    'phone' => $request->phone,
                ]);
            if($saved) {
                return redirect('/admin/broker/user-list');

            }else{
                $error = true;
                $users = DB::table('users')->where('id', Auth::user()->id)->where('admin_id', Auth::user()->admin_id)->get();
                $user = DB::table('users')->where('id', $id)->get();
                $admin=Auth::user()->Admin();
                $edit = true;
                return redirect('/admin/broker/user-list');
            }
        } else {
            return view('admin.admin',['error'=>false]);
        }
    }
    public function getUsersByAdmin($id)
    {
        if($id != -1){
            $users = DB::table('users')->where('admin_id', $id)->get();
        }else{
            $users = DB::table('users')->where('admin', 2)->get();
        }
        return response(['error'=> false, 'users' => $users]);
    }
    public function deleteAdmin($id)
    {
        $delete = Db::table('users')->where('id', $id)->delete();
        if($delete) {
            return redirect('/admin/broker/user-list');
        }else {
            $error = true;
            $users = DB::table('users')->get();
            return view('admin.admins.admins-list', ['users' => $users,'admin'=>Auth::user()->Admin(), 'error' => $error] );
        }
    }
    public function resetPassword($id, Request $request)
    {
        $error = false;
        $saved = DB::table('users')
            ->where('id', $id)
            ->update(['password' => bcrypt($request->pass)]);
        if($saved){
            if(Auth::user()->Admin() == 1){
                $users = DB::table('users')->get();

                return ['users' => $users,'admin'=>Auth::user()->Admin(), 'error' => $error];

            }else if(Auth::user()->Admin() == 0){
                $users = DB::table('users')->where('id', Auth::user()->id)->orWhere('admin_id', Auth::user()->id)->get();
                return ['users' => $users,'admin'=>Auth::user()->Admin(), 'error' => $error];

            }else{
                $users = DB::table('users')->where('id', Auth::user()->id)->where('admin_id', Auth::user()->admin_id)->get();
                return ['users' => $users,'admin'=>Auth::user()->Admin(), 'error' => $error];

            }
        }else{
            $error = true;
            if(Auth::user()->Admin() == 1){
                $users = DB::table('users')->get();

                return ['users' => $users,'admin'=>Auth::user()->Admin(), 'error' => $error];

            }else if(Auth::user()->Admin() == 0){
                $users = DB::table('users')->where('id', Auth::user()->id)->orWhere('admin_id', Auth::user()->id)->get();
                return ['users' => $users,'admin'=>Auth::user()->Admin(), 'error' => $error];

            }else{
                $users = DB::table('users')->where('id', Auth::user()->id)->where('admin_id', Auth::user()->admin_id)->get();
                return ['users' => $users,'admin'=>Auth::user()->Admin(), 'error' => $error];

            }
        }
    }
    public function addAdminBlade()
    {
        $error = false;
        $edit = false;
        $admin = Auth::user()->Admin();
        $admins = DB::table('users')->where('admin', 0)->get();

        return view('admin.admins.add-admin', compact('edit','admin','admins', 'error'));
    }
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            if(Auth::user()->admin != 4 && Auth::user()->hasCompanyDisplay() == false){
                return view('admin.admin', ['errorMessage'=>'Ձեր էջը բլոկավորված է', 'error'=> true]);
            } else if(Auth::user()->status == 2 || Auth::user()->status == 0  && Auth::user()->admin != 4){
                return view('admin.admin', ['errorMessage'=>'Ձեր էջը բլոկավորված է', 'error'=> true]);
            } else {
                if(!Auth::user()->entry){
                    return view('auth.passwords.entry');
                }
                return redirect(Auth::user()->redirect());
            }
        } else{
            return view('admin.admin',['errorMessage'=>'Ձեր էլ-փոստը կամ գաղտնաբառը սխալ է', 'error'=> true]);
        }
    }
//    public function dashboard()
//    {
//    	if (Auth::check()) {
//		    return view('admin.welcome');
//		}else{
//			return redirect('/achtamar_admin_panel');
//		}
//    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function entryResetPassword(Request $request)
    {
        User::find(Auth::id())->update(['password' => bcrypt($request->password),'entry' => 1]);
        return redirect('/admin/reality/reality-list');
    }
}

