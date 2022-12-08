<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::get();
        return view('compras.index', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        $productos = Producto::get();
        $proveedors = Proveedor::get();
        return view('compras.create', compact('users', 'productos', 'proveedors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compras=new Compra();
        $compras -> fecha = date('Y-m-d');
        $compras -> cantidad = strtoupper($request->cantidad);
        $compras -> precio = strtoupper($request->precio);
        $compras -> total = strtoupper($request->cantidad * $request->precio);
        $compras -> descripcion = strtoupper($request->descripcion);
        $compras -> user_id = Auth::user()->id;
        $compras -> producto_id = $request->producto_id;
        $compras -> proveedor_id = $request->proveedor_id;
        $compras->save();
        $producto = Producto::find($request->producto_id);
        $producto -> stock = $producto -> stock+$request->cantidad;
        $producto ->save();
        return redirect()->route('compras.index');
    }
    public function Preate()
    { //abrir formulario para un nuevo registro
        return view('compras.create');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(compra $compras)
    {
        return view('compras.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compras = Compra::find($id);
        $users = User::get();
        $productos = Producto::get();
        $proveedors = Proveedor::get();
        return view('compras.edit', compact('compra', 'users', 'productos', 'proveedors'));
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
        $compras = Compra::find($id);
        $compras -> fecha=strtoupper($request->fecha);
        $compras -> cantidad=strtoupper($request->cantidad);
        $compras -> precio=strtoupper($request->precio);
        $compras -> total=strtoupper($request->total);
        $compras -> descripcion=strtoupper($request->descripcion);
        $compras -> user_id = $request->user_id;
        $compras -> producto_id = $request->producto_id;
        $compras -> proveedor_id = $request->proveedor_id;
        $compras->save();
        return redirect()->route('compras.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compra= Compra::find($id);
        $compra->delete();
        return back();
    }
}
