<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class api_setting extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'api_settings';

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
    protected $fillable = ['key', 'secret', 'optional', 'brand_id'];

    
}
