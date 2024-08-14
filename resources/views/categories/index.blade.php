<x-index-app>
    <ul class="list-unstyled list-group col-2 mx-auto">
        @foreach($categories as $category)
        <li class="text-decoration-none"><a class="list-group-item d-flex justify-content-between align-items-center" href="{{route('categories.show',$category)}}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</x-index-app>
