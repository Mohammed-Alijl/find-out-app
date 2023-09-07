<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Zone extends Model
{
    use HasFactory, HasTranslations;




    protected $fillable = [
        'name',
        'country_id'
    ];

    public $translatable = ['name'];
    //===============================================================
    //========================== RELATIONSHIPS ======================
    //===============================================================
    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function cities(){
        return $this->hasMany(City::class);
    }
}
