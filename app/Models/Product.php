<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relationship to service
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
