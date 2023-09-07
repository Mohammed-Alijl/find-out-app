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
        'type_id'
    ];
    public $translatable = ['name'];

    //===============================================================
    //========================== RELATIONSHIPS ======================
    //===============================================================
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

}
