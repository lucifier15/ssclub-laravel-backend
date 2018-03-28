<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    protected $fillable=['name','roll_no','phone','email','eventId','event'];
}
