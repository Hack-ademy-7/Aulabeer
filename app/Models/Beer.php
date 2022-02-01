<?php

namespace App\Models;

use App\Models\Brewery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Beer extends Model
{
    use HasFactory;

    protected $fillable = ['name','type','price'];

    public function breweries(){
        return $this->belongsToMany(Brewery::class);
    }
   
}

