<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use App\Service\AdminSearchEngine\CategorySearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminCategoriesController extends Controller
{
    public function categoriesList(CategorySearch $categorySearch, Request $request)
    {
        $categories = $categorySearch->search($request);
        
        return view('admin.management.categories.categoriesList', compact('categories'));
    }

    public function createCategory()
    {
        $categories = Category::all();
        return view('admin.management.categories.addCategory', compact('categories'));
    }

    public function storeCategory(CategoryStoreRequest $request)
    {
        $newCategory = $request->validated();
        Category::create($newCategory);
        return Redirect::route('categoriesList');

    }

    public function destroyCategory(Category $category)
    {
        $category->delete();

        if (!empty($category->image)) {

            Storage::delete($category->image ?? '');
        }


        return Redirect::route('categoriesList');
    }
}
