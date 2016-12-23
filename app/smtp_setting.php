<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class smtp_setting extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'smtp_settings';

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
    protected $fillable = ['host', 'port', 'encryption', 'username', 'password'];

    
}
