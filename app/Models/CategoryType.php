<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CategoryType extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name'
    ];
    public $translatable = ['name'];

    //===============================================================
    //========================== RELATIONSHIPS ======================
    //===============================================================
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
