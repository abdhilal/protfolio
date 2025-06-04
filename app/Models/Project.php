<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Add this line

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'overview',
        'problem_solved',
        'my_Role',
        'image_cover', // Corrected from image_cove
        'link_video',
    ];

    /**
     * Get the images for the project.
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class);
    }

    /**
     * Get the links for the project.
     */
    public function links(): HasMany // Corrected method name from Links to links (convention)
    {
        return $this->hasMany(ProjectLink::class);
    }

    /**
     * Get the features for the project.
     */
    public function features(): HasMany
    {
        return $this->hasMany(ProjectFeature::class); // Corrected model name
    }

    /**
     * Get the technologies for the project.
     */
    public function technologies(): HasMany // Corrected method name from Technologies to technologies (convention)
    {
        return $this->hasMany(ProjectTechnology::class);
    }
}
