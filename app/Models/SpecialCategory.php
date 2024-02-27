<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\SpecialTest;

class SpecialCategory extends Model
{
    use HasFactory;
    protected $table = 'special_test_category';

    public function SpecialRelation()
    {
        return $this->hasMany(SpecialTest::class, 'category_id', 'id');
    }
}

