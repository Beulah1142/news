<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Category;

class LoginController extends Controller
{
    //
    public function index(){

        $query= "select * from categories order by id desc";
           $categories = DB::select($query);
           $data['categories'] = $categories;
        return view('auth.login',$data);
    }

    public function save(Request $req){

         $validated = $req->validate([

                'email'=>'required|email',
                'password'=>'required'

            ]);

         if(Auth::attempt($validated,$req->input('remember')))
         {

            $req->session()->regenerate();
            return redirect()->intended('admin/dashboard');
         }

           

        return back()->withErrors([

            'email'=>'wrong email or password'


        ]);
    }

   
}
