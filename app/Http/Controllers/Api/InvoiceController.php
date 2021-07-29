<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InvodeDetail;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = new Invoice();
        $invoice->user_id = $request->user()->id;
        $invoice->address = $request->address;
        $invoice->total = $request->total;
        $invoice->save();

        foreach($request->products as $product){
            $invoiceDetail = new InvodeDetail();
            $invoiceDetail->invoice_id = $invoice->id;
            $invoiceDetail->product_id = $product['id'];
            $invoiceDetail->qty = $product['qty'];
            $invoiceDetail->amount = $product['amount'];
            $invoiceDetail->save();
        }
        return response()->json(['message' => 'Order Sent','code' => 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
