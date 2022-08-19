<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get categories
        $categories = Category::latest()->paginate(5);

        //return collection of categories as a resource
        return new CategoryResource(true, 'List Data Kategori', $categories);
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'kategori'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create category
        $category = Category::create([
            'kategori'     => $request->kategori,
        ]);

        //return response
        return new CategoryResource(true, 'Data Kategori Berhasil Ditambahkan!', $category);
    }
        
    /**
     * show
     *
     * @param  mixed $category
     * @return void
     */
    public function show(Category $category)
    {
        //return single category as a resource
        return new CategoryResource(true, 'Data Kategori Ditemukan!', $category);
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $category
     * @return void
     */
    public function update(Request $request, Category $category)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'kategori'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        
        $category->update([
            'kategori'   => $request->kategori,
        ]);

        //return response
        return new CategoryResource(true, 'Data Kategori Berhasil Diubah!', $category);
    }
    
    /**
     * destroy
     *
     * @param  mixed $category
     * @return void
     */
    public function destroy(Category $category)
    {
        //delete category
        $category->delete();

        //return response
        return new CategoryResource(true, 'Data Kategori Berhasil Dihapus!', null);
    }
}
