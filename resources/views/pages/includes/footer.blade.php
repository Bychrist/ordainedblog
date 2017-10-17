   <!-- THE BEGINNING OF FOOTER -->

           <div class="row footer" style="margin-bottom:0px">
                 <div style="width: 100%">
                    <div id="footmargin" class="col-md-12 text-center fullfooter">
                        &nbsp;&nbsp;&nbsp;
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 text-center foot">
                     <button class="blogbtn"><h5 class="category">CONTACT INFORMATION +</h5></button>
                    <p class="pfoot">{!!$setfooter->contact!!}</p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 text-center">
                     <button class="blogbtn"><h5 class="category">ABOUT US +</h5></button>
                     <p class="pfoot">{!! $setfooter->copyright !!}</p>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 text-center foot">
                    <button class="blogbtn"><h5 class="category">SUBSCRIBE TO NEWSLETTER +</h5></button>
                    <p class="pfoot">
                         @if(Session::has('success'))
                          <h1>   <script type="text/javascript">
                                 alert('{{ Session::get('success') }}');
                             </script></h1>
                        @endif
                        @if(count($errors) > 0)
                            @foreach($errors as $error)
                                {{$error}} &nbsp;
                            @endforeach
                        @endif
                        <form action="{{url('/subscribe')}}" method="POST">
                        {{csrf_field()}}
                            <input type="email" class="form-control" required="required"  name="email" value=""><input type="submit" value="Subscribe">
                     
                        </form>
                    </p>
                </div>
                 
                    <div class="col-md-12 text-center">
                        &copy; Company 2014
                    </div>
                
            </div>
        </div>
            <!--/END OF THE BEGINNING OF FOOTER -->
           
        </div>
        <!--/.container-->
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="{{asset('js/ie10-viewport-bug-workaround.js')}}"></script>
        <script>
        $(document).ready(function () {
            $('[data-toggle="offcanvas"]').click(function () {
                $('.row-offcanvas').toggleClass('active')
            });
        });
    </script>
    <script id="dsq-count-scr" src="//the-great-blog.disqus.com/count.js" async></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57fc19b2aa42f2bd"></script>

    </body>
</html>
