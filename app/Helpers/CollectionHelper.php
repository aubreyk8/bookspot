<?php

namespace App\Helpers;

use Illuminate\Support\Collection;
use Illuminate\Container\Container;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Container\BindingResolutionException;

/***
 * Class CollectionHelper
 * @package App\Helpers
 */
class CollectionHelper
{
    /**
     * @param Collection $results
     * @param $total
     * @param $pageSize
     * @return mixed
     * @throws BindingResolutionException
     */
    public static function paginate(Collection $results, $total, $pageSize)
    {
        $page = Paginator::resolveCurrentPage('page');

        return self::paginator($results->forPage($page, $pageSize), $total, $pageSize, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);
    }

    /**
     * @param $items
     * @param $total
     * @param $perPage
     * @param $currentPage
     * @param $options
     * @return mixed
     * @throws BindingResolutionException
     */
    protected static function paginator($items, $total, $perPage, $currentPage, $options)
    {
        return Container::getInstance()->makeWith(LengthAwarePaginator::class, compact(
            'items',
            'total',
            'perPage',
            'currentPage',
            'options'
        ));
    }
}
