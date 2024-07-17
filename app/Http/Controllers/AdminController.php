<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Mypage;

class AdminController extends Controller
{
    //
    public function index(){

        $pageTitle = "Dashboard";


        return view('admin.index',[

        "pageTitle"=> $pageTitle,

        ]);
    }


    public function post(Request $req, $type ='', $id = ''){

        $pageTitle = "Post";

        switch ($type) {
            case 'add':
                // code...

                if ($req->method() == 'POST') {


                     
             
                    $post = new post();

                    // remove images from content
                    $folder = "public/";
                    if (!file_exists($folder)) {
                        // code...
                        mkdir($folder,0777,true);
                    }

                    
                   $validated = $req->validate([

                    'title'=>'required|string',
                    'file'=>'required|image',
                    'category_id'=>'required',
                    'content'=>'required'

                   ]);

                   //remove images from content summernotes
                   preg_match_all('/<img[^>]+>/', $req->input('content'), $matches);
                   $new_content = $req->input('content');

                   if (is_array($matches) && count($matches) > 0) {
                       foreach ($matches[0] as $match) {
                            
                            preg_match('/src="[^"]+/', $match, $matches2);

                            $parts = explode(",", $matches2[0]);
                            $filename = $folder . "base_64_". rand(0,999).".jpg";

                            $new_content = str_replace($parts[0] . "," . $parts[1], 'src="' .$filename, $new_content);
                            file_put_contents($filename, base64_decode($parts[1]));
                       }
                   }

                    $path = $req->file('file')->store('/public');

                   $data['title'] = $req->input('title');
                   $data['image'] = $path;
                   $data['category_id'] = $req->input('category_id');
                   $data['content'] =  $new_content;
                   $data['slug'] = $post->str_to_url($req->input('title'));
                   $data['created_at'] = date("Y-m-d H:i:s");
                   $data['updated_at'] = date("Y-m-d H:i:s");

                   $post->insert($data);
                }

                    $query = " select * from categories ";
                   $categories = DB::select($query);

                   $data['categories'] = $categories;
                   $data['pageTitle'] = "New Post";

                 return view('admin.add_post',$data);
                break;  

                case 'edit':
                // code...
                 if ($req->method() =='POST') {
                        // code...


                     $folder = "public/";
                    if (!file_exists($folder)) {
                        // code...
                        mkdir($folder,0777,true);
                    }


                      $post = new post();
                     $validated = $req->validate([

                        'title'=>'required|string',
                        'file'=>'image',
                        'content'=>'required'

                       ]);




                        if ($req->file('file')) {
                            // code...
                            $oldrow = $post->find($id);

                            if (file_exists($oldrow->image)) {
                                // code...
                                unlink($oldrow->image);
                            }
                            $path = $req->file('file')->store('/public');
                            $data['image'] = $path;
                        }



                   //remove images from content summernotes
                   preg_match_all('/<img[^>]+>/', $req->input('content'), $matches);
                   $new_content = $req->input('content');

                   if (is_array($matches) && count($matches) > 0) {
                       foreach ($matches[0] as $match) {
                            
                            preg_match('/src="[^"]+/', $match, $matches2);

                            $parts = explode(",", $matches2[0]);
                            $filename = $folder . "base_64_". rand(0,999).".jpg";

                            $new_content = str_replace($parts[0] . "," . $parts[1], 'src="' .$filename, $new_content);
                            file_put_contents($filename, base64_decode($parts[1]));

                       }
                   }

                        
                         
                       $data['title'] = $req->input('title');
                       
                       $data['category_id'] = $req->input('category_id');
                       $data['content'] =  $new_content;
                       $data['updated_at'] = date("Y-m-d H:i:s");

                       $post->where('id', $id)->update($data);  

                       return redirect('admin/post/edit/'.$id);  


                    }

                    $post = new post();

                    $row = $post->find($id);

                    $category = $row->Category()->first();

                      $query = " select * from categories ";
                   $categories = DB::select($query);

                 return view('admin.edit_post',[
                    "pageTitle"=> "Edit Post",
                    "row"=>$row,
                    "category"=>$category,
                    "categories"=>$categories,
                ]);
                    break; 

                 case 'delete':
                // code...

                   if ($req->method() =='POST') {
                        // code..
                            $post = new post();

                            $row = $post->find($id);

                            if (file_exists('storage/'.$row->image)) {
                                // code...
                                unlink('storage/'.$row->image);
                            }
                            

                       $row->delete();  

                       return redirect('admin/post');  


                    }

                    $post = new post();

                    $row = $post->find($id);

                    $category = $row->Category()->first();

                 return view('admin.delete_post',[
                    "pageTitle"=> "Delete Post",
                    "row"=>$row,
                    "category"=>$category,
                ]);                
                 break;  

            
            default:
                // code...

                    $limit = 10;
                    $page = $req->input('page') ? (int) $req->input('page') : 1;
                    $offset = ($page - 1) * $limit;

                    $page_class = new Mypage();
                    $links = $page_class->make_links($req->fullUrlWithQuery(['page'=> $page]),$page,1);
                  

                   $query = " select posts.*, categories.category from posts join categories on posts.category_id = categories.id order by id desc limit $limit offset $offset ";
                   $rows = DB::select($query);

                   $data['rows'] = $rows;
                   $data['pageTitle'] = $pageTitle; 
                   $data['links'] = $links; 
                return view('admin.post',$data);
                break;
        }

        
    }

