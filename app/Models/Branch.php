<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table ='branches';
   protected $fillable = ['building','city','postal_code','contact'];

    public function users(){

        return $this->hasMany(User::class);
    }
    
    public function parcel(){

        return $this->hasMany(Parcel::class);
    }

}
