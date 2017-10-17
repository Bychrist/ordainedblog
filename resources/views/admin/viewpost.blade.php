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
                                <h3 class="panel-title">List of Posts Created</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S/N</th><th>Title</th><th>Content</th><th>Image</th><th>tags</th><th>Category</th><th>Edit</th><th>Trash</th>
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
                                                     <td> @foreach($post->tags as $t) {{$t->tag . ", "}} @endforeach<br/></td>
                                                     <td>{{ $post->category->name }}</td>
                                                     <td><a href="{{url('post/edit/'.$post->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a></td>
                                                     <td><a href="{{url('post/delete/'.$post->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i> Trash</a></td>

                                                </tr>

                                            @endforeach
                                            
                                        @else
                                            <h1>No Post Created</h1>
                                        @endif
                                        
                                    </tbody>
                                </table>
                                <center></center>
                            </div>
                        </div>
                        
                    </div>
               
                </div>


@stop