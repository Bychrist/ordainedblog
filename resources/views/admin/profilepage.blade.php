@extends('admin.adminmaster')

@section('content')
<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             {{ $user->name }} <small>Profile Page</small>
                        </h1>
                        
                    </div>
                </div>
               

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                         @include('admin.includes.errors')
                        @include('admin.includes.fail')
                        @include('admin.includes.success')
                            <div class="panel-heading">
                                <h3 class="panel-title">Profile Page &nbsp;<input id="controlprofile" type="button" style="margin-left: 50%" class="btn btn-warning" value="Update Profile"></h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-5 col-md-5 col-xs-12">
                                    <img src="{{ asset($user->profile->avatar)}}"  class="img-responsive profile">
                                    <br><br>
                                    <div class="list-group">
                                          <a  class="list-group-item list-group-item-success">Name: {{$user->name}}</a>
                                          <a  class="list-group-item list-group-item-info">Email: {{$user->email}}</a>
                                          <a class="list-group-item list-group-item-warning">Facebook URL: {{$user->profile->facebook}} </a>
                                          <a  class="list-group-item list-group-item-danger">Youtube URL: {{$user->profile->youtube}}</a>
                                          <a  class="list-group-item " ><h3 class="text-center">About Me</h3> 
                                          <span id="about" style="background-color: #fff">{!!$user->profile->about!!}</span>

                                          </a>
                                    </div>
                                </div>
                                <div id="profileform" class="col-lg-7 col-md-7 col-xs-12">
                                    <form action="{{url('profile/user/update')}}" enctype="multipart/form-data" method="POST">
                                        {{csrf_field()}}
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Username</span>
                                            <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="name" aria-describedby="basic-addon1">
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Email</span>
                                            <input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="Email here" aria-describedby="basic-addon1">
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">New Password</span>
                                            <input type="password" id="password"  name="password" value="{{$user->password}}" class="form-control" placeholder="********" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="div"></div>
                                        <br>
                                         <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Confirm Password</span>
                                            <input type="password" id="confirm"  name="password" value="" class="form-control" placeholder="********" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="div"></div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Your Facebook URL</span>
                                            <input type="text" name="facebook" value="{{$user->profile->facebook}}" class="form-control" placeholder="your facebook url" aria-describedby="basic-addon1">
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Your Youtube URL</span>
                                            <input type="text" name="youtube" value="{{$user->profile->youtube}}" class="form-control" placeholder="Your youtube url here" aria-describedby="basic-addon1">
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Upload image</span>
                                            <input type="file" name="avatar" class="form-control" >
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <label for="about" id="basic-addon1" style="padding:10px;border-radius: 2px">About You</label>
                                            <textarea name="about" id="about"  class="form-control" >{{$user->profile->about}}</textarea>
                                        </div>
                                         <br>
                                            <center><input type="submit" id="update" class="form-control btn" id="basic-addon1" value="Update Profile" ></center>
                                        

                                    </form>
                                </div>
                               
                            </div>
                        </div>
                        
                    </div>
               
                </div>


@stop