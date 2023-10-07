<?php

namespace App\JsonApi\V1\Items;

use App\Helpers\Enum;
use Illuminate\Validation\Rule;
use CloudCreativity\LaravelJsonApi\Validation\AbstractValidators;

class Validators extends AbstractValidators
{

    /**
     * The include paths a client is allowed to request.
     *
     * @var string[]|null
     *      the allowed paths, an empty array for none allowed, or null to allow all paths.
     */
    protected $allowedIncludePaths = [
        'user',
        'user.roles',
        'category',
        'tags'
    ];

    /**
     * The sort field names a client is allowed send.
     *
     * @var string[]|null
     *      the allowed fields, an empty array for none allowed, or null to allow all fields.
     */
    protected $allowedSortParameters = [
        'name',
        'category.name',
        'tags.name',
        'created_at',
        'tags.created_at'
    ];

    /**
     * The filters a client is allowed send.
     *
     * @var string[]|null
     *      the allowed filters, an empty array for none allowed, or null to allow all.
     */
    protected $allowedFilteringParameters = [
        'name',
        'category',
        'tags',
        'status',
        'is_on_homepage',
        'date_at',
        'created_at',
    ];

    /**
     * Get resource validation rules.
     *
     * @param mixed|null $record
     *      the record being updated, or null if creating a resource.
     * @return array
     */
    protected function rules($record, array $data): array
    {
        if($record) {
            return [
                'name' => 'sometimes|string',
                'status' => ['sometimes', Rule::in(Enum::getValues('items', 'status'))],
                'excerpt' => 'sometimes|string',
                'description' => 'sometimes|string|nullable',
                'image' => 'sometimes|nullable|url',
                'is_on_homepage' => 'sometimes|boolean',
                'date_at' => 'sometimes|date_format:Y-m-d'
            ];
        }

        return [
            'name' => 'required|string',
            'status' => ['required', Rule::in(Enum::getValues('items', 'status'))],
            'excerpt' => 'required|string',
            'description' => 'string|nullable',
            'image' => 'nullable|url',
            'is_on_homepage' => 'required|boolean',
            'date_at' => 'required|date_format:Y-m-d'
        ];
    }

    /**
     * Get query parameter validation rules.
     *
     * @return array
     */
    protected function queryRules(): array
    {
        return [
            'filter.name' => 'filled|string',
            'filter.status' => 'filled|string',
            'filter.is_on_homepage' => 'filled|boolean',
            'filter.date_at' => 'array|min:2',
            'filter.date_at.*' => 'filled|date_format:Y-m-d',
            'filter.created_at' => 'array|min:2',
            'filter.created_at.*' => 'filled|date_format:Y-m-d H:i:s',
        ];
    }
}
