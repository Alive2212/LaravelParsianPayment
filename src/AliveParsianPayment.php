<?php

namespace Alive2212\LaravelParsianPayment;

use Alive2212\LaravelSmartRestful\BaseModel;

class AliveParsianPayment extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

    ];

    /**
     * @return null
     */
    public function getQueueableRelations()
    {
        return null;
        // TODO: Implement getQueueableRelations() method.
    }

}