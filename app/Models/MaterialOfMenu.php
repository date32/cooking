<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialOfMenu extends Model
{
    use HasFactory;

    public function menu() {
        return $this->belongsTo(Menu::class);
    }
    public function material() {
        return $this->belongsTo(Material::class);
    }
}