    public function category(Request $req, $type='', $id=''){

        $pageTitle = "Category";


        switch ($type) {
            case 'add':
                // code...
                if ($req->method() == 'POST') {
                    // code...
             
                    $category = new category();

                   $validated = $req->validate([

                    'category'=>'required|string',

                   ]);

                
                   $data['category'] = $req->input('category');
                   $data['created_at'] = date("Y-m-d H:i:s");;
                   $data['updated_at'] = date("Y-m-d H:i:s");

                   $category->insert($data);

                   return redirect('admin/category');
                }

                 return view('admin.add_category',["pageTitle"=>"New category"]);
                break;  

                case 'edit':
                // code...
                $category = new category();

                 if ($req->method() =='POST') {
                        // code...
                        

                   $validated = $req->validate([

                    'category'=>'required|string',

                   ]);

                
                       $data['category'] = $req->input('category');                         
                       $data['updated_at'] = date("Y-m-d H:i:s");

                       $category->where('id', $id)->update($data);  

                       return redirect('admin/category/edit/'.$id);  


                    }


                    $row = $category->find($id);


                 return view('admin.edit_category',[
                    "pageTitle"=> "Edit category",
                    "row"=>$row
                    
                    ]);
                    break; 

                 case 'delete':
                // code...

                   if ($req->method() =='POST') {
                        // code..
                         $category = new category();

                        $row = $category->find($id);

                        $row->delete();  

                       return redirect('admin/category');  


                    }

                    $category = new category();

                    $row = $category->find($id);

                 return view('admin.delete_category',[
                    "pageTitle"=> "Delete Post",
                    "row"=>$row
        
                ]);                
                 break;  

            
            default:
                // code...

                     $limit = 10;
                    $page = $req->input('page') ? (int) $req->input('page') : 1;
                    $offset = ($page - 1) * $limit;

                    $page_class = new Mypage();
                    $links = $page_class->make_links($req->fullUrlWithQuery(['page'=> $page]),$page,1);

                   $query = " select * from categories order by id desc limit $limit offset $offset  ";
                   $rows = DB::select($query);

                   $data['rows'] = $rows;
                   $data['links'] = $links;
                   $data['pageTitle'] = $pageTitle; 
                return view('admin.categories',$data);
                break;
        }
    }


    public function users(Request $req, $type='', $id=''){

        $pageTitle = "Users";


        switch ($type) {

                case 'edit':
                // code...
                $user = new user();

                 if ($req->method() =='POST') {
                        // code...
                        

                   $validated = $req->validate([
                    
                    'name'=>'required|alpha',
                    'email'=>'required|email',
                    'password'=>'required'

                   ]);

                
                       $data['name'] = $req->input('name');
                       $data['email'] = $req->input('email');
                       $data['password'] = $req->input('password');
                         
                       $data['updated_at'] = date("Y-m-d H:i:s");

                       $user->where('id', $id)->update($data);  

                       return redirect('admin/user/edit/'.$id);  


                    }


                    $row = $user->find($id);


                 return view('admin.edit_user',[
                    "pageTitle"=> "Edit user",
                    "row"=>$row
                    
                    ]);
                    break; 

                 case 'delete':
                // code...

                   if ($req->method() =='POST') {
                        // code..
                         $user = new user();

                        $row = $user->find($id);

                        if ($row->id != 1) {
                            // code...

                            $row->delete();  

                       return redirect('admin/users');  

                        }

                        

                    }

                    $user = new user();

                    $row = $user->find($id);

                 return view('admin.delete_user',[
                    "pageTitle"=> "Delete Post",
                    "row"=>$row
        
                ]);                
                 break;  

            
            default:
                // code...
                    $limit = 10;
                    $page = $req->input('page') ? (int) $req->input('page') : 1;
                    $offset = ($page - 1) * $limit;

                    $page_class = new Mypage();
                    $links = $page_class->make_links($req->fullUrlWithQuery(['page'=> $page]),$page,1);

                   $query = " select * from users limit $limit offset $offset ";
                   $rows = DB::select($query);

                   $data['rows'] = $rows;
                   $data['links'] = $links;
                   $data['pageTitle'] = $pageTitle; 
                return view('admin.users',$data);
                break;
        }
    }

}
