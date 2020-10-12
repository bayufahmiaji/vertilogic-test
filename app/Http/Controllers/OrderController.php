<?php

namespace App\Http\Controllers;

use App\Order;
use App\Dishes;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //select order and shot it in json(automatically)
        return Order::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //find price by dish_id       
        $price = Dishes::select('price')->where('id','=',$request->dish_id)->first(); 
        
        //calculate total by multiply price and qty
        $total = $price->price * $request->qty;

        //create order
        $order = Order::create([
            'vendor_id' => $request->vendor_id,
            'dish_id' => $request->dish_id,
            'qty' => $request->qty,
            'price' => $price->price,
            'specialreq' => $request->specialreq,
            'total' => $total,
        ]);

        //return notifiy that data has been inserted
        return $order;

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //find price by dish_id       
        $price = Dishes::select('price')->where('id','=',$request->dish_id)->first(); 
        
        //calculate total by multiply price and qty
        $total = $price->price * $request->qty;

        //find order by id
        $order = Order::find($id);
        
        //update order by id
        $order->update([
            'vendor_id' => $request->vendor_id,
            'dish_id' => $request->dish_id,
            'qty' => $request->qty,
            'price' => $price->price,
            'specialreq' => $request->specialreq,
            'total' => $total,
        ]);

        //return notifiy that data has been inserted
        return $order;

    }

    public function show($id){
        //select order by id
        $order = Order::find($id);
        //return order by id
        return $order;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find data by id
        $order = Order::find($id);

        //delete data by id
        $order->delete($id);

        //return notify that data has been deleted
        return "Data Deleted";
    }
}
