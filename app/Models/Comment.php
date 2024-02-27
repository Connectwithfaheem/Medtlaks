<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table =  'blog_review';


    public function customers()
    {
        return $this->belongsTo(customer::class, 'customer_id');
    }
}


