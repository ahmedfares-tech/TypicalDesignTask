<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Get Parent Categories
     */
    public function mainCategories(Request $request)
    {
        $limit = $request->limit ?? 20;
        $orderBy = $request->orderBy ?? 'id';
        $order = $request->order ?? 'desc';
        $category =  Category::orderBy($orderBy, $order)->whereNull('parent_id', null)->with('childrens')->paginate($limit);
        return $this->responseType(['categories' => $category], 'welcome');
    }
    /**
     *  GET category and childrens by id
     */
    public function getCategoryById(Request $request, Category $category)
    {
        $limit = $request->limit ?? 20;
        $orderBy = $request->orderBy ?? 'id';
        $order = $request->order ?? 'desc';
        $subCategories =  Category::orderBy($orderBy, $order)->where('parent_id', $category->id)->with('childrens')->paginate($limit);
        return $this->responseType(['categories' => $subCategories, 'parent' => $category], 'categories.subCategories');
    }
    /**
     * Create New Category
     */
    public function createCategory(CategoryRequest $request)
    {
        // dd($request->all());
        $newCategory = Category::create($request->validated());
        if ($request->image) {
            $image = $request->file('image');
            $path = 'public/categories/' . time() . rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $make = Image::make($image);
            Storage::put($path, $make->encode());
            $url = Storage::url($path);
            $newCategory->update(['image' => $url]);
        }
        return $this->responseType(['categories' => $newCategory, 'success' => true, 'message' => 'Category created'], 'welcome', true);
    }
    /**
     * Update Exists Category
     */
    public function updateCategory(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        if ($request->image) {
            $image = $request->file('image');
            $path = 'public/categories/' . auth()->user()->id . '/' . time() . rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $make = Image::make($image);
            Storage::put($path, $make->encode);
            $url = Storage::url($path);
            $category->update(['image' => $url]);
        }
        return $this->responseType(['categories' => $category, 'success' => true, 'message' => 'Category updated']);
    }
    /**
     * Delete Category Childrens this main category
     */
    public function destroy(Category $category)
    {
        $category->sub()->delete();
        $category->delete();
        return $this->responseType(['success' => true, 'message' => 'Category deleted']);
    }
    public function create()
    {
        $category =  Category::orderBy('id', 'desc')->whereNull('parent_id', null)->with('childrens')->get();
        return view('categories.create', ['categories' => $category]);
    }
}
