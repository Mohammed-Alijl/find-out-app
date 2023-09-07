<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nette\Utils\Type;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_id',
        'parent_category_id'
    ];
    public $translatable = ['name'];

    //===============================================================
    //========================== RELATIONSHIPS ======================
    //===============================================================
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function parentCategory(){
        return $this->belongsTo(Category::class,'parent_category_id');
    }

    public function childCategories(){
        return $this->hasMany(Category::class,'parent_category_id');
    }

}
