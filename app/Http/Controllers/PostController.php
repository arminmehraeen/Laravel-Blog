<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get() ;
        $response = [
            'status' => 'success',
            'message' => 'data load success',
            'data' => $posts,
        ];
        return response()->json($response, 200);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {

        $validate = Validator::make($request->all(), [
            'title' => 'required|string|max:250',
            'body' => 'required|string|',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($validate->fails()){
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);
        }

        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->body = $request->body;

        // Handle image upload and set image attribute
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->store();
            $request->image->move(public_path('images'), $imageName);
            $imageUrl = 'images/' . $imageName;
            // $imageUrl = $request->image->store('images');
            $post->image = $imageUrl ;
        }

        $post->save();

        $response = [
            'status' => 'success',
            'message' => 'Post is added successfully.',
            'data' => $post,
        ];

        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $response = [
            'status' => 'success',
            'message' => 'data load success',
            'data' => $post,
        ];
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post): \Illuminate\Http\JsonResponse
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|string|max:250',
            'body' => 'required|string|',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($validate->fails()){
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);
        }

        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->body = $request->body;

        // Handle image upload and set image attribute
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->store();
            $request->image->move(public_path('images'), $imageName);
            $imageUrl = 'images/' . $imageName;
            $post->image = $imageUrl ;
        }

        $post->save();

        $response = [
            'status' => 'success',
            'message' => 'Post is updated successfully.',
            'data' => $post,
        ];

        return response()->json($response, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete() ;
        $response = [
            'status' => 'success',
            'message' => 'data delete success',
            'data' => $post,
        ];
        return response()->json($response, 200);
    }
}
