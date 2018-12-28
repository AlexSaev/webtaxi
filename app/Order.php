<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='orders';

    public $timestamps = FALSE;

    protected $fillable =['point_of_arrival', 'departure_point', 'payment_for_travel',
        'date_of_the_travel', 'phone_number', 'license_number'];

    public function latest($column = 'date_of_the_travel')
    {
        return $this->orderBy($column, 'desc');
    }
}
