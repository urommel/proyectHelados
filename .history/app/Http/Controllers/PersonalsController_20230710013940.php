<?php

namespace App\Http\Controllers;

use App\Models\Personals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class PersonalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['personals']=Personals::paginate(5);

        // $users = DB::table('users')->paginate(15);
        // $per = DB::table('personals')->paginate(5);

        return view('pages.personals.index',$per);
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

        $campos=[
            'dni'=>'required|string|max:8',
            'apellidos'=>'required|string|max:100',
            'celular'=>'required|string|max:9',
            'direccion'=>'required|string|max:100',
            'fecha_nacimiento'=>'required|date',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'foto.required'=>'La foto es requerida'
        ];

        $this->validate($request,$campos,$mensaje);

        $datosPersonal = request()->except('_token');

        if($request->hasFile('foto')){
            $datosPersonal['foto']=$request->file('foto')->store('uploads','public');
        }

        Personals::insert($datosPersonal);

        // return response()->json($datosPersonal);

        return redirect('personals')->with('mensaje','Personal agregado con éxito');
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

        $campos=[
            'dni'=>'required|string|max:8',
            'apellidos'=>'required|string|max:100',
            'celular'=>'required|string|max:9',
            'direccion'=>'required|string|max:100',
            'fecha_nacimiento'=>'required|date',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        if($request->hasFile('foto')){
            $campos=['foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['foto.required'=>'La foto es requerida'];
        }

        $this->validate($request,$campos,$mensaje);

        $datosPersonal = request()->except(['_token','_method']);

        if($request->hasFile('foto')){
            $personal=Personals::findOrFail($id);
            Storage::delete('public/'.$personal->foto);
            $datosPersonal['foto']=$request->file('foto')->store('uploads','public');
        }

        Personals::where('id','=',$id)->update($datosPersonal);

        $personal=Personals::findOrFail($id);
        // return view('pages.personals.edit',compact('personal'));
        return redirect('personals')->with('mensaje','Personal modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $personals=Personals::findOrFail($id);

        if(Storage::delete('public/'.$personals->foto)){
            Personals::destroy($id);
        }

        Personals::destroy($id);
        return redirect('personals')->with('mensaje','Personal borrado con éxito');
    }
}
