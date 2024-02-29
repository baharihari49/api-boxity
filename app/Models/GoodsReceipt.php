<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsReceipt extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'warehouse_id',
        'status',
        'details',
    ];

    // Relasi ke tabel Order dan Warehouse
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    // Relasi ke tabel Goods Receipt Items
    public function goodsReceiptItems()
    {
        return $this->hasMany(GoodsReceiptItem::class);
    }

    // Atribut Kode Goods Receipt
    public function getKodeGoodsReceiptAttribute()
    {
        if (!is_null($this->created_at)) {
            return 'SJ/' . $this->created_at->format('Y') . '/' . $this->created_at->format('m') . '/' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
        }
    }
}
