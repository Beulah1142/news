@include('header')

<?php $root = url('')?>
	<!-- END #fh5co-header -->
	<div class="container-fluid">
		<div class="row fh5co-post-entry single-entry">
			<?php if($row) : ?>
			<article class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
				
				<figure class="animate-box">
					<img src="{{asset("storage/".str_replace("public/","",$row->image))}}" style="width:100%; height: 600px;" alt="Image" class="img-responsive animate-box">
				</figure>
				<span class="fh5co-meta animate-box">{{$category->category}}</span>
				<h2 class="fh5co-article-title animate-box">{{$row->title}}</h2>
				<span class="fh5co-meta fh5co-date animate-box">{{date("jS M, Y", strtotime($row->created_at))}}</span>
				
				<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">
					<div class="row">
						<div class="col-lg-8 cp-r animate-box">
							<p> <?=str_replace('src="', 'src="'. $root . '/', $row->content)?>.</p>
						</div>
						
					</div>		
				</div>
					
					
				</div>
		
			</article>
			<?php else:?>
				<h2 class="text-center">No Post of this record!!</h2>
			<?php endif; ?>
		</div>
	</div>

	
@include('footer')