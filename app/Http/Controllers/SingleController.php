<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Category;

class SingleController extends Controller
{
    //

    public function index(Request $req, $slug =''){

           $query = " select * from posts where slug = :slug limit 1";
            $row = DB::select($query,['slug'=>$slug]);

            if ($row) {
        
              $query = " select * from categories where id = :id limit 1";
              $category = DB::select($query,['id'=>$row[0]->category_id]);

              $data['row'] = $row[0];
              $data['category'] =$category[0];

            }

            //get all categories display
           $query = "select * from categories order by id desc";
           $categories = DB::select($query);

           $data['categories'] = $categories;
           
            return view('single',$data);
    }
}
