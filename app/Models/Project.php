<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'project_name',
        'client',
        'leader_id',
        'start_date',
        'end_date',
        'progress'
    ];

    public function project_leaders()
    {
        return $this->belongsTo(ProjectLeader::class, 'leader_id', 'id');
    }
}
