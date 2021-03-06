<?php

namespace App\Http\Controllers;

use App\Http\Requests\MerchantRequest;
use App\Http\Resources\MerchantCollection;
use App\Http\Resources\MerchantResource;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use function PHPUnit\Framework\isEmpty;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $merchants = Merchant::where("id", ">", 0);
        if ($request->display_name != null) {
            $merchants = $merchants->where("display_name", "like", "%".$request->display_name."%");
        }
        if ($request->sort_by != null) {
            $order = "asc";
            if (str_ends_with($request->sort_by, "_desc")) {
                $request->sort_by = str_replace("_desc", "", $request->sort_by);
                $order = "desc";
            }
            $merchants = $merchants->orderBy($request->sort_by, $order);
        }
        $merchants = $merchants->get();
        return new MerchantCollection($merchants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MerchantRequest $request)
    {
        $merchant = Merchant::create($request->all());
        return response()->json(['Merchant sucessfully created.', new MerchantResource($merchant)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function show(Merchant $merchant)
    {
        return new MerchantResource($merchant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchant $merchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function update(MerchantRequest $request, Merchant $merchant)
    {
        $merchant->fill($request->all());
        $merchant->save();
        return response()->json(['Merchant sucessfully updated.', new MerchantResource($merchant)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchant $merchant)
    {
        $merchant->delete();
        return response()->json('Merchant sucessfully deleted.');
    }
}
