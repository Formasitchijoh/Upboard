<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    public function tag(string $name)
    {
        $tag = Tag::firstOrCreate(['name' => $name]);
        $this->tags()->attach($tag); 
    }

    public function tags()
    {
        // A Tag can belongs to many Jobs and a Job can have many Tags this is a 
        // Many to many relationship
        // the third table is called a pivot table 
        return $this->belongsToMany(Tag::class); // Belongs to and have Tags
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

}
