@extends('layouts.home')
@section('content')

<section class="mt-10">
    @include('partials._librarySearch')
    @include('partials._catalogue')
</section>
@endsection