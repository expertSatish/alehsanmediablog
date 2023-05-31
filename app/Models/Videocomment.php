<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Videocomment extends Model
{
    use HasFactory;
    protected $table = 'videocoments';

    protected $fillable = [
        'video_id',
        'name',
        'email',
        'phone',
        'message',
    ];
}
