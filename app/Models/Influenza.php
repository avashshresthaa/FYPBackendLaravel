<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Influenza extends Model
{
    use HasFactory;

    protected $table = 'influenza';

    protected $fillable = ['content', 'parent_id'];
    // protected $with = ['children'];
    
    
    public function parent()
    {
        return $this->belongsTo(Self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Self::class, 'parent_id');
    }
}
