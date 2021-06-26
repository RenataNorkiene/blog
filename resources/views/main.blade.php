<!DOCTYPE html>
<html lang="en">
@include('_partials/head')
<body>
<!-- Navigation-->
@include('_partials/nav')
<!-- Page Header-->
@include('_partials/header')
<!-- Main Content-->
<div class="container px-4 px-lg-5">
   @yield('content')
</div>
<!-- Footer-->
@include('_partials/footer')
<!-- Bootstrap core JS-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<!-- Core theme JS-->
<script src="{{URL::asset('js/scripts.js')}}"></script>
</body>
</html>
