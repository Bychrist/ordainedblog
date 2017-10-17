<?php

namespace App\Http\Controllers;
use App\Setting;
use App\User;
use App\Category;
use App\Profile;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function welcome_page()
    {

    	$post_top = Post::orderBy('created_at','desc')->first();
    	$post_two = Post::latest()->skip(1)->take(2)->get();
    	$categories = Category::orderBy('created_at','asc')->take(5)->get();
    	return view('pages.welcome',compact('post_top','post_two','categories'));
    }

    public function single_page($slug)
    {
        $post = Post::where('slug',$slug)->first();//this is to get the first post to display
        $post->hit += 1;
        $post->save();
        $related_posts = Post::where('category_id',$post->category_id)->where('id','!=',$post->id)->orderBy('created_at','desc')->get()->take(3);
        $next = Post::where('id','>',$post->id)->min('id');//
        $previous = Post::where('id','<',$post->id)->max('id');
        $previous_post = Post::where('id',$previous)->first();
        $next_post = Post::where('id',$next)->first();


        return view('pages.single',compact('post','next_post','previous_post','related_posts'));
        
    } 

    public function category($name)
    {
        $category = Category::where('name',$name)->first();

        $posts = Post::where('category_id',$category->id)->orderBy('created_at','desc')->paginate(10);
         
        return view('pages.category',compact('posts'));
    }

    public function tag($name)
    {
        $tag = Tag::where('tag',$name)->first();
        $posts =  $tag->posts()->latest()->paginate(10);
        return view('pages.tag',compact('posts','tag'));
    }

    public function search(Request $request)
    {
        $this->validate($request,[
            'search'=>'required'
            ]);
        $search = $request->search;
        $posts = Post::where('title','Like','%'.$search.'%')->paginate(10);
        return view('pages.search',compact('posts','search'));
    }






}
