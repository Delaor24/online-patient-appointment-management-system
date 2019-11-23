<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Specialist;
use App\Appointment;
use App\Day;
use App\Time;
use Illuminate\Notifications\Notifiable;
class Doctor extends Authenticatable
{
	use Notifiable;

    protected $guarded = [];

    public function specialist(){
    	return $this->belongsTo(Specialist::class);
    }

    public function appointments(){
    	return $this->hasMany(Appointment::class);
    }


    public function days(){
    	return $this->hasMany(Day::class);
    }

   public function times(){
        return $this->hasMany(Time::class);
    }
}
