<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoadList extends Model
{
    protected $table ='road_lists';

    public $timestamps = FALSE;

    protected $fillable =['valid_from', 'valid_untill', 'car_number', 'license_number'];
}
