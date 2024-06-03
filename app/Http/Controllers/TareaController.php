<?php

namespace App\Http\Controllers;

use App\Models\tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{

    public function index()
    {
        $tarea['tareas']=tarea::all();
        return view('index', $tarea);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $tarea=request()->all();
        tarea::create($tarea);
        return redirect('/')->with('Listo, Tarea creada!');
    }

    public function show(tarea $tarea)
    {
        //
    }

    public function edit(tarea $tarea)
    {
        //
    }

    public function update(Request $request, tarea $tarea)
    {
        //
    }

    public function destroy($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();
        return redirect('/');
    }
}
