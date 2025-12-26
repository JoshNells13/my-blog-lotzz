<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['id_category', 'title', 'slug', 'content', 'thumbnail'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function images()
    {
        return $this->hasMany(BlogImage::class, 'id_blog');
    }

    public function setFieldNameAttribute($value){
        $this->attributes['title'] = strtolower($value);
        $this->attributes['slug'] = Str::slug($value);
    }
}
