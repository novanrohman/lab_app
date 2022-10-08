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

   public function UserEdit($id){
    // dd('berhasil edit');
    $editData=User::find($id);
    return view('backend.user.edit_user', compact('editData'));
   }

   public function userUpdate(Request $request){
        $validateData=$request->validate([
            'email'=>'required|unique:users',
            'textNama'=>'required',
        ]);

        $data= User::find($id);
        $data->usertype=$request->selectUser;
        $data->name=$request->textNama;
        $data->email=$request->email;
        // if($request->password!=""){
        //     $data->password=bcrypt($request->password);
        // }
        $data->save();


        return redirect()->route('user.view')->with('fire','Tambah user berhasil');
    }

    public function UserDelete($id){
        // dd('berhasil edit');
        $deleteData=User::find($id);
        $deleteData->delete();
        return redirect()->route('user.view')->with('info','Delete user berhasil');
    }

}
