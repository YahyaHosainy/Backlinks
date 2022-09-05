<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\User;

class Fund extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Fetch the owner of a fund
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
