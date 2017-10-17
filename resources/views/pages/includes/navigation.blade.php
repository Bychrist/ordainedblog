<body style="background-color:#000">
            <div class="container" >
             <nav class="navbar navbar-inverse" style="margin-top: 15px;">
           
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{url('/')}}">
                         <img style="margin-top: -30px;" src="{{asset("$setting->site_logo")}}" class="img-responsive pull-left">
                    <span id="webtitle" style="color:#000; font-family:times arial;font-variant-caps: small-caps;font-weight: bolder;">{{$setting->site_name}}</span></a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">

                    <ul class="nav navbar-nav">
                        @foreach($categories as $category)
                            <li class="{{(Request::is('category/'.$category->name)) ? "active" : " " }}">
                             <a href="{{url('/category/'.$category->name)}}">{{$category->name}}</a>
                            </li>   

                        @endforeach
                        
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            
            <!-- /.container -->
        </nav>

</div>
   