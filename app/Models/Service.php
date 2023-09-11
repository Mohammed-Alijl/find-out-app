<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = [
      'name',
      'start_at',
      'end_at',
      'facebook_link',
      'instagram_link',
      'twitter_link',
      'category_id',
      'sub_category_id',
      'fixing_place',
      'details',
    ];
    public $translatable = ['name'];


    //===============================================================
    //========================== RELATIONSHIPS ======================
    //===============================================================
    public function images(){
        return $this->hasMany(ServiceImage::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function zones(){
        return $this->belongsToMany(Zone::class);
    }

    public function cities(){
        return $this->belongsToMany(City::class)->withPivot('mobile_number');
    }

    public function subCategory(){
        return $this->belongsTo(Category::class,'sub_category_id');
    }
}
