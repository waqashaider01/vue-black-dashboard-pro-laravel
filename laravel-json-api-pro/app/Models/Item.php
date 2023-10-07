<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\QueryException;

class Item extends Model
{
    protected $fillable = [
        'name',
        'status',
        'excerpt',
        'description',
        'image',
        'is_on_homepage',
        'date_at'
    ];

    protected $dates = [
        'date_at'
    ];

    protected $casts = [
        'is_on_homepage' => 'boolean'
    ];

    /**
     * An Item belongs to a User
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * An Item belongs to a category
     *
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * An Item belongs to many tags
     *
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @param $query
     * @param $name
     * @return mixed
     */
    public function scopeName($query, $name)
    {
        return $query->where('items.name', 'LIKE', "%$name%", 'or');
    }

    /**
     * @param $query
     * @param $category
     * @return mixed
     */
    public function scopeCategory($query, $category)
    {
        return $query->orWhereHas('category', function ($query) use ($category) {
            $query->where('categories.name', 'LIKE', "%$category%");
        });
    }

    /**
     * @param $query
     * @param $tag
     * @return mixed
     */
    public function scopeTags($query, $tag)
    {
        return $query->orWhereHas('tags', function ($query) use ($tag) {
            $query->where('tags.name', 'LIKE', "%$tag%");
        });
    }

    /**
     * Scope the query for data_at between dates
     *
     * @param Builder $query
     * @param array $dates
     * @return Builder
     */
    public function scopeDateAtBetween($query, $dates)
    {
        return $query->whereBetween('items.date_at', $dates);
    }

    /**
     * Scope the query for created_at between dates
     *
     * @param Builder $query
     * @param array $dates
     * @return Builder
     */
    public function scopeCreatedAtBetween($query, $dates)
    {
        return $query->whereBetween('items.created_at', $dates);
    }
}
