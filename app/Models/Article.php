<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $fillable = [
        'name',
        'code',
        'description',
        'status',
        'price',
        'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeName($query, $value)
    {
        if ($value)
            return $query->where('name', 'LIKE', '%' . $value . '%');
    }

    public function scopeId($query, $value)
    {
        return $query->when($value, function ($query) use ($value) {
            $query->where('id', $value);
        });
    }

    public function scopeCategoryName($query, $value)
    {
        return $query->when($value, function ($query) use ($value) {
            $query->whereHas('category', function ($query) use ($value) {
                $query->filterName($value);
            });
        });
    }

    public function getStatusFormatAttribute()
    {
        return $this->status ? 'Disponible' : 'No Disponible';
    }

    public function getStatusFormatSaleAttribute()
    {
        return $this->status ? 'On' : 'Off';
    }

    public function getCategoryNameAttribute()
    {
        return $this->category ? $this->category->name : '';
    }

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = str_pad($value, 6, "0", STR_PAD_LEFT);
    }
}
