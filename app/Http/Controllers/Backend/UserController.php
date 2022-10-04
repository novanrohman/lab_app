<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use function PHPUnit\Framework\returnSelf;

class UserController extends Controller
{
    //
    public function UserView(){
       $data['allDataUser']=User::all();
       return view('backend.user.view_user', $data);
    }

    public function UserAdd(){
    //    $data['allDataUser']=User::all();
       return view('backend.user.add_user');
    }

    public function userStore(Request $request){
        $validateData=$request->validate([
            'email'=>'required|unique:users',
            'textNama'=>'required',
        ]);

        $data= new User();
        $data->usertype=$request->selectUser;
        $data->name=$request->textNama;
        $data->email=$request->email;
        $data->password=bcrypt($request->password);
        $data->save();


        return redirect()->route('user.view')->with('info','Tambah user berhasil');
    }
}
