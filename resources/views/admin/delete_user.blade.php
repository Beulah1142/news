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

                       <?php if($row->id == 1):?>


                         <span class="alert-warning alert col-lg-12 text-center">You cannot delete the main admin!!</span>

                        <?php else :?>  

                            <div class="alert alert-danger text-center">


                                Are you sure you want to delete this User?!!
                 
                                    <br> 


                            </div>
            

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-md-10">
                                  <input id="name" type="text" class="form-control disabled" disabled value="{{$row->name}}" name="title" autofocus >   
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-md-10">
                                  <input id="email" type="text" class="form-control disabled" disabled value="{{$row->email}}" name="title" autofocus >   
                                </div>
                        </div><br>

                
    

                        <a href="{{url('admin/users')}}">
                        <button type="button" class="btn btn-success mx-2 my-3" >Back</button>
                        </a>

                        <button type="submit" class="btn btn-danger  mx-2 my-3" style="float:right;">Delete</button>

                 <?php endif;?>
                    </form>

                     <?php else:?>
                        <div class="alert alert-warning">Sorry Could not find User</div>
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
