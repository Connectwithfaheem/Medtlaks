<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\e_book;

class E_bookCategory extends Model
{
    use HasFactory;
    protected $table = "e_book_category";
    public function E_BookRelation()
    {
        return $this->hasMany(e_book::class, 'category_id', 'id');
    }
}
