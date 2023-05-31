<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artical extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'language_id',
        'title',
        'category_id',
        'subcategory_id',
        'destination_id',
        'url',
        'image',
        'content',
        'author_id',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status', 
        'aproved', 
        'viewd',
        'shared',
        'date',
        'user_name'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'author_id')->select('id', 'name');
    }

    public function comment(){

        return $this->hasMany(Comment::class,'artical_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id')->select('id', 'name','url');
    }
    public function categoryName()
    {
        return $this->belongsTo(Category::class,'subcategory_id')->select('id', 'name','url');
    }
  
    
    
}
