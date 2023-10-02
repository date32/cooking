<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    public function materialOfMenus() {
        return $this->hasMany(MaterialOfMenu::class);
    }
    public function delete() {
        $this->materialOfMenus()->delete();
        return parent::delete();
    }
}
