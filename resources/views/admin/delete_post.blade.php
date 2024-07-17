@include('admin.header')
<link href="{{url('summernotes/summernote-lite.min.css')}}" rel="stylesheet" />


@include('admin.sidebar')
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>{{$pageTitle}} </h2>   
                    </div>
                    <br>
                    <br>
                    <div class="container-fluid col-lg-12">

                    <?php if($row):?>

                    <form method="post" enctype="multipart/form-data">
                        @csrf

                       
                            <div class="alert alert-danger text-center">

                                Are you sure you want to delete this Post?!!
                 
                                    <br> 


                            </div>
            

                        <div class="form-group row">
                            
                            <label for="title" class="col-sm-2 col-form-label">Post title</label>

                            <div class="col-md-10">

                              <input id="title" type="text" class="form-control disabled" disabled value="{{$row->title}}" name="title" autofocus placeholder="Title">   
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label for="file" class="col-sm-2 c0l-form-label">Featured Image</label>
                            
                            <div class="col-md-10">
                                <img src="{{url('storage/'.$row->image)}}" style="width:200px;">

                            </div>
                        </div>

                
    

                        <a href="{{url('admin/post')}}">
                        <button type="button" class="btn btn-success mx-2 my-3" >Back</button>
                        </a>

                        <button type="submit" class="btn btn-danger  mx-2 my-3" style="float:right;">Delete</button>

                    </form>

                      <?php else:?>
                        <div class="alert alert-warning">Sorry Could not find Post</div>
                     <?php endif;?>
                    </div>




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
