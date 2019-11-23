<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Time;
class Day extends Model
{
    protected $guarded = [];


    public function times(){
    	return $this->hasMany(Time::class);
    }

}
