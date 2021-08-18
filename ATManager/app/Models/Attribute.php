<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'data','description'
    ];
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
