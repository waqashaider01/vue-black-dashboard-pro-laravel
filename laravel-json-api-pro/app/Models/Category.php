<?php

namespace App\Models;

use App\Exceptions\ConstraintException;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * A category has many items
     *
     * @return HasMany;
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    /**
     * @param $query
     * @param $name
     * @return mixed
     */
    public function scopeName($query, $name)
    {
        return $query->where('categories.name', 'LIKE', "%$name%", 'or');
    }

    /**
     * @param $query
     * @param $description
     * @return mixed
     */
    public function scopeDescription($query, $description)
    {
        return $query->where('categories.description', 'LIKE', "%$description%", 'or');
    }

    /**
     * @return bool|null
     * @throws ConstraintException|Exception
     */
    public function delete()
    {
        if (count($this->items->toArray())) {
            throw new ConstraintException('This Category still has associated Items.');
        }

        return parent::delete();
    }
}
