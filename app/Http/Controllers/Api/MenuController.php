<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;

class MenuController extends Controller
{
    public function index()
    {
        //get menus
        $menus = Menu::latest()->paginate(5);

        //return collection of menus as a resource
        return new MenuResource(true, 'List Data Menu', $menus);
    }
}
