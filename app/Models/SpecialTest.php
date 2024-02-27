<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialTest extends Model
{
    use HasFactory;
    protected $table = "special_tests";

    public function blog()
    {
        return $this->hasMany(Blog::class, 'id', 'blog_id');
    }
}
