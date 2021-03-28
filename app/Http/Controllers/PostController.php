<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\PostStoreRequest;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::all();

        return view('post.index', compact('courses'));
    }

    /**
     * @param \App\Http\Requests\PostStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $course = Course::create($request->validated());

        $request->session()->flash('courses.title', $courses->title);

        return redirect()->route('courses.index');
    }
}
