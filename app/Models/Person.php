<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'persons';

    protected $fillable = [
        'name', 'slug', 'description'
    ];

    public function post(){
        return $this->hasMany(Post::class)->orderBy('id','DESC');
    }
}