<?php

namespace App\Http\Controllers;

use App\Models\Parceltrack;
use Illuminate\Http\Request;
use App\Models\Parcel;

class ParceltrackcusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $track_info = [];

        return view('welcome', compact('track_info'));
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
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parceltrack  $parceltrack
     * @return \Illuminate\Http\Response
     */


    public function track(Request $request)
    {
        //we will use the id to update the parcel status 
        //in Parcel's table
        $tracknumber = $request->input('tracking_no');
        $parcel_info = Parcel::where('referenceno',$tracknumber)->get();

        // dd($parcel_info);

        // $parcel_id= "";
        // foreach($parcel_info as $var){
        //     $parcel_id= $var->id;
        //}
        // dd($parcel_id);
        
        if($parcel_info){

            $parcel_id= "";
            foreach($parcel_info as $var){
                $parcel_id= $var->id;
            }

            // $parcel_id = $parcel_info[0];
            $track_info = Parceltrack::where('parcel_id',$parcel_id)->get();

            return view('welcome', compact('track_info'))->with('success', 'Tracking successful, 
            Scroll down to see results');
        }else{

            return redirect('welcome')->with('status', 'Tracking unsuccessful');
        }

           
        
    }

    public function show(Parceltrack $parceltrack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parceltrack  $parceltrack
     * @return \Illuminate\Http\Response
     */
    public function edit(Parceltrack $parceltrack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parceltrack  $parceltrack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parceltrack $parceltrack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parceltrack  $parceltrack
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parceltrack $parceltrack)
    {
        //
    }
}
