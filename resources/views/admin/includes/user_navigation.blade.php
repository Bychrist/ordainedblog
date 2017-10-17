 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Administrator</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->name }} </a>
                    <ul class="dropdown-menu">
                        
                        
                        <li class="divider"></li>
                        
                    </ul>
                </li>
                <li>
                            
                     <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="fa fa-fw fa-power-off"></i> Logout
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                <li><a href="{{url('profile/user')}}">Profile</a></li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="{{Request::is('dashboard') ? "active" : ""}}">
                        <a href="{{url('/dashboard')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                     <li class="{{Request::is('user/allusers') ? "active" : ""}}">
                        <a href="{{url('user/allusers')}}"><i class="fa fa-fw fa-child"></i>All Users</a>
                    </li>
                    <li class="{{Request::is('user/create') ? "active" : ""}}">
                        <a href="{{url('user/create')}}"><i class="fa fa-fw fa-dashboard"></i>Create Users</a>
                    </li>
                    
                    <li class="{{Request::is('post/create') ? "active" : ""}}">
                        <a href="{{url('post/create')}}" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-file-text"></i> Create Post </a>
                      
                    </li>
                    <li class="{{Request::is('post/view') ? "active" : ""}}">
                        <a href="{{url('post/view')}}" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>  All Post </a>
                      
                    </li>
                    <li class="{{Request::is('post/trash') ? "active" : ""}}">
                        <a href="{{url('post/trash')}}" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Trashed Post </a>
                      
                    </li>
                     <li class="{{Request::is('tag/create') ? "active" : ""}}">
                        <a href="{{url('tag/create')}}" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Create Tag </a>
                      
                    </li>

                    <li class="{{Request::is('category/create') ? "active" : ""}}">
                        <a href="{{url('category/create')}}" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>  Category </a>
                      
                    </li>
                    
                    
                    <li class="{{Request::is('site/setting') ? "active" : ""}}">
                        <a href="{{url('site/setting')}}"><i class="fa fa-fw fa-cogs"></i> Site Settings</a>
                    </li>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>