<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doctor;
class Specialist extends Model
{
    protected $guarded = [];

    public function doctors(){
    	return $this->hasMany(Doctor::class);
    }
}
