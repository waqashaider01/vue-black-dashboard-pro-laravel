<?php

namespace App\Models;

use App\Exceptions\ConstraintException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Exception;

class Tag extends Model
{
    protected $fillable = [
        'name', 'color'
    ];

    /**
     * A Tag belongs to many items
     *
     * @return BelongsToMany
     */
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    /**
     * @param $query
     * @param $name
     * @return mixed
     */
    public function scopeName($query, $name)
    {
        return $query->where('tags.name', 'LIKE', "%$name%", 'or');
    }

    /**
     * @param $query
     * @param $color
     * @return mixed
     */
    public function scopeColor($query, $color)
    {
        return $query->where('tags.color', 'LIKE', "%$color%", 'or');
    }


    /**
     * @return bool|null
     * @throws ConstraintException|Exception
     */
    public function delete()
    {
        if (count($this->items->toArray())) {
            throw new ConstraintException('This Tag still has associated Items.');
        }

        return parent::delete();
    }
}
