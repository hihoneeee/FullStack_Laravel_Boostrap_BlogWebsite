<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function person(){
        return $this->belongsTo(Person::class, 'person_id');
    }
}