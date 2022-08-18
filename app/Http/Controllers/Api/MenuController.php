<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function index()
    {
        //get menus
        $menus = Menu::latest()->paginate(5);

        //return collection of menus as a resource
        return new MenuResource(true, 'List Data Menu', $menus);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_menu'     => 'required',
            'deskripsi'   => 'required',
            'harga'   => 'required',
            'kategori_id'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/menus', $image->hashName());

        //create menu
        $menu = Menu::create([
            'image'     => $image->hashName(),
            'nama_menu'     => $request->nama_menu,
            'deskripsi'   => $request->deskripsi,
            'harga'   => $request->harga,
            'kategori_id'   => $request->kategori_id,
        ]);

        //return response
        return new MenuResource(true, 'Data Menu Berhasil Ditambahkan!', $menu);
    }

    public function show(Menu $menu)
    {
        //return single menu as a resource
        return new MenuResource(true, 'Data Menu Ditemukan!', $menu);
    }
}
