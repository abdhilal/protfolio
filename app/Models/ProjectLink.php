<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Add this line

class ProjectLink extends Model
{
    protected $fillable = [
        'project_id',
        'link_name',
        'project_links', // Matched migration column name
    ];

    /**
     * Get the project that owns the link.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
