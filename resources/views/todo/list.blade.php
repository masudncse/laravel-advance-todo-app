<div class="row">
    <div class="col-md-12 tab-list mb-2">
        Show Category:
        @foreach($categories as $category)
            <button type="button" class="btn btn-link" data-filter="{{ $category->name }}">
                {{ $category->name }}
            </button>
            @if(!$loop->last)
                <span>|</span>
            @else
                <span>|</span>
            @endif
        @endforeach
        <button type="button" class="btn btn-link active" data-filter="*">
            All
        </button>
    </div>
    <div class="col-md-12">
        <ul class="todo-list">
            @foreach($todos as $todo)
                <li class="@if($todo->status) completed @endif" data-category="{{ optional($todo->category)->name }}">
                    <div class="form-check">
                        <input type="checkbox" value="{{ $todo->id }}" id="todo_id-{{ $todo->id }}"
                               data-href="{{ route('todos.update', $todo->id) }}"
                               @if($todo->status) checked @endif
                               class="form-check-input ajaxChangeTodoStatus">
                        <label class="form-check-label" for="todo_id-{{ $todo->id }}">
                            {{ $todo->title }}
                        </label>
                        <a href="{{ route('todos.destroy', $todo->id) }}"
                           class="text-secondary float-end ajaxDestroyRecord"><i class="fa fa-times fa-6"></i></a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
