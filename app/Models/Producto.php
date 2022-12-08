<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }

    public function nuevo($id)
    {
        $producto = Producto::find($id);
        $precio = $producto->precio_compra + ($producto->precio_compra * 0.5);
        $venta = Venta::create([
            'fecha_venta' => date('Y-m-d'),
            'precio_unitario' => $precio,
        ]);
        // $venta = ->fecha_venta = date('Y-m-d');
        // $venta->precio_unitario= strtoupper($producto->precio_compra + ($producto->precio_compra * 0.5));
        // $venta->save();

        return redirect()->route('ventas.edit', compact('venta'));
    }
}


