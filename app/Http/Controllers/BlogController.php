<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(){
        $posts=Post::paginate(5);
        return view('pages.home', compact('posts'));
    }
    public function createPost(){ //metodas grazinantis post forma

        return view('pages.add-post');
    }

    public function store(Request $request){ //skirtas post'o issaugojimui per request - pasiimame duomenis is formos
        $validateData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'img' => 'mimes:jpg,jpeg,png |required | max:10000'
        ]);
        $path = $request->file('img')->store('public/images');
        $filename = str_replace('public/', "", $path);

        Post::create([ //sukuriame posta (per modeli, kvieciamas statinis metodas create)
           'title' => request('title'),
           'content' => request('body'),
            'img' => $filename,
            'user_id' => Auth::id()
        ]);
        return redirect('/'); //kai papostinam sekmingai grazina i pradini puslapi
    }
    //atidarome post atskirame puslapyje, paduodam posta pagal jo id:
    public function show(Post $post){
        return view('pages.show-post', compact('post'));
    }
    public function destroy(Post $post){
        if(Gate::allows('destroy', $post)) {
            $post->delete();
            return redirect('/');
        }
        dd('Klaida, jus neturite teises');


    }
    public function update(Post $post){
        if(Gate::allows('update', $post)) {
            return view('pages.update', compact('post'));
        }
        dd('Klaida, jus neturite teises');

    }
    public function storeUpdate(Request $request, Post $post){
        if($request->file()){
            Storage::delete('app/public'.$post->img);
            $path = $request->file('img')->store('public/images');
            $filename = str_replace('public/', "", $path);
            Post::where('id', $post->id)->update(['img' =>$filename]);
        }
        Post::where('id', $post->id)->update($request->only(['title', 'content']));

        return redirect('/post/'.$post->id);
    }

}
