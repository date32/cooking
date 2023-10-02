<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timing extends Model
{
    use HasFactory;

    public function dates() {
        return $this->hasMany(Date::class);
    }
    public function delete() {
        $this->dates()->delete();
        return parent::delete();
    }
}
