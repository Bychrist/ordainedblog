<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Image;
use File;
use App\User;
use App\Profile;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    /* :::::::::::::::::::::this is all about the post controller :::::::::::::::::::::::*/

    public function index()
    {
      $categories = Category::all();
      $posts = Post::all();
      $users = User::all();
        return view('admin.dashboard',compact('categories','posts','users'));
    }

     public function create()
    {

        $categories = Category::all();
        $tags = Tag::all();
        if($categories->count() < 1 || $tags->count() < 1)
        {
          return redirect()->back()->with(['fail'=>'you have to create a category or tag to access this page']);
        }
        else
        {
          return view('admin.post',compact('categories','tags'));
        }
        
    }



      public function store(Request $request)
    {
      if(($request['category_id']) == 'please choose a category')
      {
        return redirect()->back()->with(['fail'=>'You are yet to choose a category']);
      }


      else
      {
        $this->validate($request,
            [
                'title'=>'required|max:255',
                'featured'=>'required|dimensions:ratio=2/1',
                'content'=>'required',
                'category_id'=>'required',
                 'tags'=>'required',
                 
            ]);

     
          $post = new Post;
          $post->title = strtoupper($request['title']);
          $post->category_id = $request['category_id'];
          $post->content = $request['content'];
          $post->user_id = Auth::id();
          $post->slug = str_slug($request->title);
          $featured = $request->file('featured');
          $featured_new_name = time() . "." . $featured->getClientOriginalExtension();
          $featured->move('uploads/post_images',$featured_new_name);
          $post->featured = 'uploads/post_images/' . $featured_new_name;
          $post->save();

          $post->tags()->attach($request['tags']);
          return redirect()->back()->with(['success'=>'Your post was successfully created!']); 
     
      }
        


        
    }




         public function viewpost()
    {
         $posts = Post::latest()->paginate();
        return view('admin.viewpost',compact('posts'));
    }

    public function post_edit($id)
    {
    
        $categories = Category::all();
        $tags = Tag::all();
        $post_edit = Post::findOrFail($id);
        return view('admin.post',compact('categories','post_edit','tags'));

    }

    public function post_update(Request $request, $id)
    {
        $this->validate($request,[
          'title'=>'required | max:255',
          'category_id'=>'required',
          'content'=>'required',
          'tags'=>'required',
          'featured'=>'image'
          ]);

        if ($request->hasFile('featured')) {

          $post_update = Post::findOrFail($id);
          File::delete($post_update->featured);
          $post_update->title = strtoupper($request['title']);
          $post_update->category_id = $request['category_id'];
          $post_update->content = $request['content'];
          $featured = $request->file('featured');
          $featured_new_name = time() . "." . $featured->getClientOriginalExtension();
          $featured->move('uploads/post_images',$featured_new_name);
          $post_update->featured = 'uploads/post_images/' . $featured_new_name;
          $post_update->update();

          return redirect('post/view')->with(['success'=>'Your post was successfully updated']);
       $post_update->tags()->sync($request['tags']);  }
        else
        {
          $post_update = Post::findOrFail($id);
          $post_update->title = $request['title'];
          $post_update->category_id = $request['category_id'];
          $post_update->content = $request['content'];
          $post_update->update();
          $post_update->tags()->sync($request['tags']);
          return redirect('post/view')->with(['success'=>'Your post was successfully updated']);
        }
       
          
        
    
        

    }

    public function post_trash()
    {
      $posts = Post::onlyTrashed()->get();
      return view('admin.trash', compact('posts') );
    }

    public function post_kill($id)
    {
      $kill = Post::withTrashed()->where('id',$id)->first();
      $kill->forceDelete();
      return redirect('post/trash')->with(['success'=>'your post has been permanently deleted!']);
    }


    public function post_delete($id)
    {
      $post = Post::findOrFail($id);
      File::delete($post->featured);
      $post->delete();
      return redirect()->back()->with(['success'=>'Your post was successfully trashed!']);
    }

    public function post_restore($id)
    {
      $post = Post::onlyTrashed()->where('id',$id);
      $post->restore();
      return redirect('post/view')->with(['success'=>'Your post was successfully restored!']);

    }

    /* /:::::::::::::::::::::This is all about the post controller:::::::::::::::::::::::::::: */
    /*
      |--------------------------------------------------------------------------
      |                       CATEGORY CONTROLLER
      |
      |---------------------------------------------------------------------------
      */

    /* ::::::::::::::::::::::: THis is allabout the category controller::::::::::::::::::::::::*/
        public function category_create()
        {
            $categories = Category::all();
            return view('admin.category',compact('categories'));
          
        }

        public function category_store(Request $request)
        {
            $this->validate($request,['name'=>'required | max:255 | unique:categories']);
            $category = new Category();
            $category->name = strtoupper($request['name']);
            $comma = '"';
            $category->save();
            return redirect()->back()->with(['success'=>'The category ' .$comma. $category->name . $comma .' was successfully created']);
            

        }

        public function category_delete($id)
        {

            $category = Category::findOrFail($id);
            $post = Post::onlyTrashed()->where('category_id',$id)->first();
            $comma = '"';
            if(count($category->posts) > 0 )
            {
               return redirect('category/create')->with(['fail'=> $comma . $category->name . $comma . ' has atleast a post linked to it and therefore can not be deleted.']);
            }
            elseif(count($post) > 0)
            {
                return redirect('category/create')->with(['fail'=> $comma . $category->name . $comma . ' has atleast a trashed post linked to it']);
            }
            else
            {
              $category->delete();
            return redirect('category/create')->with(['success'=>'Your category ' . $comma . $category->name . $comma . ' was successfully deleted.']);
            }
            
        }

        public function category_edit($id)
        {
            $categories = Category::all();
            $category_edit = Category::findOrFail($id);
            return view('admin.category',compact('category_edit','categories'));
        }

        public function category_update(Request $request, $id)
        {

            $category = Category::findOrFail($id);
            $this->validate($request,['name'=>'required | unique:categories']);
            $category->name = strtoupper($request['name']);
            $comma = '"';
            $category->update();
            return redirect('category/create')->with(['success'=>'Your category ' . $comma . $category->name . $comma . ' was successfully updated.']);
        }

        


    /* ::::::::::::::::::::::::::/THis is allabout the Tags controller::::::::::::::::::::::::::*/

     /* --------------------------------------------------------------------------
      |                           TAG CONTROLLER
      |
      |---------------------------------------------------------------------------
      */

        public function tag_create()
        {
            $tags = Tag::all();
            return view('admin.tagcreate', compact('tags'));
        }


        public function tag_store(Request $request)
        {
            $this->validate($request,[
              'tag' => 'required'
              ]);

          Tag::create([
              'tag'=> ucfirst($request->tag)
            ]);
          return redirect()->back()->with(['success'=>'Tag was successfully created']);
        }

        public function tag_edit($id)
        {
          $tags = Tag::all();
            $tag_edit = Tag::findOrFail($id);
            return view('admin.tagcreate', compact('tag_edit','tags'));
        }


        public function tag_update(Request $request, $id)
        {
          $tag = Tag::findOrFail($id);

          $this->validate($request,['tag' => 'required']);

          $tag->tag = $request->tag;
          $tag->update();
          return redirect('tag/create')->with(['success'=>'Tag was successfully updated.']);
        }

        public function tag_delete($id)
        {
            Tag::destroy($id);
            return redirect()->back()->with(['success'=>'Tag was successfully deleted.']);
        }

    /* ::::::::::::::::::::::: THis is the end of the tag controller ::::::::::::::::::::::::*/


      /*:::::::::::::::::::::: THE BEGINING OF THE USER CONTROLLER :::::::::::::::::::::::::: */
        public function user_showall()
        {
          $users = User::where('email', '!=', 'ordained@yahoo.com')->get();
          return view('admin.alluser',compact('users'));
        }

        public function user_create()
        {
          
            return view('admin.usercreate');
        }

        public function user_store(Request $request)
        {
          $this->validate($request,[
                'name'=>'required',
                'email'=>'required|email'
            ]);

         $user =  User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt('password')
            ]);

          Profile::create([
              'user_id'=>$user->id,
            ]);

          return redirect('user/allusers')->with(['success'=>'User account and profile was successfully created']);

        }

         public function user_makeadmin($id)
          {
              $user = User::findOrFail($id);
            if($user->admin == 0)
            {
                $user->admin = 1;
                $user->save();
                return redirect('user/allusers')->with(['success'=>'User successfully changed to Admin']);
            }
            elseif($user->admin == 1)
            {
                $user->admin = 0;
                $user->save();
                return redirect('user/allusers')->with(['success'=>'User is no longer an Admin']);
            }
            

          }


          public function user_delete($id)
          {
              $user = User::findOrFail($id);
              $user->delete();

              $profile = Profile::where('user_id', $user->id);
              $profile->delete();

              return redirect()->back()->with(['success'=>'User has been successfully deleted.']);

              
          }

          
       /*:::::::::::::::::::::: THE EMD OF THE BEGINING OF THE USER CONTROLLER ::::::::::::::: */



}
