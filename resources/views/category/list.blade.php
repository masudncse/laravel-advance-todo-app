<div class="row">
    <div class="col-md-12">
        <ul class="category-list">
            @foreach($categories as $category)
                <li>
                    <a href="{{ route('categories.destroy', $category->id) }}"
                       class="text-danger ajaxDestroyRecord"><i class="fa fa-times fa-6"></i></a>
                    {{ $category->name }}
                </li>
            @endforeach
        </ul>
    </div>
</div>
