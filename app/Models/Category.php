<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories'; // Pastikan sesuai dengan nama tabel di database

    protected $fillable = ['name']; // Sesuaikan dengan kolom yang ada

    // Relasi ke tabel projects
    public function projects()
    {
        return $this->hasMany(Project::class, 'category');
    }
}
