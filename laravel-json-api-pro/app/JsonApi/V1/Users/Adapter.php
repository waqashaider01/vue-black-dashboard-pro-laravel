<?php

namespace App\JsonApi\V1\Users;

use App\Strategies\PaginationStrategy;
use CloudCreativity\LaravelJsonApi\Eloquent\AbstractAdapter;
use CloudCreativity\LaravelJsonApi\Eloquent\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Neomerx\JsonApi\Contracts\Encoder\Parameters\SortParameterInterface;

class Adapter extends AbstractAdapter
{

    /**
     * Mapping of JSON API attribute field names to model keys.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * @var string
     */
    protected $defaultSort = '-created_at';

    /**
     * Mapping of JSON API filter names to model scopes.
     *
     * @var array
     */
    protected $filterScopes = [];

    /**
     * Adapter constructor.
     *
     * @param PaginationStrategy $paging
     */
    public function __construct(PaginationStrategy $paging)
    {
        parent::__construct(new \App\Models\User(), $paging);
    }

    /**
     * @param Builder $query
     * @param Collection $filters
     * @return void
     */
    protected function filter($query, Collection $filters)
    {
        $this->filterWithScopes($query, $filters);
    }

    /**
     * Declare roles relationship
     *
     * @return HasMany
     */
    protected function roles()
    {
        return $this->hasMany();
    }

    protected function sortBy($query, SortParameterInterface $param)
    {
        $column = $this->getQualifiedSortColumn($query, $param->getField());
        $order = $param->isAscending() ? 'asc' : 'desc';

        if ($column === 'roles.name') {
            $query->leftJoin( 'model_has_roles', 'model_id', '=', 'users.id' )
                  ->leftjoin( 'roles', 'model_has_roles.role_id', '=', 'roles.id' )
                  ->groupBy('users.id')
                  ->select('users.*', DB::raw('group_concat(roles.name) as croles'));

            $query->orderBy('croles', $order)->orderBy('users.id', $order);
            return;
        }

        $query->orderBy($column, $order);
    }
}
