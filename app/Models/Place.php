<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    // Specify the table name (optional, Laravel assumes the plural of the model name)
    protected $table = 'places';

    // Specify the fillable fields
    protected $fillable = [
        'title',
        'description',
        'address',
        'creator_id', // Assuming this is a foreign key referencing the user
    ];

    // Define any relationships if necessary
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
