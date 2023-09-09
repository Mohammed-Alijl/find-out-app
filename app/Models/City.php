<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasFactory, HasTranslations;
    protected $fillable = ['name','zone_id'];

    public $translatable = ['name'];


    //===============================================================
    //========================== RELATIONSHIPS ======================
    //===============================================================
    public function zone(){
        return $this->belongsTo(Zone::class);
    }

    public function customers(){
        return $this->hasMany(User::class);
    }

    public function services(){
        return $this->belongsToMany(Service::class);
    }
}
