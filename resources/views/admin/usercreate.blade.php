@extends('admin.adminmaster')

@section('content')
<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             {{(Auth::user()->admin) ? 'Administrator' : 'Author' }} <small>Create Tags | Edit Tag</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
               

                <div class="row">
                    <div class="col-md-8">
                        @include('admin.includes.errors')
                         @include('admin.includes.success')
                         @include('admin.includes.fail')
                          @if(isset($user_edit))
                            <form action="{{url('user/update/'.$user_edit->id)}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                               <label for="name">Name of User</label>
                            <input type="text" id="name" value="{{$user_edit->name}}"  name="name" class="form-control"> 
                            </div>
                            <div class="form-group">
                               <label for="email">User Email</label>
                            <input type="text" id="email" value="{{$user_edit->email}}"  name="email" class="form-control"> 
                            </div>
                            
                            <div class="form-group">
                               <input type="submit" class="btn btn-success" value="Update User">&nbsp;&nbsp;
                               <button><a href="{{url('user/create')}}" class="btn btn-danger">Cancel Tag</a></button>
                            </div>
                          @else

                            <form action="{{url('user/store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                               <label for="name">Name of User</label>
                            <input type="text" id="name" value="{{old('name')}}"  name="name" class="form-control"> 
                            </div>
                              <div class="form-group">
                               <label for="email">User Email</label>
                            <input type="text" id="email" value="{{old('email')}}"  name="email" class="form-control"> 
                            </div>
                            
                            <div class="form-group">
                               <input type="submit" class="btn btn-primary" value="Create User"> 
                            </div>

                          @endif
                        
                            
                          
                            
                        </form>
                        
                    </div>
               
                </div>
               


@stop
