<div class="row">
    <div class="col-md-12">
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="row g-2">
                <div class="col-md-9 mb-3">
                    <label for="title" class="form-label">
                        Add Category
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}" id="title" class="form-control"
                           maxlength="30" required="required">
                    @error('name')
                    <label class="error mt-2 text-danger">{{ $message }}</label>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label d-grid">&nbsp;</label>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark-grey">
                            Add Category
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
