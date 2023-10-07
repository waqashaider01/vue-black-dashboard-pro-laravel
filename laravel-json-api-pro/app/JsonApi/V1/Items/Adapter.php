<?php

namespace App\JsonApi\V1\Items;

use App\Models\Item;
use App\Strategies\PaginationStrategy;
use CloudCreativity\LaravelJsonApi\Eloquent\BelongsTo;
use CloudCreativity\LaravelJsonApi\Eloquent\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use CloudCreativity\LaravelJsonApi\Eloquent\AbstractAdapter;
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
    protected $filterScopes = [
        'date_at' => 'dateAtBetween',
        'created_at' => 'createdAtBetween'
    ];

    /**
     * Adapter constructor.
     * @param PaginationStrategy $paging
     */
    public function __construct(PaginationStrategy $paging)
    {
        parent::__construct(new \App\Models\Item(), $paging);
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
     * Hook into creating to append the user that created the item
     *
     * @param Item $item
     * @return void
     */
    protected function creating(Item $item): void
    {
        $item->user()->associate(auth()->user());
    }

    /**
     * Declare category relationship
     *
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo();
    }

    /**
     * Declare tags relationship
     *
     * @return HasMany
     */
    public function tags()
    {
        return $this->hasMany();
    }

    protected function sortBy($query, SortParameterInterface $param)
    {
        $column = $this->getQualifiedSortColumn($query, $param->getField());
        $order = $param->isAscending() ? 'asc' : 'desc';

        if ($column === 'category.name') {
            $query->leftJoin('categories', 'categories.id', '=', 'items.category_id')
                  ->select('items.*');

            $query->orderBy('categories.name', $order)->orderBy('items.id', $order);
            return;
        }

        if ($column === 'tags.name') {
            $query->leftJoin('item_tag', 'item_id', '=', 'items.id')
                  ->leftJoin('tags', 'item_tag.tag_id', '=', 'tags.id')
                  ->groupBy('items.id')
                  ->select('items.*', DB::raw('group_concat(tags.name) as ctags'));

            $query->orderBy('ctags', $order)->orderBy('items.id', $order);
            return;
        }

        $query->orderBy($column, $order);
    }

}
