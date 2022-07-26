<?php
declare(strict_types=1);

namespace App\Elastic;

use FOS\ElasticaBundle\Finder\PaginatedFinderInterface;
use Pagerfanta\Pagerfanta;

class ProductFinder
{
    public function __construct(
        private readonly PaginatedFinderInterface $finder
    ) {
    }

    public function searchProductsByText(string $searchString, int $page = 1, int $limit = 25): Pagerfanta
    {
        $products = $this->finder->findPaginated($searchString);
        $products->setMaxPerPage($limit);
        $products->setCurrentPage($page);

        return $products;
    }
}
