@extends('admin.adminmaster')

@section('content')
<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            {{(Auth::user()->admin) ? 'Administrator' : 'Author' }} <small>All Post</small>
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
                                <h3 class="panel-title">List of Trashed Posts</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S/N</th><th>Title</th><th>Content</th><th>Image</th><th>Category</th><th>Delete</th><th>Restore</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($posts) > 0)
                                                    <?php $i=1; ?>
                                            @foreach($posts->all() as $post)
                                                
                                                <tr>
                                                     <td>{{$i++}}</td><td>{{$post->title}}</td>
                                                     <td>{!! substr($post->content, 0,150) !!} <?php if(strlen($post->content) > 150 ){ echo '[...]'; } ?></td>
                                                     <td><img src="{{ ($post->featured) }}" class="img-responsive" style="max-width: 65px;max-height: 65px;"></td>
                                                     <td>{{ $post->category->name }}</td>
                                                     <td><a href="{{url('post/kill/'.$post->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
                                                     <td><a href="{{url('post/restore/'.$post->id)}}" class="btn btn-success"><i class="fa fa-check-square-o"></i> Restore</a></td>

                                                </tr>

                                            @endforeach
                                            
                                        @else
                                            <h1>No trashed post</h1>
                                        @endif
                                        
                                    </tbody>
                                </table>
                                <center></center>
                            </div>
                        </div>
                        
                    </div>
               
                </div>


@stop