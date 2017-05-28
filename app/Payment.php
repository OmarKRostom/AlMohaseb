<?php

namespace AlMohaseb;

use AlMohaseb\Agent;
use AlMohaseb\Customer;
use AlMohaseb\Events\PaymentCreated;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $with = ['receivable'];

    protected $events = [
        'created' => PaymentCreated::class,
    ];

    protected static function getAvailableMethods() {
        return ['cash', 'cheque'];
    }

    public function receivable()
    {
        return $this->morphTo();
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function scopeCustomers($query)
    {
        return $query->where('receivable_type', Customer::class);
    }

    public function scopeAgents($query)
    {
        return $query->where('receivable_type', Agent::class);
    }

    public function getMethod($value = null)
    {

        return ucwords(str_replace('-', ' ', $value ?? $this->method));
    }
}
