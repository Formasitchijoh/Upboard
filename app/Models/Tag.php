<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    public function jobs()
    {
        // A Tag can belongs to many Jobs and a Job can have many Tags this is a 
        // Many to many relationship
        // the third table is called a pivot table 
        return $this->belongsToMany(Job::class); // Belongs to and have Tags
    }
}
