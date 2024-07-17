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
                            
                            <label for="title" class="col-sm-2 col-form-label">Post title</label>

                            <div class="col-md-10">

                              <input id="title" type="text" class="form-control"  value="{{old('title')}}" name="title" autofocus placeholder="Title">   
                            </div>
                        </div><br>

                        <div class="form-group row">
                            <label for="file" class="col-sm-2 c0l-form-label">Featured Image</label>
                            
                            <div class="col-md-10">

                                <input id="file" type="file" class="form-control"  name="file" placeholder="Enter Image">  

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-sm-2 c0l-form-label">Post Category</label>
                            
                            <div class="col-md-4">

                              <select id="category_id" name="category_id" class="form-control">
                                @foreach($categories as $category)
                                  <option value="{{$category->id}}">{{$category->category}}</option>
                                @endforeach
                              </select>

                            </div>
                        </div>
                       
                        <h4>Post Content</h4>
                        <textarea id="summernote" value="{{old('content')}}" name="content"></textarea>

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
<script src="{{url('summernotes/summernote-lite.min.js')}}"></script>
<script>
 $(document).ready(function(){

    $('#summernote').summernote({height:400});
 });
</script>
  