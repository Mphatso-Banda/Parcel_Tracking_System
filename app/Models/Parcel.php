<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use HasFactory;

    protected $table ='parcels';
   protected $fillable = [
    'sender_name',
   'sender_address',
   'sender_contact',
   'recipient_name',
   'recipient_address',
   'recipient_contact',
   'frombranch_id',
   'tobranch_id',
   'weight',
   'price' ];

   public function branch(){

    return $this->belongsToMany(Branch::class);
}

public function parceltrack(){

    return $this->hasMany(Parceltrack::class);
}
}
