<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    public function menu() {
        return $this->belongsTo(Menu::class);
    }
    public function timing() {
        return $this->belongsTo(Timing::class);
    }
}
