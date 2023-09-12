<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'message',
        'user_id'
    ];

    //===============================================================
    //========================== RELATIONSHIPS ======================
    //===============================================================
    public function customer(){
        return $this->belongsTo(User::class,'user_id');
    }
}
