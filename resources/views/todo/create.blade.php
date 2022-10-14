<div class="row">
    <div class="col-md-12">
        <form action="{{ route('todos.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="row g-2">
                <div class="col-md-12 mb-3">
                    <label for="title" class="form-label">
                        Add TO DO
                    </label>
                    <input type="text" name="title" value="{{ old('title') }}" id="title" class="form-control"
                           maxlength="120" required="required">
                    @error('title')
                    <label class="error mt-2 text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <div class="col-md-8 mb-3">
                    <label for="category_id" class="form-label">
                        Category
                    </label>
                    <select class="form-select" name="category_id" id="category_id" required="required">
                        <option value="" selected>Choose Category</option>
                        @foreach($categories as $category)
                            <option @if($category->id == old('category_id')) selected
                                    @endif value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <label class="error mt-2 text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label d-grid">&nbsp;</label>
                    <button type="submit" class="btn btn-dark-grey">Add TODO</button>
                </div>
            </div>
        </form>
    </div>
</div>
