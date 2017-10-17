<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
                     <div class="media">
                        <div class="col-sm-12">
                    <form action="{{url('search')}}" method="GET">
                      <input type="text" name="search">
                      <input style="background-color: #337ab7;color:#fff;padding:2px;font-weight: bolder;"  type="submit" name="" value="Search">
                    </form>
                    </div>
                    </div>

                     <div class="media">
                        <div class="col-sm-12">

                            <button class="blogbtn"><h5 class="category">CATEGORY +</h5></button>
                            <hr class="hr">
                                <div class="">
                      @foreach($categories_side as $catlink)
                          <a href="{{url('category/'.$catlink->name)}}" class="list-group-item">{{$catlink->name}}</a>
                        @endforeach
                    </div>
                        </div>
                        </div>
                
                    <!-- THE LATEST POST -->
                    <div class="media">
                        <div class="col-sm-12">
                            <button class="blogbtn"><h5 class="category">LATEST POST +</h5></button>
                            <hr/ class="hr">
                        </div>
                          @foreach($posts_side as $post)

                             <strong style="margin-left: 20px">{{$post->title}}</strong><br>
                            <a href="{{url('single/'.$post->slug)}}"><img class="pull-left" src="{{asset($post->featured)}}" style="margin-left:20px;width: 64px;height:64px"></a> 
                             <p style="font-size: 8px;">{!! substr($post->content, 0,100) !!}</p>

                             <div class="clearfix"></div>
                         
                          @endforeach
                        
                    </div>
                     <!--/ END OF THE LATEST POST -->

                       <!-- THE MOST READ -->

                       <div class="media">
                        <div class="col-sm-12">
                            <button class="blogbtn"><h5 class="category">MOST READ +</h5></button>
                            <hr/ class="hr">
                        </div>
                           @foreach($most_read_posts as $post)

                             <strong style="margin-left: 20px">{{$post->title}}</strong><br>
                            <a href="{{url('single/'.$post->slug)}}"><img class="pull-left" src="{{asset($post->featured)}}" style="margin-left:20px;width: 64px;height:64px"></a> 
                             <p style="font-size: 8px;">{!! substr($post->content, 0,100) !!}</p>

                             <div class="clearfix"></div>
                         
                          @endforeach
                    </div>
                       <!-- /THE END OF MOST READ -->

                       <!-- AUTHORS & CONTRIBUToRS -->

                       <div class="media">
                        <div class="col-sm-12">
                            <button class="blogbtn"><h5 class="category">AUTHORS & CONTRIBUTORS +</h5></button>
                            <hr/ class="hr">
                        </div>
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="..." alt="...">
                            </a>
                          </div>
                          <div class="media-body" style="text-align:justify;">
                            <h4 class="media-heading">Media heading</h4>
                            <P>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                            </P>
                          </div>
                    </div>
                       <!-- /END OF AUTHORS & CONTRIBUToRS -->
                </div>