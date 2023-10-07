<?php

namespace App\JsonApi\V1\Users;

use Illuminate\Validation\Rule;
use CloudCreativity\LaravelJsonApi\Rules\HasMany;
use CloudCreativity\LaravelJsonApi\Validation\AbstractValidators;

class Validators extends AbstractValidators
{

    /**
     * The include paths a client is allowed to request.
     *
     * @var string[]|null
     *      the allowed paths, an empty array for none allowed, or null to allow all paths.
     */
    protected $allowedIncludePaths = ['roles', 'roles.permissions'];

    /**
     * The sort field names a client is allowed send.
     *
     * @var string[]|null
     *      the allowed fields, an empty array for none allowed, or null to allow all fields.
     */
    protected $allowedSortParameters = ['name', 'email', 'roles.name', 'created_at'];

    /**
     * The filters a client is allowed send.
     *
     * @var string[]|null
     *      the allowed filters, an empty array for none allowed, or null to allow all.
     */
    protected $allowedFilteringParameters = ['name', 'email', 'roles'];

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
                'name' => 'sometimes|string',
                'email' => ['sometimes', 'email', Rule::unique('users')->ignore($record->id)],
                'profile_image' => 'sometimes|nullable|url',
                'password' => 'sometimes|confirmed|string|min:8',
                'roles' => ['sometimes', new HasMany('roles')]
            ];
        }

        return [
            'name' => 'required|string',
            'email' => ['required', 'email', Rule::unique('users')],
            'profile_image' => 'nullable|url',
            'password' => 'required|confirmed|string|min:8',
            'roles' => [
                'required',
                new HasMany('roles')
            ]
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
            'filter.email' => 'filled|string',
            'filter.roles' => 'filled|string',
        ];
    }

}
