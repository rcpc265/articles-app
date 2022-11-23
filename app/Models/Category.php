<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'status'
    ];

    public function scopeFilterName($query, $value)
    {
        if ($value)
            return $query->where('name', 'LIKE', '%' . $value . '%');
    }
}
