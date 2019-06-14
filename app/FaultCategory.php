<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaultCategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    public function work_orders()
    {
        return $this->hasMany('App\WorkOrder');
    }
}
