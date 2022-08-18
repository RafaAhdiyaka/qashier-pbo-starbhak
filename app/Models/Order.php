<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded =[];
    public function noMeja(){
        return $this->belongsTo(Meja::class, 'meja_id', 'id');
    }

    public function menu(){
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}
