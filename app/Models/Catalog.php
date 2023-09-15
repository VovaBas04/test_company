<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps = false;
    public function catalogs(){
        return $this->hasMany(Catalog::class);
    }
    public function catalog(){
        return $this->belongsTo(Catalog::class);
    }
}
