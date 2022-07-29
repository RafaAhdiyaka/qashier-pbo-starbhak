<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(5);
        return view('admin.user.table', compact('users'));
    }

    public function create(){
        return view('admin.user.add');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);
    
        User::create($request->all());
        return redirect()->route('admin.user');
    }

    public function edit($id){
        $users = User::find($id);
        return view('admin.user.formedit', compact('users'));
    }

    public function update(Request $request, $id){
        $users = User::find($id);
        $users->update($request->all());
        return redirect()->route('admin.user');
    }

    public function destroy($id){
        $users = User::find($id);
        $users->delete();
        return redirect()->route('admin.user');
    }
}
