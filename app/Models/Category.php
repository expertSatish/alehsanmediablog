<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        //'language_id',
        //'menu',
        'parent_id',
        'name',
        'code',
        'url',
        'image',
        'shortdesc_image',
        'shortdesc_content',
        'aboutus_image',
        'aboutus_content',
        'second_title',
        'second_content',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status'
    ];

    // public function parent(){
    //     return $this->hasOne(Category::class,'id','parent_id');
    // }

    // public function direct_childs(){
    //     return $this->hasMany(Category::class,'parent_id','id');
    // }

    // public function all_childs(){
    //     return $this->hasMany(Category::class,'parent_id','id')->with('direct_childs');
    // }

    public function articals()
    {
        // return $this->hasMany(Category::class,'parent_id','id');
        return $this->hasMany(Artical::class,'category_id','id')->with('user');
    }

    public function subcategories(){
        return $this->hasMany(Category::class,'parent_id');
    }

    public function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }
    public function parentName(){
        return $this->belongsTo(Category::class,'parent_id')->select('id', 'name','url');
    }

    public static function idByName($id)
    {
      $data = Category::where('parent_id',$id);
      return ($data)?$data->name:'';
    }


}
