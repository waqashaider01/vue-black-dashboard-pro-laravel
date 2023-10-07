<?php

namespace App\JsonApi\V1\Users;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'users';

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
            'email' => $resource->email,
            'profile_image' => $resource->profile_image,
            'created_at' => optional($resource->created_at)->format("Y-m-d H:i:s"),
            'updated_at' => optional($resource->updated_at)->format("Y-m-d H:i:s"),
        ];
    }

    public function getRelationships($user, $isPrimary, array $includeRelationships)
    {
        return [
            'roles' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::SHOW_DATA => isset($includeRelationships['roles']),
                self::DATA => function () use ($user) {
                    return $user->roles;
                },
            ]
        ];
    }
}
