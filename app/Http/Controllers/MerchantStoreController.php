<?php

namespace App\Http\Controllers;

use App\Http\Resources\StoreCollection;
use App\Models\Store;

class MerchantStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($merchant_id)
    {
        $stores = Store::get()->where('merchant_id', $merchant_id);
        return new StoreCollection($stores);
    }
}
