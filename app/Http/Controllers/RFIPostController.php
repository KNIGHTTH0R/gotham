<?php

namespace gotham\Http\Controllers;

use Illuminate\Http\Request;
use gotham\RFIPost;
use gotham\User;
use gotham\Events\RFIUpdated;

class RFIPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = RFIPost::get();

        return view('rfis.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('rfis.posts_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rfi_post = new RFIPost;
        
        $rfi_post->subject = $request->input('subject');
        $rfi_post->message = $request->input('body');
        $rfi_post->user_id = $request->input('uid');
        $rfi_post->rfi_id = $request->input('rfi_id');
        
        $rfi_post->save();
        $user = User::find($rfi_post->user_id);
        
        $rfi_post->rfi->last_updated_by = $user->id;
        $rfi_post->rfi->save();
        
        
        foreach($rfi_post->rfi->project->users()->get() as $puser){
            
            event(new RFIUpdated([$rfi_post->rfi, $puser]));
        }
        
        // Notify RFI Creator
        //dd($rfi_post->rfi->user_id
        
         return redirect('/projects/rfis/posts/' . $rfi_post->slug);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $post = RFIPost::where('slug', $slug)->first();
        
        return view('rfis.posts_show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
