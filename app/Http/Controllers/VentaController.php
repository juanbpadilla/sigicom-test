<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $ventas = Venta::get();
        return view('ventas.index', compact('ventas'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        $clientes = User::get();
        $productos = Producto::get();
        return view('ventas.create', compact('users', 'productos', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    { //guardar BD los Registro
        $ventas=new Venta();
        $ventas->fecha_venta= date('Y-m-d');
        $ventas->cantidad_producto= strtoupper($request->cantidad_producto);
        $ventas->descripcion= strtoupper($request->descripcion);
        $ventas->precio_unitario= strtoupper($request->precio_unitario);
        $ventas->total_venta= strtoupper($request->cantidad_producto * $request->precio_unitario);
        $ventas-> user_id = Auth::user()->id;
        $ventas-> cliente_id = $request->cliente_id;
        $ventas-> producto_id = $request->producto_id;
        $ventas->save();
        $producto = Producto::find($request->producto_id);
        $producto -> stock = $producto -> stock-$request->cantidad_producto;
        $producto ->save();
        return redirect()->route('ventas.index');
    }
    public function Preate()
    { //abrir formulario para un nuevo registro
        return view('ventas.create');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(venta $ventas)
    { // visualizar un solo registro de BD
        return view('ventas.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    { // Abrir un formualrio para Edicion de un registro BD
        $ventas = Venta::find($id);
        $users = User::get();
        $clientes = User::get();
        $productos = Producto::get();
        return view('ventas.edit', compact('ventas', 'users', 'productos', 'clientes'));
    }

    public function update(Request $request, $id)
    { //Actualizar el regsitro en el BD
        $ventas = Venta::find($id);
        $ventas->fecha_venta= strtoupper($request->fecha_venta);
        $ventas->cantidad_producto= strtoupper($request->cantidad_producto);
        $ventas->descripcion= strtoupper($request->descripcion);
        $ventas->precio_unitario= strtoupper($request->precio_unitario);
        $ventas->total_venta= strtoupper($request->total_venta);
        $ventas-> user_id = $request->user_id;
        $ventas-> cliente_id = $request->cliente_id;
        $ventas-> producto_id = $request->producto_id;
        $ventas->save();
        return redirect()->route('ventas.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { // Eliminar un registro BD
            $venta = Venta::find($id);
            $venta ->delete();
            return back();
    }
}
