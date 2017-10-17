@include('pages.includes.header')
     @include('pages.includes.navigation')
       
        <!-- /.navbar -->
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-xs-12 col-sm-9">
                    @foreach($posts as $post)
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h4>{{$post->title}}</h4>
                            <span id="span">Post by<a href="#"> Admin</a><cite id="span"> {{$post->created_at->toFormattedDateString()}} </cite></span><br/>
                            <i class="glyphicon glyphicon-comment">&nbsp;</i><a href="{{url('/single/'.$post->slug)}}#disqus_thread"></a>
                            <img class="img-responsive" src="{{asset("$post->featured")}}">
                            <p>{!! substr($post->content, 0,150)!!} [...] </p>
                              <p><a class="btn btn-default" href="{{url('/single/'.$post->slug)}}" role="button">View details &raquo;</a></p>
                   </div>
                    @endforeach
                   
                    <!--/row-->
                   
                </div>
                <!--/.col-xs-12.col-sm-9-->

                @include('pages.includes.side')

                <!--/.sidebar-offcanvas-->
            </div>
            <!--/row-->
           
         @include('pages.includes.footer')