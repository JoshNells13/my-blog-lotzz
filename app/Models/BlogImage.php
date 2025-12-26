<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model
{
    use HasFactory;

    protected $fillable = ['id_blog', 'image_path'];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'id_blog');
    }
}
