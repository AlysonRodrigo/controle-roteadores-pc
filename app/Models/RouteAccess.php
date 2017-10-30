<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RouteAccess extends Model
{
    protected $fillable = [
        'name', 'route_user', 'route_password', 'ppoe_user', 'ppoe_password',
        'wifi_user','wifi_password'
    ];
}
