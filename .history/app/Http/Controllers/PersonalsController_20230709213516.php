<?php

namespace App\Http\Controllers;

use App\Models\Personals;
use Illuminate\Http\Request;



class PersonalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['personals']=Personals::paginate(5);
        return view('pages.personals.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.personals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $datosEmpleado = request()->all();

        $datosEmpleado = request()->except('_token');
        Personals::insert($datosEmpleado);

        if($request->hasFile('foto')){
            $datosEmpleado['foto']=$request->file('foto')->store('uploads','public');
        }

        return response()->json($datosEmpleado);
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
        $personal=Personals::findOrFail($id);
        return view('pages.personals.edit',compact('personal'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $datosEmpleado = request()->except(['_token','_method']);
        Personals::where('id','=',$id)->update($datosPersonal);

        $personal=Personals::findOrFail($id);
        return view('pages.personals.edit',compact('personal'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Personals::destroy($id);
        return redirect('personals');
    }
}
