<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Category;

class SignupController extends Controller
{
    //
    public function index(Request $req){


        
        
            $query= "select * from categories order by id desc";
           $categories = DB::select($query);
           $data['categories'] = $categories;
        return view('auth.register',$data);
    }

    public function save(Request $req){
      
    
            $validated = $req->validate([

                'name'=>'required|alpha',
                'email'=>'required|email',
                'password'=>'required'

            ]);

            $date = date("Y-m-d H:i:s");
            $user = new User();
            $user->insert([

                'name'=>$req->input('name'),
                'email'=>$req->input('email'),
                'password'=>hash::make($req->input('password')),
                'created_at'=>$date,
                'updated_at'=>$date,



            ]);


        return redirect('admin/users');
    }



}
