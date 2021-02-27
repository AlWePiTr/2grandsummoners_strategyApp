<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = post::all();
        return response()->json([
            'message' => 'OK',
            'data' => $items
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new post;
        $item->content = $request->content;
        $item->posting_time = $request->posting_time;
        $item->save();
        return response()->json([
            'message' => 'Created successfully',
            'data' => $item
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        $item = post::where('id', $post->id)->first();
        if ($item) {
            return response()->json([
                'message' => 'OK',
                'data' => $item
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found'
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $item = post::where('id', $post->id)->first();
        $item->content = $request->content;
        $item->posting_time = $request->posting_time;
        $item->save();
        if($item) {
            return response()->json([
                'message' => 'Updated succesfully',
                'data' => $item
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $item = post::where('id', $post->id)->delete();
        if ($item) {
            return response()->json([
                'message' => 'Deleted succesfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }        
    }
}
