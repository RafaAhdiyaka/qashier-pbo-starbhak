<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(5);
        return view('category.table', compact('categories'));
    }

    public function create(){
        return view('category.add');
    }

    public function store(Request $request){
        $this->validate($request, [
            'kategori' => 'required',
        ]);
    
        Category::create($request->all());
        return redirect()->route('category');
    }

    public function edit($id){
        $categories = Category::find($id);
        return view('category.formedit', compact('categories'));
    }

    public function update(Request $request, $id){
        $categories = Category::find($id);
        $categories->update($request->all());
        return redirect()->route('category');
    }

    public function destroy($id){
        $categories = Category::find($id);
        $categories->delete();
        return redirect()->route('category');
    }
}
