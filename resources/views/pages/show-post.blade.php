@extends('main')
@section('content')
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-preview">
                        <h2 class="post-title">{{$post->title}}</h2>
                        <h3 class="post-subtitle">{{$post->content}}</h3>
                </div>
            <div>
                <div class="card">
                    <div class="card-block ">
                        <form action="/post/{{$post->id}}/comment" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <textarea name="body" placeholder="Jūsų komentaras" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Komentuoti</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="comments">
                <ul>
                    @foreach($post->comments as $comment)
                        <li>{{$comment->comment}}</li>

                    @endforeach
                </ul>
            </div>
                <button type="submit" class="btn btn-warning"><a href="/update/{{$post->id}}">Regaduoti</a></button>
                <button type="submit" class="btn btn-danger "><a href="/delete/{{$post->id}}" onclick="return confirm('Ar tikrai norite ištrinti postą?')">Šalinti</a></button>
                </ul>
        </div>
    </div>
@endsection
