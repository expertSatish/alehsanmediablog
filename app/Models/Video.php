<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_id',
        'title',
        'title_hindi',
        'title_arabic',
        'title_urdu',
        'vedio_cover',
        'url',
         'link',
        'status',
        'aproved',
        'viewd',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class,'author_id')->select('id', 'name');
    }
    public function comment(){
      
        return $this->hasMany(Videocomment::class,'video_id');
    }
}
