<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
     protected $fillable = [
        'author_id',
        'language_id',
        'artical_url',
        'title',
        'sub_title',
        'description',
        'image',
        'status'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class,'author_id')->select('id', 'name');
    }
}
