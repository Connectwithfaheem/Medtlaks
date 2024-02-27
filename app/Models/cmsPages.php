<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cmsPages extends Model
{
    use HasFactory;
    protected $table = 'cms_pages';
    protected $fillable = [
        'cmsPages',
        'status',
        'content'
    ];
}
