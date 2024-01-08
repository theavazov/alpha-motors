<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'icon'];

    // relationship with products
    public function products()
    {
        return $this->hasMany(Product::class, 'service_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'service_id');
    }
}
