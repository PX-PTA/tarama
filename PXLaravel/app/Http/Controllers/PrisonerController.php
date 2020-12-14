<?php

namespace App\Http\Controllers;

use App\Models\Prisoner;
use App\Models\Cell;
use App\Models\PrisonerCell;
use Illuminate\Http\Request;
use App\DataTables\PrisonerDataTable;

class PrisonerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PrisonerDataTable $dataTable)
    {
        return  $dataTable->render("prisoner.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cells = Cell::get();
        return  view("prisoner.create")->with("cells",$cells);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'dob' => 'required',
            'gender' => 'required',
        ]);

        $newPrisoner = new Prisoner;
        $newPrisoner->name = $request->name;
        $newPrisoner->dob = $request->dob;
        $newPrisoner->gender = $request->gender;
        $newPrisoner->address = $request->address;
        $newPrisoner->save();
        if($newPrisoner){
            $newPrisonerCell = new PrisonerCell;
            $newPrisonerCell->cell_id = $request->cell_id;
            $newPrisonerCell->prisoner_id = $newPrisoner->id;
            $newPrisonerCell->save();
        }

        return redirect()->route('prisoner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prisoner  $prisoner
     * @return \Illuminate\Http\Response
     */
    public function show(Prisoner $prisoner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prisoner  $prisoner
     * @return \Illuminate\Http\Response
     */
    public function edit(Prisoner $prisoner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prisoner  $prisoner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prisoner $prisoner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prisoner  $prisoner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prisoner $prisoner)
    {
        //
    }
}
