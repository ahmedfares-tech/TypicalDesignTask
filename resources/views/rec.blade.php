<a class="dropdown-item" data-value={{ $cat->id }} name="parent_id" data-level={{ $count++ }} href="#">{{ $cat->name }}</a>
@if (count($cat->childrens) > 0)
    @foreach ($cat->childrens as $sub)
        @include('rec',['cat'=>$sub,'count' => $count])
    @endforeach
@endif
