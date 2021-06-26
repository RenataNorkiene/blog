@extends('main')
@section('content')
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">
        @foreach($posts as $post)
        <div class="post-preview">
{{--            posto atidarymas naujame puslapyje--}}
            <a href="post/{{$post->id}}">
                <h2 class="post-title">{{$post->title}}</h2>
            </a>
            <img src="{{$post->img}}" alt="{{$post->title}}">
            <p class="post-subtitle">{{Str::limit($post-> content,50)}}</p>
            <a href="/post/{{$post->id}}" class="btn btn-primary">Skaityti daugiau...</a>
        </div>
    @endforeach
            {{--            kad galetume puslapiuoti ir rodytu prevous ir next--}}
        <div class="clearfix mt-5">
            {{$posts->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
@endsection
