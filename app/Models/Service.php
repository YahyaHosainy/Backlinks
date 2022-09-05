<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Extra;
use App\Models\Report;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Fetch all the extra prices related to a service
     */
    public function extras()
    {
        return $this->hasMany(ServiceExtra::class);
    }

    /**
     * Fetche all the orders related to a service
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
