<?php

namespace App\Models;
use App\Contracts\CategoryInterface;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description','category_template_id'
    ];
    public  function template(){
        
        return $this->hasOne(CategoryTemplate::class);
    }
    
    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
}
