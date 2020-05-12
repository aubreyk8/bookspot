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
     * @param array $options
     * @return LengthAwarePaginator
     */
    public function list(string $needle = null, string $column = 'id', array $options = []): LengthAwarePaginator;

    /**
     * @param string $needle
     * @param string $column
     * @param array $options
     * @return Model
     */
    public function find(string $needle, string $column = 'id', array $options = []): Model;

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
