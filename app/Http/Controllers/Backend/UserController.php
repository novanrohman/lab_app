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
}