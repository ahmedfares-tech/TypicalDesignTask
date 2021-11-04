@extends('layouts.main')
@section('content')
    <div class="row text-center">
        <div class="col-12">
            <h1>Categories</h1>
        </div>
        @foreach ($categories as $cat)
            <div class="col-lg-3 col-md-4 col-s-12">
                <a href="{{ route('category.show', $cat->id) }}" style="text-decoration: none;color:black">
                    <div class="card">
                        <img class="card-img-top"
                            src="{{ filter_var($cat->image, FILTER_VALIDATE_URL) === false ? env('ASSET_URL') . $cat->image : $cat->image }}"
                            alt="">
                        <div class="card-body">
                            <h4 class="card-title">{{ $cat->name }}</h4>
                        </div>
                    </div>
                </a style="text-decoration: none;color:black">
            </div>

        @endforeach
    </div>
@endsection
