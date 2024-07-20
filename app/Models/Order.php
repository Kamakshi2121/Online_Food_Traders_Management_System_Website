<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'lanme',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'state',
        'country',
        'pincode',
        'total_price',
        'payment_mode',
        'payment_id',
        'satuts',
        'message',
        'tracking_no',
        'total_price',

    ];
    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
