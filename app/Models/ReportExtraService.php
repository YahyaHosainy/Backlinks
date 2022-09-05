<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Extra;

class ReportExtraService extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Fetch the report of an extra service
     */
    public function report()
    {
        return $this->belongsTo(Report::cass);
    }

    /**
     * Fetch the service of a ReportExtraService
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Fetch the extra service of a ReportExtraSerice
     */
    public function extra()
    {
        return $this->belongsTo(Extra::class);
    }
}
