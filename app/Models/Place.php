<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

  
    protected $table = 'places';

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'creator_id');
    // }

    
    protected $fillable = [
        'title',
        'description',
        'address',
        'creator_id', //foreignkey for specific user from placesMigration $table->foreignId
    ];

    
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
