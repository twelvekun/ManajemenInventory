<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sale_date',
        'jumlah',
    ];

    protected $casts = [
        'sale_date' => 'date',
        'jumlah' => 'integer',
    ];

    /**
     * Get the product that owns the sale.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
