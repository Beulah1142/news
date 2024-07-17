@include('admin.header')
<link href="{{url('summernotes/summernote-lite.min.css')}}" rel="stylesheet" />


@include('admin.sidebar')
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>{{$pageTitle}} </h2>  

                     <a href="{{url('admin/category/add')}}">
                         <button  style="float: right;" class="btn-sm btn btn-primary"><i class="fa fa-plus"></i>Add Category</button> 
                     </a>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead>
                            
                            <tr><th>Category</th><th>Date</th><th>Action</th></tr>
                        </thead>
                        <tbody>
                                @forelse($rows as $row)
                            <tr><td>{{$row->category}}</td><td>{{date("jS M, Y", strtotime($row->created_at))}}</td>

                                <td>
                                <a href="{{url('admin/category/edit/'.$row->id)}}">
                                <button class='btn btn-sm btn-success'><i class="fa fa-edit"> Edit</i></button>
                                </a>
                                <a href="{{url('admin/category/delete/'.$row->id)}}">
                                <button class='btn btn-sm btn-warning'><i class="fa fa-times"> Delete</i></button>
                                </a>
                            </td>
                        
                        </tr>
                            @empty
                            <p class="text-center m-3 text-danger"> No records Found</p>
                            @endforelse
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
  