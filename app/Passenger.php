<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $table ='passengers';

    public $timestamps = FALSE;

    protected $fillable =['phone_number', 'surname', 'name', 'patronymic', 'password'];
}
