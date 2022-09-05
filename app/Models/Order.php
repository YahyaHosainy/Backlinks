<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\ArticleCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Order
 * @package App\Models
 */
class Order extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * Fetch the service on an order
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Fetche the Article Category of an order
     */
    public function articleCategory()
    {
        return $this->hasOne(ArticleCategory::class);
    }

    /**
     * Fetch the user related to an order
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Fetch the report of an order
     *
     * @return HasOne
     */
    public function report()
    {
        return $this->hasOne(Report::class);
    }

    /**
     * Get the extra services of an order
     *
     * @return array
     */
    public function getExtraServices()
    {
        $extra = explode(',', $this->extras);
        $data = array();
        foreach ($extra as $oneExtra) {
            array_push($data, Extra::find($oneExtra));
        }
        return $data;
    }

    /**
     * Get the API extra services cost of an order
     *
     * @return int
     */
    public function getApiExtraServicesCost()
    {
        $extra = explode(',', $this->extras);
        $apiExtrasCost = 0;

        foreach ($extra as $oneExtra) {
            $apiExtra = ApiExtra::find($oneExtra);
            if ($apiExtra != null) {
                $apiExtrasCost += $apiExtra->price_per_item;
            }
        }
        return $apiExtrasCost;
    }
}
