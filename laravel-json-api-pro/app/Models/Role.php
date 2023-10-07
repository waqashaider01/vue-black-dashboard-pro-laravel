<?php

namespace App\Models;

use App\Exceptions\ConstraintException;
use Exception;

class Role extends \Spatie\Permission\Models\Role
{

    /**
     * @param $query
     * @param $name
     * @return mixed
     */
    public function scopeName($query, $name)
    {
        return $query->where('name', 'LIKE', "%$name%", 'or');
    }

    /**
     * @return bool|null
     * @throws ConstraintException|Exception
     */
    public function delete()
    {
        if (count($this->users->toArray())) {
            throw new ConstraintException('This Role still has associated Users.');
        }

        return parent::delete();
    }
}
