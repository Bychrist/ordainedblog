@if(is_null($post_top))


<h1>LOAD DATA INTO DATABASE</h1>

@else


{{-- THE CONTENT BEGINGS HERE --}}

@include('pages.includes.header')
     @include('pages.includes.navigation')
       
        <!-- /.navbar -->
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-xs-12 col-sm-9">
                    <p class="pull-right visible-xs"><button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button></p>
                    
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                             <h3>{{$post_top->title}}</h3>
                             <span id="span">Post by<a href="#"> Admin</a><cite id="span"> {{ ($post_top->created_at->diffForHumans() )}} </cite></span>
                              <img class="img-responsive pul " src="{{asset("$post_top->featured")}}">
                             <p>{!! substr($post_top->content, 0,200)!!} [...]</p>
                             <p><a class="btn btn-default" href="{{url('/single/'.$post_top->slug)}}" role="button">View details &raquo;</a></p>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-12 col-xs-12">
                            @foreach($post_two as $two)
                                <div class="col-md-6 col-xs-6 pull-left">
                                    <h3>{{$two->title}}</h3>
                                    <span id="span">Post by<a href="#"> Admin</a><cite id="span"> {{$two->created_at->toFormattedDateString()}} </cite></span>
                                    <img class="img-responsive pul " src="{{asset("$two->featured")}}">
                                    <p>{!! substr($two->content, 0,200)!!} [...]</p>
                                    <p><a class="btn btn-default" href="{{url('/single/'.$two->slug)}}" role="button">View details &raquo;</a></p>
                                </div>
                            @endforeach
                            
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($categories as $category)


                            @if(count($category->posts) < 1)
                                 


                            @else

                              <div class="col-sm-12">
                                      <button class="blogbtn"><h4 class="category">{{$category->name}} +</h4></button>
                                      <hr/ class="hr">
                                  </div>



                            @endif
                          
                         
                            
                          @foreach($category->posts->take(3)  as $post)
                          
                              
                          <div class="col-xs-6 col-lg-4">
                            <h4>{{$post->title}}</h4>
                            <span id="span">Post by<a href="#"> Admin</a><cite id="span"> {{$post->created_at->toFormattedDateString()}} </cite></span><br/>
                            <i class="glyphicon glyphicon-comment">&nbsp;</i><a href="{{url('/single/'.$post->slug)}}#disqus_thread"></a>
                            <img class="img-responsive" src="{{asset("$post->featured")}}">
                            <p>{!! substr($post->content, 0,150)!!} [...] </p>
                              <p><a class="btn btn-default" href="{{url('/single/'.$post->slug)}}" role="button">View details &raquo;</a></p>
                          </div>
                       
                            


                          @endforeach
                              
                      @endforeach
                       
                    </div>
                    {{-- <center>{{$categories->links() }}</center> --}}
                    <!--/row-->
                   
                </div>
                <!--/.col-xs-12.col-sm-9-->

               @include('pages.includes.side')

                <!--/.sidebar-offcanvas-->
            </div>
            <!--/row-->
           
         @include('pages.includes.footer')






{{-- // THE CONTENT ENDS HERE --}}


@endif

