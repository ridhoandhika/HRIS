<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class DepartementController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departements = Departement::with('division')->get();
        //$departements = Departement::all();
        //$departements = DB::table('departements')->get();
        return view ('admin.departement.index', compact('departements') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $division = Division::all();
        
        return view('admin.departement.add', compact('division'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       // $dept_id = Helper::IDGenerator(new Departement, 'dept_id', 5, 'DEP');

        $departement = new Departement;  
        $departement->division_id = $request->division_id;
        $departement->dept_description = $request->dept_description;
        $departement->dept_initial = $request->dept_initial;

        $departement->save();
        //return $request;
       return redirect('admin/departements')->with('status', 'Employee added!');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show(Departement $departement)
    {
        
        return view('admin/departement/show', compact('departement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function edit(Departement $departement)
    {
         if(empty($id)) {
            return redirect('admin/divisions/create');
        }
      
       $departement = Departement::first();
        return view ('admin.dapartement.edit', compact('departement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departement $departement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('departements')->where('id', $id)->delete();
        return redirect('admin/departements')->with('status', 'Departement DELETED!');
    }
}
