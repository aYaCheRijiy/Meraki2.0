<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'bio', 'template', 'accent_color',
        'views', 'is_published', 'custom_domain', 'hide_branding',
        'promo_text', 'promo_active', 'custom_css'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function links()
    {
        return $this->hasMany(Link::class);
    }

    public function galleryItems()
    {
        return $this->hasMany(GalleryItem::class);
    }
}
