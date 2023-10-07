<?php

namespace App\JsonApi\V1\Tags;

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
    protected $allowedIncludePaths = [];

    /**
     * The sort field names a client is allowed send.
     *
     * @var string[]|null
     *      the allowed fields, an empty array for none allowed, or null to allow all fields.
     */
    protected $allowedSortParameters = ['name', 'color', 'created_at'];

    /**
     * The filters a client is allowed send.
     *
     * @var string[]|null
     *      the allowed filters, an empty array for none allowed, or null to allow all.
     */
    protected $allowedFilteringParameters = ['name', 'color'];

    /**
     * Get resource validation rules.
     *
     * @param mixed|null $record
     *      the record being updated, or null if creating a resource.
     * @return array
     */
    protected function rules($record, array $data): array
    {
        if ($record) {
            return [
                'name' => [
                    Rule::unique('tags')->ignore($record->id),
                    'sometimes',
                    'string',
                ],
                'color' => 'sometimes|string'
            ];
        }
        return [
            'name' => 'required|string|unique:tags,name',
            'color' => 'required|string'
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
            'filter.color' => 'filled|string',
        ];
    }
}
