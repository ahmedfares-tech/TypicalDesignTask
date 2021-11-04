@extends('layouts.main')
@section('content')

    <div class="row text-center p-4">
        <div class="col-12">
            <h1>Parent Category: {{ $parent->name }}</h1>
        </div>

    </div>
    <div class="row w-100">
        @foreach ($categories as $cat)
            <div class="col-12">
                <a href="{{ route('category.show', $cat->id) }}" style="text-decoration: none;color:blue">
                    <div class="card" style="width:50%">
                        <img src="{{ filter_var($cat->image, FILTER_VALIDATE_URL) === false ? env('ASSET_URL') . $cat->image : $cat->image }}"
                            style="height:250px;" />
                        <div class="card-body">
                            <h4 class="card-title">{{ $cat->name }}</h4>
                            <p>Children of :{{ $parent->name }}</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="row text-center p-4">
                @foreach ($cat->childrens as $item)
                    <div class="col">
                        <a href="{{ route('category.show', $item->id) }}" style="text-decoration: none;color:red">
                            <div class="card text-center" style="align-content: center;align-items:center">
                                <img class="card-img-top"
                                    src="{{ filter_var($item->image, FILTER_VALIDATE_URL) === false ? env('ASSET_URL') . $item->image : $item->image }}"
                                    alt="" style="height:250px;">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $item->name }}</h4>
                                    <p>Children of :{{ $cat->name }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
