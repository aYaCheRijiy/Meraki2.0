<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id', 'image_path', 'title', 'description',
        'order', 'available_for_order'
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
