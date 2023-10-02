<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    public function likesAndDislikes() {
        return $this->hasMany(LikesAndDislike::class);
    }
    public function delete() {
        $this->likesAndDislikes()->delete();
        return parent::delete();
    }
}
