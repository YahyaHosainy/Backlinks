<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Fetch the user of this payment
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
