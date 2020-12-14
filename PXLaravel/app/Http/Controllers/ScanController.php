<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ScanDataTable;
use App\Models\UserScan;
use App\Models\User;
use App\Models\PrisonerCell;
use App\Models\Prisoner;
use Illuminate\Support\Facades\Auth;

class ScanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ScanDataTable $dataTable)
    {
        return $dataTable->render("scan.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("scan.create");
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create2()
    {  
        $users = User::get();
        $prisoners = Prisoner::get();
        return view("scan.create2")
        ->with('users',$users)
        ->with('prisoners',$prisoners);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cell = PrisonerCell::where('prisoner_id',$request->prisoner_id)->first();
        $newScan = new UserScan;
        $newScan->user_id = Auth::User()->id;
        $newScan->prisoner_id = $request->prisoner_id;
        $newScan->cell_id = $cell->cell_id;
        $newScan->is_active = true;
        $newScan->save();

        return redirect()->route('scan.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
