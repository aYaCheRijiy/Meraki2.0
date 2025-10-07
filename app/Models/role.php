<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'hierarchy_level', 'permissions'];

    protected $casts = [
        'permissions' => 'array',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles');
    }
}
