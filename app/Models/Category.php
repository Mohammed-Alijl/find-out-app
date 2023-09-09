<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'category_type_id',
        'parent_category_id'
    ];
    public $translatable = ['name'];

    //===============================================================
    //========================== RELATIONSHIPS ======================
    //===============================================================
    public function categoryType()
    {
        return $this->belongsTo(CategoryType::class);
    }

    public function parentCategory(){
        return $this->belongsTo(Category::class,'parent_category_id');
    }

    public function childCategories(){
        return $this->hasMany(Category::class,'parent_category_id');
    }

    public function services(){
        return $this->hasMany(Service::class);
    }

}
