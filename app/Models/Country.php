<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = ['name'];

    public $translatable = ['name'];


    //===============================================================
    //========================== RELATIONSHIPS ======================
    //===============================================================
    public function zones(){
        return $this->hasMany(Zone::class);
    }
}
