<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $branch = Branch::all();
        return view('admin.branch', compact('branch')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin/new_branch');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $branch = new Branch;
        $branch->building = $request->input('building');
        $branch->city = $request->input('city');
        $branch->postal_code = $request->input('postal_code');
        $branch->contact = $request->input('contact');
        $branch->save();

        return redirect('Admin/branch')->with('status','Branch added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $branch = Branch::find($id);
        return view('Admin.branch_edit', compact('branch'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $branch = Branch::find($id);
       $branch->building = $request->input('building');
        $branch->city = $request->input('city');
        $branch->postal_code = $request->input('postal_code');
        $branch->contact = $request->input('contact');
        $branch->update();

        return redirect('Admin/branch')->with('status','Branch updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $branch = Branch::find($id);
       $branch->delete();

       return redirect('Admin/branch')->with('status','Branch deleted successfully');
    }
}
