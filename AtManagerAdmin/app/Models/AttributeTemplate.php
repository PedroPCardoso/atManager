<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeTemplate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description','required'
    ];

    public function categoryTemplate()
    {
        return $this->belongsTo(CategoryTemplate::class);
    }

}
