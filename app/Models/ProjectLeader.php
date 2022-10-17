<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLeader extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'id',
        'name',
        'image',
        'email'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
