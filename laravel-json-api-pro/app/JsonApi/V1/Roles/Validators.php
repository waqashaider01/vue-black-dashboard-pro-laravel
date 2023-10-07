<?php

namespace App\JsonApi\V1\Roles;

use CloudCreativity\LaravelJsonApi\Rules\AllowedIncludePaths;
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
        'permissions',
    ];

    /**
     * The sort field names a client is allowed send.
     *
     * @var string[]|null
     *      the allowed fields, an empty array for none allowed, or null to allow all fields.
     */
    protected $allowedSortParameters = ['name', 'created_at'];

    /**
     * The filters a client is allowed send.
     *
     * @var string[]|null
     *      the allowed filters, an empty array for none allowed, or null to allow all.
     */
    protected $allowedFilteringParameters = ['name'];

    /**
     * Get a rule for the allowed include paths.
     * Overwrite to allow setting include paths based on permissions
     *
     * @return AllowedIncludePaths
     */
    protected function allowedIncludePaths(): AllowedIncludePaths
    {
        if (auth()->user()->can('view users')) {
            $this->allowedIncludePaths[] = 'users';
        }

        return new AllowedIncludePaths($this->allowedIncludePaths);
    }

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
            ];
        }

        return [
            'name' => 'required|string'
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
        ];
    }

}
