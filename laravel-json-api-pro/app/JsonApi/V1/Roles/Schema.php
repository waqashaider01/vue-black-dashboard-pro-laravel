<?php

namespace App\JsonApi\V1\Roles;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'roles';

    /**
     * @param object $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param object $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'name' => $resource->name,
            'created_at' => optional($resource->created_at)->format("Y-m-d H:i:s"),
            'updated_at' => optional($resource->updated_at)->format("Y-m-d H:i:s"),
        ];
    }

    public function getRelationships($role, $isPrimary, array $includeRelationships)
    {
        return [
            'permissions' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::SHOW_DATA => isset($includeRelationships['permissions']),
                self::DATA => function () use ($role) {
                    return $role->permissions;
                },
            ],
            'users' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::SHOW_DATA => isset($includeRelationships['users']),
                self::DATA => function () use ($role) {
                    return $role->users;
                },
            ]
        ];
    }
}
