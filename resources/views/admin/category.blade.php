@extends('admin.adminmaster')

@section('content')
<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            {{(Auth::user()->admin) ? 'Administrator' : 'Author' }} <small>Create Post | Edit Post</small>
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
                          @if(isset($category_edit))
                            <form action="{{url('category/update/'.$category_edit->id)}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                               <label for="name">Name of Category</label>
                            <input type="text" id="name" value="{{$category_edit->name}}"  name="name" class="form-control"> 
                            </div>
                            
                            <div class="form-group">
                               <input type="submit" class="btn btn-success" value="Update Category">&nbsp;&nbsp;
                               <button><a href="{{url('category/create')}}" class="btn btn-danger">Cancel Update</a></button>
                            </div>
                          @else

                            <form action="{{url('category/store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                               <label for="name">Name of Category</label>
                            <input type="text" id="name" value="{{old('title')}}"  name="name" class="form-control"> 
                            </div>
                            
                            <div class="form-group">
                               <input type="submit" class="btn btn-primary" value="Create Category"> 
                            </div>

                          @endif
                        
                            
                          
                            
                        </form>
                        
                    </div>
               
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">List of Categories Created</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S/N</th><th>Name</th><th>Numbers of linked Post</th><th>Delete</th><th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($categories) > 0)
                                                    <?php $i=1; ?>
                                            @foreach($categories->all() as $category)
                                                
                                                <tr>
                                                     <td>{{$i++}}</td><td>{!!$category->name !!}</td>
                                                     <td>{{ count($category->posts) }}</td>
                                                     <td><a href="{{url('category/delete/'.$category->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
                                                     <td><a href="{{url('category/edit/'.$category->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a></td>

                                                </tr>

                                            @endforeach
                                            
                                        @else
                                            <h1>No Category Created</h1>
                                        @endif
                                        
                                    </tbody>
                                </table>
                                <center></center>
                            </div>
                        </div>
                    </div>
                    
                </div>


@stop
