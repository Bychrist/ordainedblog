@extends('admin.adminmaster')

@section('content')
<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                              <small>Site Setting</small>
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
                                <h3 class="panel-title">Site Setting Page</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <form action="{{url('settings/update')}}" enctype="multipart/form-data" method="POST">
                                        {{csrf_field()}}
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Site Name</span>
                                            <input id="input"  type="text" name="site_name" value="{!! $setting->site_name !!}" class="form-control" aria-describedby="basic-addon1">
                                        </div>
                                        <br>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">About</span>
                                            <input id="input" type="text" name="copyright" value="{!! $setting->copyright !!}" class="form-control" aria-describedby="basic-addon1">
                                        </div>
                                        <br>
                                         <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">Site Logo</span>
                                            <input id="input"  type="file" name="site_logo" value="{!! $setting->site_logo !!}" class="form-control" paria-describedby="basic-addon1">
                                        </div>
                                        <br>
                                       
                                        
                                        <div class="div"></div>
                                        <br>
                                       
                                        <div class="input-group">
                                            <label for="Site Contact" id="basic-addon1" style="padding:10px;border-radius: 2px">Contact</label>
                                            <textarea style="width: 100%" name="contact" id="about"  class="form-control" >{!! $setting->contact !!}</textarea>
                                        </div>
                                         <br>
                                            <input id="input"  type="submit" class="form-control btn" id="basic-addon1" value="Update Profile" >
                                        

                                    </form>
                                </div>
                               
                            </div>
                        </div>
                        
                    </div>
               
                </div>


@stop