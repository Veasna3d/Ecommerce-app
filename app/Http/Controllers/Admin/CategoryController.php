<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryFormRequest $request)
    {
        $validatedDate = $request->validated();
        $category = new Category;

        $category->name = $validatedDate['name'];
        $category->slug = Str::slug($validatedDate['slug']);
        $category->description = $validatedDate['description'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->meta_title = $validatedDate['meta_title'];
        $category->meta_keyword = $validatedDate['meta_keyword'];
        $category->meta_description = $validatedDate['meta_description'];

        $category->status = $request->status == true ? '1' : '0';

        $category->save();
        return redirect('admin/category')->with('message', 'category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryFormRequest $request, $category)
    {
        //
        $category = Category::findOrFail($category);
        $validatedDate = $request->validated();

        $category->name = $validatedDate['name'];
        $category->slug = Str::slug($validatedDate['slug']);
        $category->description = $validatedDate['description'];

        if ($request->hasFile('image')) {

            $path = 'uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->meta_title = $validatedDate['meta_title'];
        $category->meta_keyword = $validatedDate['meta_keyword'];
        $category->meta_description = $validatedDate['meta_description'];

        $category->status = $request->status == true ? '1' : '0';

        $category->update();
        return redirect('admin/category')->with('message', 'category Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
    }
}
