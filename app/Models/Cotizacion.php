<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = 'cotizaciones';

    protected $fillable = [
        'nombre', 'telefono', 'email', 'product_id', 'descripcion',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}