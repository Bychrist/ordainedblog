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
                        @include('admin.includes.fail')
                        @include('admin.includes.success')

                        {{-- ::::::::::: the update form :::::::::::::::: --}}
                        @if(isset($post_edit))

                            <form action="{{url('post/update/'.$post_edit->id)}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" value="{{$post_edit->title}}"  name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="category">Choose Category </label><br>
                                 <select id="category" name="category_id">
                                    @if(count($categories) > 0)
                                        <option value="{{$post_edit->category_id}}">{{$post_edit->category->name}}</option>
                                        @foreach($categories->all() as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="category">Choose Tag</label><br>
                                <strong>current tags: </strong> @foreach($post_edit->tags as $t)<button>{{$t->tag . " "}}</button> @endforeach<br/><br/>
                                 <select class="form-control select2-multi "  name="tags[]" multiple="multiple">
                                    @foreach( $tags->all() as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                                    @endforeach
                                 </select>   
                            </div>
                            

                            
                            <label for="featured">Choose image</label>&nbsp;&nbsp;<span id="imgmessage">Current Image</span>
                            <img src="{{asset($post_edit->featured)}}" style="width: 40px;height: 40px"><br/>
                            <input type="file" name="featured" id="file"> 

                            <label for="content">Enter Content</label>
                            <textarea id="content"  name="content" cols="5" rows="7" class="form-control">{{$post_edit->content}}</textarea>
                            <div class="form-group text-center">
                            <br> 

                                <input type="submit" name="submit" value="update Post" class="btn btn-success">
                            </div>
                            
                        </form>


                        {{-- End of the update form :::::::::::::::::::::::: --}}
                        
                        {{-- :::::::::::: The Post creation form :::::::::::::: --}}
                        @else
                        <form action="{{url('post/store')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" value="{{old('title')}}"  name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="category">Choose Category</label><br>
                                 <select id="category" name="category_id">
                                    @if(count($categories) > 0)
                                        <option class="opt"></option>
                                        @foreach($categories->all() as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>


                             <div class="form-group">
                                <label for="category">Choose Tag</label><br>
                                 <select class="form-control select2-multi "  name="tags[]" multiple="multiple">
                                    @foreach( $tags->all() as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                                    @endforeach
                                 </select>   
                            </div>
                            
                            <label for="featured">Choose image</label>
                            <input type="file" id="featured" name="featured" >
                            <label for="content">Enter Content</label>
                            <textarea id="content"  name="content" cols="5" rows="7" class="form-control">{{old('content')}}</textarea>
                            <div class="form-group text-center">
                            <br> 

                                <input type="submit" name="submit" value="Create Post" class="btn btn-primary">
                            </div>
                            
                        </form>
                        @endif
                        {{-- :::::::::::::::: the end of the post creation form ::::::::::::::::::  --}}
                    </div>
               
                </div>


@stop