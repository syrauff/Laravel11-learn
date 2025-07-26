<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Mengubah kunci pencarian default dari 'id' menjadi 'slug' untuk route model binding.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected $fillable = ['name', 'slug', 'description'];

    public function post(): HasMany  
    {
        return $this->hasMany(Post::class);
    }
}
