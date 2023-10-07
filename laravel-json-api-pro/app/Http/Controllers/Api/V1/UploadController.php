<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Api\V1\UploadRequest;

class UploadController extends Controller
{
    /**
     * List of allowed upload paths
     *
     * @var array
     */
    protected $allowedPaths = [
        'users' => [
            'profile-image'
        ],
        'items' => [
            'image'
        ]
    ];

    public function __construct()
    {
        $this->allowedPaths = collect($this->allowedPaths);
    }

    /**
     * Handle the incoming request.
     *
     * @param string $resource
     * @param int $id
     * @param string $field
     * @param UploadRequest $request
     * @return JsonResponse
     */
    public function __invoke(string $resource, int $id, string $field, UploadRequest $request)
    {
        // Check if path is allowed
        if ($this->routeIsAllowed($resource, $field)) {
            // TODO: Check if user has permissions

            $path = "{$resource}/{$id}/{$field}";

            // Upload the image and return the path
            $path = Storage::put($path, $request->file('attachment'));
            $url  = Storage::url($path);

            return response()->json(compact('url'), 201);
        }

        abort(400);
    }

    /**
     * Check if route is allowed
     *
     * @param string $resource
     * @param string $field
     * @return string|boolean
     */
    protected function routeIsAllowed(string $resource, string $field)
    {
        return $this->allowedPaths->search(function ($allowedFields, $allowedResource) use ($resource, $field) {
            return $resource == $allowedResource && in_array($field, $allowedFields);
        });
    }
}
