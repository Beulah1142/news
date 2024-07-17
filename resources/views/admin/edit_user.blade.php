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
                            <label for="name" class="col-sm-2 col-form-label"> Name</label>
                                <div class="col-md-10">

                                    <input id="name" type="text" class="form-control"  value="{{($row->name)}}" name="name" autofocus placeholder="Name">   
                                </div>
                        </div> 

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label"> Email</label>
                                <div class="col-md-10">

                                    <input id="email" type="email" class="form-control"  value="{{($row->email)}}" name="email" autofocus placeholder="Email">   
                                </div>
                        </div> 

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label"> password</label>
                                <div class="col-md-10">

                                    <input id="password" type="password" class="form-control"  value="{{($row->password)}}" name="password" autofocus placeholder="Password">   
                                </div>
                        </div>


                        <button type="submit" class="btn btn-primary mx-2 my-3">Save</button>

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
