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
                    <div class="container-fluid col-lg-12">
                    <form method="post" enctype="multipart/form-data">
                        @csrf

                        @if($errors->all())
                        <div class="alert alert-danger text-center">
                            @foreach($errors->all() as $error)

                                {{$error}}<br> 


                            @endforeach
                        </div>
                        @endif

                        <div class="form-group row">
                            
                            <label for="title" class="col-sm-2 col-form-label">Add Category</label>

                            <div class="col-md-10">

                              <input id="title" type="text" class="form-control"  value="{{old('Category')}}" name="category" autofocus placeholder="Category">   
                            </div>
                        </div><br>


                        <button type="submit" class="btn btn-primary mx-2 my-3">Post</button>

                    </form>
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
