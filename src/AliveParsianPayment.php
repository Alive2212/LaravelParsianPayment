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
        'user_id',
        'order_id',
        'token',
        'message',
        'status_code',
        'order_id',
        'terminal_number',
        'amount',
        'rrn',
        'card_number_masked',
        'status',
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