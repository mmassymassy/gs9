<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sells extends Model
{
    use HasFactory;
    protected $fillable = ['bonId','clientId','productId','unitQuantity',
    'pieceQuantity','price','totalSell','totalPaid','info'];
}
