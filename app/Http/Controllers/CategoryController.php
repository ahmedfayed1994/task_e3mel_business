<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.category', compact('categories'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255'
        ]);

        $data = new Category();
        $data->name = $request->name;
        $data->status = 1;
        $data->save();

        $response = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($response);
    }

    /**
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,id|max:255'
        ]);

        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();

        if ($category) {
            $response = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('categories')->with($response);
        }

        $response = array(
            'message' => 'Nothing To Update',
            'alert-type' => 'error'
        );
        return redirect()->route('categories')->with($response);

    }

    /**
     * @param Category $category
     * @return RedirectResponse
     * @throws \Exception
     */
    public function delete(Category $category): RedirectResponse
    {
        $category->delete();
        $response = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($response);
    }
}
