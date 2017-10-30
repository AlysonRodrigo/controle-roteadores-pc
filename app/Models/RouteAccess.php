<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class RouteAccess extends Model implements TableInterface
{
    protected $fillable = [
        'name', 'route_user', 'route_password', 'ppoe_user', 'ppoe_password',
        'wifi_user','wifi_password'
    ];

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['#','Nome','Route user','Ppoe user', 'Wifi user'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header){
            case '#':
                return $this->id;
            case 'Nome':
                return $this->name;
            case 'Route user':
                return $this->route_user;
            case 'Ppoe user':
                return $this->ppoe_user;
            case 'Wifi user':
                return $this->wifi_user;
        }
    }
}
