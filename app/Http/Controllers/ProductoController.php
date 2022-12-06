<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Proveedor;

class ProductoController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::get();
        return view('productos.create', compact('proveedores'));
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
        $productos=new Producto();
        $productos->nombre_producto=$request->nombre;
        $productos->precio_compra=$request->precio;
        $productos->marca=$request->marca;
        $productos->estado=$request->estado;
        $productos->stock=0;
        $productos->proveedor_id=$request->proveedor_id;
        $productos->save();
        return redirect()->route('productos.index');
    }
    public function Preate()
    { //abrir formulario para un nuevo registro
        return view('productos.create');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(producto $productos)
    { // visualizar un solo registro de BD
        return view('productos.show');
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
        $producto = Producto::find($id);
        $proveedores = Proveedor::get();
        return view('productos.edit', compact('proveedores', 'producto'));
    }

    public function update(Request $request, $id)
    { //Actualizar el regsitro en el BD
        $producto= Producto::find($id);
        $producto->nombre_producto=$request->nombre;
        $producto->precio_compra=$request->precio;
        $producto->marca=$request->marca;
        $producto->estado=$request->estado;
        $producto->stock=$request->stock;
        $producto->proveedor_id=$request->proveedor_id;
        $producto->save();
        return redirect()->route('productos.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { // Eliminar un registro BD

        $producto= Producto::find($id);
        $producto->delete();
        return back();
    }
}
