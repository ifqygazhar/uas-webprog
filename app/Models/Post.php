<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'user_id',
        'slug',
        'excerpt',
        'image',
        'body',
        'sizes',
        'harga',
    ];

    protected $casts = [
        'sizes' => 'array', // Pastikan kolom sizes dikonversi ke/dari array
    ];

    protected $with = ['user'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    //filter search
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search  . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
                ->orWhere('excerpt', 'like', '%' . $search . '%');
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
