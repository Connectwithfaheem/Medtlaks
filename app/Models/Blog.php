<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin;
use App\Model\SpecialTest;
use App\Models\Comment;


class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id',
        'custom_url',
        'meta_keyword',
        'meta_description',
        'thumbnail',
        'content',
        'status',
    ];
    public function SpecialTest()
    {
        return $this->hasMany(SpecialTest::class, 'blog_id', 'id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id', 'product_id');
    }



}
