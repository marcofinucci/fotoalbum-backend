<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
  use HasFactory;
  protected $fillable = ['title', 'slug', 'image', 'description', 'featured', 'category_id'];

  // Collega il post alla categoria
  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class);
  }
}
