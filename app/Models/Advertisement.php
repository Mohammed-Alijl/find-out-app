<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Advertisement extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
      'name',
      'category_type_id',
      'service_id',
      'display_place',
      'city_id',
      'status',
    ];

    public $translatable = ['name'];


    //===============================================================
    //========================== RELATIONSHIPS ======================
    //===============================================================
    public function categoryType(){
        return $this->belongsTo(CategoryType::class,'category_type_id');
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function images(){
        return $this->hasMany(AdvertisementImage::class);
    }
}
