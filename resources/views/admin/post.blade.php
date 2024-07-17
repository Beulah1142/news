@include('admin.header')
<link href="{{url('summernotes/summernote-lite.min.css')}}" rel="stylesheet" />


@include('admin.sidebar')
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>{{$pageTitle}} </h2>  

                     <a href="{{url('admin/post/add')}}">
                         <button  style="float: right;" class="btn-sm btn btn-primary"><i class="fa fa-plus"></i>Add Post</button> 
                     </a>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead>
                            
                            <tr><th>Title</th><th>Content</th><th>Category</th><th>Featured Image</th><th>Date</th><th>Action</th></tr>
                        </thead>
                        <tbody>
                                @foreach($rows as $row)
                            <tr><td>{{$row->title}}</td><td>{{$row->content}}</td><td>{{$row->category}}</td><td><img src="{{asset("storage/".str_replace("public/","",$row->image))}}" style="width:150px;"></td><td>{{date("jS M, Y", strtotime($row->created_at))}}</td>

                                <td>
                                <a href="{{url('admin/post/edit/'.$row->id)}}">
                                <button class='btn btn-sm btn-success'><i class="fa fa-edit"> Edit</i></button>
                                </a>
                                <a href="{{url('admin/post/delete/'.$row->id)}}">
                                <button class='btn btn-sm btn-warning'><i class="fa fa-times"> Delete</i></button>
                                </a>
                            </td></tr>

                            @endforeach
                        </tbody>    
                        

                    </table>

                  @include('pagination')
                </div>              
                 <!-- /. ROW  -->
                  <hr />
              
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
@include('admin.footer')
