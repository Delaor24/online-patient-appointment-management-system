<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doctor;
class Appointment extends Model
{
    protected $guarded = [];
    
    public function doctor(){
    	return $this->belongsTo(Doctor::class);
    }
}
