<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTemplate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description','required'
    ];

    public function attributesTemplate()
    {
        return $this->hasMany(AtributeTemplate::class);
    }

}
