<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_id',
        'total',
        'status'
    ];

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Calculate the total cart value
    public function calculateTotal()
    {
        // First, make sure we have the latest items loaded
        $this->load('items');
        
        $total = 0;
        
        // Calculate total with each item's price * quantity
        foreach ($this->items as $item) {
            $total += ($item->price * $item->quantity);
        }
        
        // Update and save the total
        $this->total = $total;
        $this->save();
        
        return $this->total;
    }
    
    // Get subtotal (just the items, no shipping)
    public function getSubtotal()
    {
        return $this->total;
    }
    
    // Get total with shipping cost added
    public function getTotal()
    {
        return $this->total + 0.00; // Free shipping
    }
    
    // Get shipping cost
    public function getShippingCost()
    {
        return 0.00; // Free shipping
    }
}
