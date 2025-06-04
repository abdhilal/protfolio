<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Add this line

class ProjectTechnology extends Model
{
    protected $fillable = [
        'project_id',
        'technologies', // Matched migration column name
    ];

    /**
     * Get the project that owns the technology.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
