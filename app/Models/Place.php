<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

  
    protected $table = 'places';

    
    protected $fillable = [
        'title',
        'description',
        'address',
        'creator_id', //key for specific user
    ];

    
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
