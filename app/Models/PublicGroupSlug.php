<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicGroupSlug extends Model
{
    use HasFactory;
    public $timestamps = false;
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
    protected $fillable = [
        'group_slugs',
    ];
}
