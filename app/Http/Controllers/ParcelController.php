<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use App\Models\Parceltrack;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $parcel = Parcel::all();

        //getting the from branch building name using foreign key
        // $get_id_f="";
        // foreach($parcel as $var){
        //     $get_id_f= $var->branch_id_f;
        //     $branch = Branch::where('id', $get_id_f)->select('branches.building')->get();
        // }
        //getting the to branch building name using foreign key
        $get_id_t="";
        foreach($parcel as $var){
            $get_id_t= $var->branch_id_t;
            // $branch_to.$count = Branch::where('id', $get_id_t)->select('branches.building')->get();       
        }
        
        $branch = Branch::join('parcels', 'branches.id', '=', 'parcels.branch_id_t')
                    ->select('branches.building')
                    ->get();
    //    dd($branch);
        return view('Admin.parcel_list', compact('parcel', 'branch')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $branch = Branch::all();
        return view('Admin.new_parcel', compact('branch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();
        $parcel = new Parcel;
        //
        $randomNumber = random_int(00000000, 99999999);
        
        $parcel->referenceno = $randomNumber;
        $parcel->sendername = $request->input('sender_name');
        $parcel->senderaddress = $request->input('sender_address');
        $parcel->sendercontact = $request->input('sender_contact');
        $parcel->recipientaddress = $request->input('recipient_address');
        $parcel->recipientname = $request->input('recipient_name');
        $parcel->recipientcontact = $request->input('recipient_contact');
        $parcel->branch_id_f = $request->input('frombranch_id');
        $parcel->branch_id_t = $request->input('tobranch_id');
        $parcel->weight = $request->input('weight');
        $parcel->price = $request->input('price');
        $parcel->user_id=$id;
        $parcel->save();

        //enter default status into parcel tracks
        $get_parcel = Parcel::where('referenceno',$randomNumber)->get();
        if($get_parcel){
            $parcel_id="";
            foreach($get_parcel as $var){
                    $parcel_id=$var->id;
            }
        }
        $parceltrack = new Parceltrack;
        $parceltrack->status = 0;
        $parceltrack->parcel_id = $parcel_id;
        $parceltrack->save();

        return redirect('Admin/parcel_list')->with('status','Parcel added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function show(Parcel $parcel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $parcel = Parcel::find($id);
        $branch = Branch::all();
        return view('Admin.parcel_edit', compact('parcel', 'branch'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $parcel = Parcel::find($id);

        
        $parcel->sendername = $request->input('sender_name');
        $parcel->senderaddress = $request->input('sender_address');
        $parcel->sendercontact = $request->input('sender_contact');
        $parcel->recipientaddress = $request->input('recipient_address');
        $parcel->recipientname = $request->input('recipient_name');
        $parcel->recipientcontact = $request->input('recipient_contact');
        $parcel->branch_id_f = $request->input('frombranch_id');
        $parcel->branch_id_t = $request->input('tobranch_id');
        $parcel->weight = $request->input('weight');
        $parcel->price = $request->input('price');
        
        $parcel->update();

        return redirect('Admin/parcel_list')->with('status','Parcel Info Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parcel  $parcel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $parcel = Parcel::find($id);
       $parcel->delete();

       return redirect('Admin/parcel_list')->with('status','Branch deleted successfully');
    }
}
