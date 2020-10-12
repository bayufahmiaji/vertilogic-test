<?php

namespace App\Http\Controllers;

use App\Http\Resources\VendorResource;
use App\Vendor;
use App\Dishes;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        //select vendor and shot it in json(automatically)
        return Vendor::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate name max to 128 char
        $this->validate($request, [
            'name' => 'required|max:128',
        ]);

        //create vendor by request sent
        $vendor = Vendor::create($request->all());

        //return notifiy that data has been inserted
        return "Data Inserted";

    }

    public function dish($id){
        //get dish by vendor_id
         $dish = Dishes::where('vendor_id','=',$id)->get();
         //return dish by vendor id
         return $dish; 
    }

    public function show($id){
        //select vendor by id
        $vendor = Vendor::find($id);
        //return vendor by id
        return $vendor;
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
        //find data by id
        $vendor = Vendor::find($id);

        //update data by id
        $vendor->update($request->all());

        //return notify that data has been updated
        return "Data Updated";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find data by id
        $vendor = Vendor::find($id);

        //delete data by id
        $vendor->delete($id);

        //return notify that data has been deleted
        return "Data Deleted";
    }
}
