<?php

namespace App\Http\Controllers;

use App\Dishes;
use App\Order;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //select all dish
        $dish = Dishes::all();
        //return in json(automatically)
        return $dish;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create data
        $dish = Dishes::create($request->all());

        //notify that data has been inserted
        return "Data Inserted";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dishes  $dishes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //find data by id
        $dish = Dishes::find($id);

        //update data by id
        $dish->update($request->all());

        //notify that data has been updated
        return "Data Updated";
    }

    public function show($id){
        //select dish by id
        $dish = Dishes::find($id);
        //return dish by id
        return $dish;
    }

      public function order($id){
        //select order by id
       $order = Order::where('dish_id','=',$id)->get();
        //return order by id
        return $order;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dishes  $dishes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find data by id
        $dishes = Dishes::find($id);

        //delete data by id
        $dishes->delete($id);

        //return notify that data has been deleted
        return "Data Deleted";
    }
}
