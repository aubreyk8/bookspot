<?php

namespace App\Repositories;

use App\Constants\DashboardView;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseRepository implements Repository
{
    /**
     * @var string
     */
    protected string $prototype;

    /**
     * @param string|null $needle
     * @param string $column
     * @return LengthAwarePaginator
     */
    public function list(string $needle = null, string $column = 'id'): LengthAwarePaginator
    {
        return $this->prototype::where($column, $needle)->paginate(DashboardView::PAGINATION_LENGTH);
    }

    /**
     * @param string $id
     * @return Model
     */
    public function find(string $id): Model
    {
        return $this->prototype::findOrFail($id);
    }

    /**
     * @param array $inputs
     * @return Model
     */
    public function persist(array $inputs): Model
    {
        $model = isset($inputs['id']) ? $this->prototype::find($inputs['id']) : new $this->prototype;
        $model->fill($inputs);
        $model->save();

        return $model;
    }

    /**
     * @param int $id
     */
    public function remove(int $id): void
    {
        $model = $this->prototype::find($id);
        $model->delete();
    }
}
