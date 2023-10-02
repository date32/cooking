<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function likesAndDislikes() {
        return $this->hasMany(LikesAndDislike::class);
    }
    public function materialOfMenus() {
        return $this->hasMany(MaterialOfMenu::class);
    }
    public function dates() {
        return $this->hasMany(Date::class);
    }
    public function delete() {
        $this->likesAndDislikes()->delete();
        $this->materialOfMenus()->delete();
        $this->dates()->delete();
        return parent::delete();
    }
}
