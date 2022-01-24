<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parceltrack extends Model
{
    use HasFactory;

    public function parcel(){

        return $this->belongsToOne(Parcel::class);
    }
}
