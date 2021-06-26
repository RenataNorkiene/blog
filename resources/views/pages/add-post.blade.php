@extends('main')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto mb-3">
            @include('_partials/errors')
            <form action="/store" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group mb-3">
                    <input type="text" class="form-control" placeholder="Pavadinimas" name="title">
                </div>
                <div class="form-group mb-3">
                    <textarea class="form-control" placeholder="Turinys" name="body"></textarea>
                </div>
                <div class="form-group custom-file offset-md-3 col-md-6 mb-3 mb-md-0">
                    <input type="file" class="custom-file-input text-black" name="img" id="postimg" lang="lt">
                    <label class="custom-file-label text-black" for="listingImage">Pasirinkite failą</label>
                </div>
                <button type="submit" class="btn btn-primary">Saugoti</button>
            </form>
        </div>
    </div>
@endsection
