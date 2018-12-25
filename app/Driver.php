<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table ='drivers';

    public $timestamps = FALSE;

    protected $fillable =['license_number', 'surname', 'name', 'patronymic', 'password'];
}
