<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Projects;
use App\Models\Companies;
use App\Models\Sectors;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Projects::all()
        ->where('status', '=', 'Activo');
        
       return view('welcome', ['projects' => $projects ]);
    }

    public function proyect( String $id)
    {

        $project = Projects::where('id', $id)->get()->first();

        $company = Companies::where('id', $project->companie_id)->get()->first();
        $sector = Sectors::where('id', $company->sector)->get()->first();
       
       return view('proyecto', [
        'project' => $project,
        'company' => $company,
        'sector' => $sector,
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
