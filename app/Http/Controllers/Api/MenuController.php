<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function index()
    {
        //get menus
        $menus = Menu::latest()->get();

        //return collection of menus as a resource
        return new MenuResource(true, 'List Data Menu', $menus);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_menu'     => 'required',
            'deskripsi'   => 'required',
            'harga'   => 'required',
            'kategori_id'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create menu
        $menu = Menu::create([
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

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $menu
     * @return void
     */
    public function update(Request $request, Menu $menu)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_menu'   => 'required',
            'deskripsi'   => 'required',
            'harga'   => 'required',
            'kategori_id'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $menu->update([
            'nama_menu'     => $request->nama_menu,
            'deskripsi'   => $request->deskripsi,
            'harga'   => $request->harga,
            'kategori_id'   => $request->kategori_id,
        ]);

        //return response
        return new MenuResource(true, 'Data Menu Berhasil Diubah!', $menu);
    }

    /**
     * destroy
     *
     * @param  mixed $menu
     * @return void
     */
    public function destroy(Menu $menu)
    {
        //delete menu
        $menu->delete();

        //return response
        return new MenuResource(true, 'Data Menu Berhasil Dihapus!', null);
    }
}
