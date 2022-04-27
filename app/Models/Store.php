<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'display_name',
        'address',
        'phone_number',
        'email',
        'merchant_id'
    ];

    /**
     * Get the merchant that owns the store.
     */
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    /**
     * Get the agents for the store.
     */
    public function agents()
    {
        return $this->hasMany(Agent::class);
    }
}
