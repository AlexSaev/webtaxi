<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Automobile extends Model
{
    protected $table ='automobiles';

    public $timestamps = FALSE;

    protected $fillable =['car_number', 'car_brand', 'model', 'color'];
}
