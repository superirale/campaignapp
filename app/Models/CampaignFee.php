<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignFee extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'campaign_fees';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['currency', 'delivery_fee', 'cost_per_recipient', 'no_of_emails_per_month', 'brand_id'];


}
