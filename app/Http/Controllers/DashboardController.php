<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use App\Models\Parceltrack;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
        public function count(){

            $branch = Branch::all();
            $branchCount= $branch->count();

            $parcel = Parcel::all();
            $parcelCount= $parcel->count();

            $user = User::all();
            $userCount= $user->count();

            $accepted = Parcel::where('status',0)->get();
            $Count0= $accepted->count();

            $collected = Parcel::where('status',1)->get();
            $Count1= $collected->count();

            $in_transit = Parcel::where('status',2)->get();
            $Count2= $in_transit->count();

            $arrived = Parcel::where('status',3)->get();
            $Count3= $arrived->count();

            $ready = Parcel::where('status',4)->get();
            $Count4= $ready->count();

            $picked = Parcel::where('status',5)->get();
            $Count5= $picked->count();

            for($i=0; $i<=5; $i++){

            }

            return view('Admin.index', compact('branchCount', 'parcelCount', 'userCount', 'Count0',
                        'Count1', 'Count2', 'Count3', 'Count4', 'Count5'));

           
        }
}
