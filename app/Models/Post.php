<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    // Gunakan jika nama table tidak ada s di akhir nama models dan id bukan id
    // protected $table = 'nama_table_jika_bukan_posts';
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Mengubah kunci pencarian default dari 'id' menjadi 'slug' untuk route model binding.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected $fillable = ['title', 'slug', 'body', 'image', 'user_id'];

    public function user(): BelongsTo  
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class);
    }
}
