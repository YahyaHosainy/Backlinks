<?php

namespace App\Http\Controllers;

use App\Models\SeoSetting;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\GTMConfig;
use Canvas\Models\User;
use Canvas\Events\PostViewed;
use Canvas\Models\Post;
use Canvas\Models\Tag;
use Canvas\Models\Topic;

/**
 * Class SubPagesController
 * @package App\Http\Controllers
 */
class BlogBladeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::latest()->published()->with('user', 'topic')->paginate(10);
        return view('blog-blade/index',[
            'posts' => $posts
        ]);
    }

    public function showPost(Request $request, $slug)
    {
        $post = Post::with('user', 'tags', 'topic')->firstWhere('slug', $slug);
        if ($post) {
            event(new PostViewed($post));
            return view('blog-blade/show-post',[
                'post' => $post
            ]);
        } else {
            return abort(404);
        }
    }
   
    
    public function getPostsForTag(Request $request, $slug)
    {
        $tag = Tag::firstWhere('slug', $slug);
        $posts = $tag->posts()->with('topic')->paginate();
        return view('blog-blade/posts-for-tag',[
            'posts'=>$posts,
            'tag' =>$tag
        ]);

    }

    
    public function getPostsForTopic(Request $request, $slug)
    {
        $topic = Topic::firstWhere('slug', $slug);
        $posts = $topic->posts()->with('topic')->paginate();
        return view('blog-blade/posts-for-topic',[
            'posts'=>$posts,
            'topic' =>$topic
        ]);
    }


  
    public function getPostsForUser(Request $request, $id)
    {
        $user = User::find($id);
        if(!$user)
        {
            return abort(404);
        }

        $posts = $user->posts()->with('topic')->paginate();
        
        return view('blog-blade/posts-for-user',[
            'posts'=>$posts,
            'user' =>$user
        ]);
    }
}
