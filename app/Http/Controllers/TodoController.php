<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(TodoRequest $request)
    {
        $inputs = $request->all();

        try {
            $todo = new Todo();
            $todo->fill($inputs);
            $todo->save();
        } catch (\Exception $exception) {
            throw $exception;
        }

        return back()->with('success', __('Record saved successfully.'));
    }

    /**
     * @param Request $request
     * @param Todo $todo
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Todo $todo)
    {
        try {
            $todo->status = !$todo->status;
            $todo->update();
        } catch (\Exception $exception) {
            report($exception);
            return $this->makeErrorResponse(__($exception->getMessage()));
        }

        return static::makeSuccessResponse(__('Record updated successfully.'), $todo);
    }

    /**
     * @param Todo $todo
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Todo $todo)
    {
        try {
            $todo->delete();
        } catch (\Exception $exception) {
            report($exception);
            return $this->makeErrorResponse(__($exception->getMessage()));
        }

        return $this->makeSuccessResponse(__('Record deleted successfully.'));
    }
}
