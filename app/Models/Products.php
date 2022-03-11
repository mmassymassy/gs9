<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['name','brand','family','model','position','unit','piecesInUnit',
    'gUnitPrice','dUnitPrice','gPiecePrice','dPiecePrice','initUnitQ','initPieceQ','quantityAlert','expDate'];
}
