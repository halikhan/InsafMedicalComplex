<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Doctor;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add-category',[
            'categories'=> Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        // dd($request->all());
        $request->validate([
            'category_name'=> 'required|string|min:5|max:20',
            // 'status'=> 'required|boolean',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->status = $request->status;
        $category->save();
        // Category::saveCategory($request);
        // return back();
        return back()->with('message', 'Category added successfully!');

=======
        $request->validate([
            'category_name'=> 'required|string|min:5|max:20',
        ]);
        Category::saveCategory($request);
        return back();
>>>>>>> 4d0cdcbbad56ca35cf2064831b8fbef357107b1f
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
    public function edit(string $id)
    {
        return view('admin.category.edit-category',[
            'category' =>Category::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Category::updateCategory($request,$id);
        return redirect('category/create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return back();
    }
}
