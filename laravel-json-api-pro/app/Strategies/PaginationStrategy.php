<?php

namespace App\Strategies;

use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use Neomerx\JsonApi\Contracts\Encoder\Parameters\EncodingParametersInterface;

class PaginationStrategy extends StandardStrategy
{
    /**
     * @inheritDoc
     */
    public function paginate($query, EncodingParametersInterface $parameters)
    {
        $pageParameters = collect((array) $parameters->getPaginationParameters());
        $paginator = $this->query($query, $pageParameters);

        return $this->createPage($paginator, $parameters);
    }
}
