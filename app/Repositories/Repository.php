<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface Repository
 * @package App\Repository
 */
interface Repository
{
    /**
     * @param string|null $needle
     * @param string $column
     * @return LengthAwarePaginator
     */
    public function list(string $needle = null, string $column = 'id'): LengthAwarePaginator;

    /**
     * @param string $id
     * @return Model
     */
    public function find(string $id): Model;

    /**
     * @param array $inputs
     * @return Model
     */
    public function persist(array $inputs): Model;

    /**
     * @param int $id
     */
    public function remove(int $id): void;
}
