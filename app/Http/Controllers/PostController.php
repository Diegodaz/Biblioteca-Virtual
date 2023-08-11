<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * It returns the index view with the posts variable.
     *
     * @return A view called posts.index with a variable called posts.
     */
    public function index()
    {
        $posts = Post::where('status', 2)->latest('id')->paginate(8);

        return view('posts.index', compact('posts'));
    }

    /**
     * It checks if the user is authorized to view the post, if not, it throws an exception. If the
     * user is authorized, it fetches the posts with the same category as the post being viewed, and
     * returns the view
     *
     * @param Post post The post object that we're passing to the view.
     *
     * @return A view of the post
     */
    public function show(Post $post)
    {

        $this->authorize('published', $post);
        $similarity = Post::where('category_id', $post->category_id)
            ->where('status', 2)
            ->where('id', '!=', $post->id)
            ->latest('id')
            ->take(4)
            ->get();
        return view('posts.show', compact('post', 'similarity'));
    }

    /**
     * It takes a category object as an argument, and returns a view with the posts that belong to that
     * category
     *
     * @param Category category This is the route parameter that we're passing to the method.
     *
     * @return A view with the posts and category
     */
    public function category(Category $category)
    {
        $posts = Post::where('category_id', $category->id)
            ->where('status', 2)
            ->latest('id')
            ->paginate(4);

        return view('posts.category', compact('posts', 'category'));
    }

    /**
     * It takes a tag object as an argument, and returns a view with the posts that have that tag
     *
     * @param Tag tag This is the tag object that we're passing in.
     *
     * @return A view with the posts and tag
     */
    public function tag(Tag $tag)
    {
        $posts =  $tag->posts()
            ->where('status', 2)
            ->latest('id')
            ->paginate(4);

        return view('posts.tag', compact('posts', 'tag'));
    }
}
