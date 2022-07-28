<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::paginate(5);
        return view('menu.table', compact('menus'));
    }

    public function create(){
        return view('menu.add');
    }

    public function store(Request $request){
        $this->validate($request, [
            'gambar' => 'required|jpeg',
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);
    
        $menus = Menu::create($request->all());
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('images/', $request->file('gambar')->getClientOriginalName());
            $menus->gambar = $request->file('gambar')->getClientOriginalName();
            $menus->save();
        }
        return redirect()->route('menu');
    }

    public function edit($id){
        $menus = Menu::find($id);
        return view('menu.formedit', compact('menus'));
    }

    public function update(Request $request, $id){
        $menus = Menu::find($id);
        $menus->update($request->all());
        if ($request->hasFile('gambar')) {
            $gambar = 'images/'.$menus->gambar;
            if(File::exists($gambar)){
                File::delete($gambar);
            }
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalName();
            $filename = time().'.'.$extension;
            $file->move('images/', $filename);
            $menus->gambar = $filename;
        }
        return redirect()->route('menu');
    }

    public function destroy($id){
        $menus = Menu::find($id);
        $menus->delete();
        return redirect()->route('menu');
    }
}
