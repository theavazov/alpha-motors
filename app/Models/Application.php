<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = ['full_name', 'email', 'message', 'phone_number', 'service_id'];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
