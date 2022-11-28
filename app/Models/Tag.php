<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * @return BelongsToMany
     */
    public function bookmarks(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Bookmark::class,
            table: 'bookmark_tag',
        );
    }

    public $timestamps = false;
}
