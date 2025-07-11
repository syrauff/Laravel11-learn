<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    protected $fillable = ['title', 'author', 'slug', 'body'];
}
