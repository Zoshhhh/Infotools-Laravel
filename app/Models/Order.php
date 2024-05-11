<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';


    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    // Si vous avez des champs de date autres que created_at ou updated_at, vous devez les spécifier
    protected $dates = [
        'date',
    ];

    // Les attributs que vous pouvez assigner massivement
    protected $fillable = [
        'client_id',
        'product_id',
        'quantity',
        'date',
        'amount',
    ];
}
