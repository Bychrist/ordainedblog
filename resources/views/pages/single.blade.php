@include('pages.includes.header')
  @include('pages.includes.navigation')
       
        <!-- /.navbar -->
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-xs-12 col-sm-9">
                    <p class="pull-right visible-xs"><button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button></p>
                    <div class="row">
                       <div class="col-sm-12">
                            <h2 class="title">{{$post->title}}</h2>
                            <span id="span">Post by<a href=""> Admin</a><cite id="span"> {{$post->created_at->toFormattedDateString()}}</cite></span>&nbsp;&nbsp;
                              <span id="span">Category: <cite id="span">{{$post->category->name}}</cite></span>&nbsp;&nbsp;
                             <span><i class="glyphicon glyphicon-eye-open"></i>Hits {{ $post->hit }}</span>
                            <p>&nbsp;</p>
                            <img class="img-responsive" src="{{asset($post->featured)}}">
                            <p>&nbsp;</p>

                            <p style="text-align: justify;">

                                {!!$post->content!!}
                            </p>
                            <p>
                                 <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                  <div class="addthis_inline_share_toolbox"></div>
                            </p>

                               <h4>Related Posts</h4>
                              <p>
                                  @foreach($related_posts as $post)
                                    <a href="{{url('/single/'.$post->slug)}}" class="btn btn-success">{{$post->title}}</a>&nbsp;
                                  @endforeach
                                  @if(count($related_posts) < 1)
                                       <p id="related">No Related Posts</p> 
                                  @endif
                            </p>

                              <h4>Tags</h4>
                            <p>
                              @foreach($post->tags as $tag)
                                <a href="{{url('/tag/'.$tag->tag)}}" class="btn btn-success">{{$tag->tag}}</a>&nbsp;
                              @endforeach
                            </p>
                       </div>

                       <div class="col-sm-12">
                           <div class="author">
                               <i class="written">Written By: {{$post->user->name}}</i>
                               
                               <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                          <img class="media-object" src="{{asset($post->user->profile->avatar)}}" style="width: 100px;height: 100px" alt="...">
                                        </a>
                                      </div>
                                      <div class="media-body mid" style="text-align: justify">
                                        {!!$post->user->profile->about!!} 
                                        <a href=""><i class="glyphicon glyphicon"></i>dddd</a>                              
                                      </div>
                                </div>
                                

                           </div>
                       </div>
                    </div>
                    <!--/row-->
                      {{-- the next and previous button of the post --}}
                      @if(count($previous_post) > 0) <a class="pull-left" href="{{url('/single/'.$previous_post->slug)}}" title="{{$previous_post->slug}}"><button class="btn btn-success text">Previous Article</button></a>@endif

                        @if(count($next_post) > 0) <a class="pull-right" href="{{url('/single/'.$next_post->slug)}}" title="{{$next_post->slug}}"><button class="btn btn-success text">Next Article</button></a>@endif
                        <p>&nbsp;</p><p>&nbsp;</p>

                        <!-- the disqus plugin goes here -->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 15px">
                            @include('pages.includes.disqus')
                        </div>
                        <!-- the disqus plugin goes here -->
                    </div>

                    {{-- / the end of the next and previous button of the post --}}

                <!--/.col-xs-12.col-sm-9-->

              @include('pages.includes.side')

                <!--/.sidebar-offcanvas-->
            </div>
            <!--/row-->
           
           @include('pages.includes.footer')