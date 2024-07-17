<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Category;
use App\Models\Mypage;

class HomeController extends Controller
{
    //
    public function index(Request $req){

              $limit = 10;
             $page = $req->input('page') ? (int) $req->input('page') : 1;
             $offset = ($page - 1) * $limit;

             $page_class = new Mypage();
             $links = $page_class->make_links($req->fullUrlWithQuery(['page'=> $page]),$page,1);   

           if ($req->input('find')) {
               

              $query = " select posts.*, categories.category from posts join categories on posts.category_id = categories.id
              
              where title like :title  limit $limit offset $offset";

              $title = "%" . $req->input('find') . "%";
              $rows = DB::select($query,['title'=>$title]);

           }else
           if ($req->input('cat')) {

              $query = " select posts.*, categories.category from posts join categories on posts.category_id = categories.id
              
              where category_id =  :id  limit $limit offset $offset";

              $id =  $req->input('cat');
              $rows = DB::select($query,['id'=>$id]);

           }else{

                  $query = " select posts.*, categories.category from posts join categories on posts.category_id = categories.id limit $limit offset $offset";
                  $rows = DB::select($query);

           }

         

           //get categories
           $query= "select * from categories order by id desc";
           $categories = DB::select($query);

           $data['categories'] = $categories;
           $data['rows'] = $rows;
           $data['links'] = $links;
            
            return view('home',$data);
    } 

    
}
