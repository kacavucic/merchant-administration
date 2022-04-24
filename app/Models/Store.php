<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'store_code';

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'display_name',
        'address',
        'phone_number',
        'email'
    ];

    /**
     * Get the merchant that owns the store.
     */
    public function merchant()
    {
        return $this->belongsTo(Merchant::class, "merchant_code", "merchant_code");
    }

    /**
     * Get the agents for the store.
     */
    public function agents()
    {
        return $this->hasMany(Agent::class, "store_code", "store_code");
    }
}
