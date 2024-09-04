<?php

namespace App\Http\Controllers;
use App\Models\Servicio;

use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        return Servicio::all();
    }

    public function store(Request $request)
    {
        return Servicio::create($request->all());
    }

    public function show(Servicio $servicio)
    {
        return $servicio;
    }

    public function update(Request $request, Servicio $servicio)
    {
        $servicio->update($request->all());
        return $servicio;
    }

    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        return response()->noContent();
    }
}
