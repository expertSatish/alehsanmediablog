<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
     protected $fillable = [
        'author_id',
        'title',
        // 'title_hindi',
        // 'title_arabic',
        // 'title_urdu',
        'editor',
        'compilers',
        'assistants',
        'translator',
        'researchanalysis',
        'totalpages',
        'publisher',
        'publicationdate',
        'book_cover',
        'book_image',
        'book_pdf',
        'link',
        'status', 
        'aproved',
        'url',
        'viewd',
        'shared',
        'pdf_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'author_id')->select('id', 'name');
    }
    public function comment(){

        return $this->hasMany(Bookcomment::class,'book_id');
    }


}
