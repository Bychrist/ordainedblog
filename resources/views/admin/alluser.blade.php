@extends('admin.adminmaster')

@section('content')
<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             {{(Auth::user()->admin) ? 'Administrator' : 'Author' }} <small>All User</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
               

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                         @include('admin.includes.errors')
                        @include('admin.includes.fail')
                        @include('admin.includes.success')
                            <div class="panel-heading">
                                <h3 class="panel-title">List of Users Created</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S/N</th><th>Image</th><th>Name</th><th>Permissions</th><th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($users) > 0)
                                                    <?php $i=1; ?>
                                            @foreach($users as $user)
                                                
                                                <tr>
                                                     <td>{{$i++}}</td>
                                                      <td>
                                                       <img src="{{ (($user->profile->avatar) == null) ? asset('uploads/profiles/ava.jpg') : asset($user->profile->avatar) }}" class="img">
                                                      </td>
                                                     <td>{{$user->name}}</td>
                                                     <td id="adminbtn">
                                                        <a href=" {{url('user/makeadmin/'.$user->id)}} " class="{{(($user->admin) == 1) ? 'btn btn-success' : 'btn btn-warning'}}" ><i class="fa fa-user"></i> {{(($user->admin) == 1) ? 'Is Admin' : 'Make Admin'}} </a>
                                                     </td>
                                                
                                                     <td><a href="{{url('user/delete/'.$user->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a></td>

                                                </tr>

                                            @endforeach
                                            
                                        @else
                                            <h1>No User Created</h1>
                                        @endif
                                        
                                    </tbody>
                                </table>
                                <center></center>
                            </div>
                        </div>
                        
                    </div>
               
                </div>


@stop