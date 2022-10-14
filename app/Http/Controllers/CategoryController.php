<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Database\QueryException;

class CategoryController extends Controller
{
    /**
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(CategoryRequest $request)
    {
        $inputs = $request->all();

        try {
            $category = new Category();
            $category->fill($inputs);
            $category->save();
        } catch (\Exception $exception) {
            throw $exception;
        }

        return back()->with('success', __('Record saved successfully.'));
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } catch (QueryException $exception) {
            report($exception);
            if ($exception->getCode() === '23000') {
                return $this->makeErrorResponse(__("Can't delete a parent row."));
            }
        } catch (\Exception $exception) {
            report($exception);
            return $this->makeErrorResponse(__($exception->getMessage()));
        }

        return $this->makeSuccessResponse(__('Record deleted successfully.'));
    }
}
