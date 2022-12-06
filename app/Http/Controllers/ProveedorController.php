<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Hash;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::get();
        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedores = new Proveedor();
        $proveedores -> nombre_proveedor= strtoupper($request->nombre);
        $proveedores -> apellido_preveedor= strtoupper($request->apellido);
        $proveedores -> direccion_proveedor= strtoupper($request->direccion);
        $proveedores -> pais_proveedor= strtoupper($request->pais);
        $proveedores -> empre_proveedor= strtoupper($request->empresa);
        $proveedores -> telefono= strtoupper($request->telefono);
        $proveedores -> correo= $request->correo;
        $proveedores -> estado= strtoupper('activo');
        $proveedores->password =Hash::make($request->password);
        $proveedores->save();
        return redirect()->route('proveedores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //return view('proveedores.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = Proveedor::find($id);
        return view('proveedores.edit', compact('proveedor'));
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
        $proveedores = Proveedor::find($id);
        $proveedores -> nombre_proveedor= strtoupper($request->nombre);
        $proveedores -> apellido_preveedor= strtoupper($request->apellido);
        $proveedores -> direccion_proveedor= strtoupper($request->direccion);
        $proveedores -> pais_proveedor= strtoupper($request->pais);
        $proveedores -> empre_proveedor= strtoupper($request->empresa);
        $proveedores -> telefono= strtoupper($request->telefono);
        $proveedores -> correo= $request->correo;
        $proveedores -> estado= strtoupper($request->estado);
        $proveedores->save();
        return redirect()->route('proveedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedores = Proveedor::find($id);
        $proveedores->delete();
        return back();
    }
}
