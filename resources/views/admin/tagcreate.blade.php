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
                          @if(isset($tag_edit))
                            <form action="{{url('tag/update/'.$tag_edit->id)}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                               <label for="name">Name of Tag</label>
                            <input type="text" id="name" value="{{$tag_edit->tag}}"  name="tag" class="form-control"> 
                            </div>
                            
                            <div class="form-group">
                               <input type="submit" class="btn btn-success" value="Update Tag">&nbsp;&nbsp;
                               <button><a href="{{url('tag/create')}}" class="btn btn-danger">Cancel Tag</a></button>
                            </div>
                          @else

                            <form action="{{url('tag/store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                               <label for="name">Name of Tag</label>
                            <input type="text" id="name" value="{{old('title')}}"  name="tag" class="form-control"> 
                            </div>
                            
                            <div class="form-group">
                               <input type="submit" class="btn btn-primary" value="Create Tag"> 
                            </div>

                          @endif
                        
                            
                          
                            
                        </form>
                        
                    </div>
               
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">List of Tags Created</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S/N</th><th>Name</th><th>Numbers of linked Post</th><th>Delete</th><th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($tags) > 0)
                                                    <?php $i=1; ?>
                                            @foreach($tags->all() as $tag)
                                                
                                                <tr>
                                                     <td>{{$i++}}</td><td>{{$tag->tag}}</td>
                                                     <td>{{ count($tag->posts) }}</td>
                                                     <td><a href="{{url('tag/delete/'.$tag->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
                                                     <td><a href="{{url('tag/edit/'.$tag->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a></td>

                                                </tr>

                                            @endforeach
                                            
                                        @else
                                            <h1>No Tag Created</h1>
                                        @endif
                                        
                                    </tbody>
                                </table>
                                <center></center>
                            </div>
                        </div>
                    </div>
                    
                </div>


@stop
