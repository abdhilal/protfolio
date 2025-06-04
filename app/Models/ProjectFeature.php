<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Add this line

class ProjectFeature extends Model // Corrected class name
{
    protected $table = 'projec_features'; // Keep original table name if migration name is fixed
                                         // Or rename migration file and re-migrate to 'project_features'
    protected $fillable = [
        'project_id',
        'key_features',
    ];

    /**
     * Get the project that owns the feature.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
