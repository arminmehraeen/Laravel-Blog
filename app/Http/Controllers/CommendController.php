<?php

namespace App\Http\Controllers;

use App\Models\Commend;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommendController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->exists('post_id') ) {
            $data = Commend::where([
                ['post_id', '=', $request->post_id],
                ['commend_id', '=', null],
            ])->latest()->get() ;
            $response = [
                'status' => 'success',
                'message' => 'data load success',
                'data' => $data,
            ];
            return response()->json($response, 200);
        }

        $data = Commend::all() ;
        $response = [
            'status' => 'success',
            'message' => 'data load success',
            'data' => $data,
        ];
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validate = Validator::make($request->all(), [
            'message' => 'required|string|max:250',
            'post_id' => 'required|int|',
            'commend_id' => 'int',
        ]);

        if($validate->fails()){
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);
        }


        $object = new Commend();
        $object->user_id = Auth::user()->id;
        $object->message = $request->message;
        $object->post_id = $request->post_id;
        if($request->exists('commend_id')) {
            $object->commend_id = $request->commend_id;
        }


        $object->save();

        $response = [
            'status' => 'success',
            'message' => 'Commend is added successfully.',
            'data' => $object,
        ];

        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Commend $commend)
    {
        $response = [
            'status' => 'success',
            'message' => 'data load success',
            'data' => $commend,
        ];
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commend $commend): \Illuminate\Http\JsonResponse
    {
        $validate = Validator::make($request->all(), [
            'message' => 'required|string|max:250',
            'post_id' => 'required|int|',
        ]);

        if($validate->fails()){
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);
        }

        $commend->user_id = Auth::user()->id;
        $commend->message = $request->message;
        $commend->post_id = $request->post_id;

        $commend->save();

        $response = [
            'status' => 'success',
            'message' => 'Commend is updated successfully.',
            'data' => $commend,
        ];

        return response()->json($response, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commend $commend)
    {
        $commend->delete() ;
        $response = [
            'status' => 'success',
            'message' => 'data delete success',
            'data' => $commend,
        ];
        return response()->json($response, 200);
    }
}
