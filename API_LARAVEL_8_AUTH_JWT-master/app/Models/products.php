<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'typeId',
        'size',
        'cost',
        'price',
    ];
    
    public function type(): BelongsTo
    {
        return $this->belongsTo('App\Models\types','typeId','id');
    }
}
