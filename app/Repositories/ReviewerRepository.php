<?php

namespace App\Repositories;

use App\Reviewer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class ReviewerRepository implements Repository
{

    /**
     * @inheritDoc
     */
    public function list(string $needle = null, string $column = 'id', array $options = []): LengthAwarePaginator
    {
        return Reviewer::where($column, $needle)->paginate();
    }

    /**
     * @inheritDoc
     */
    public function find(string $needle, string $column = 'id', array $options = []): Model
    {
        return Reviewer::where($column, $needle)->get()->first();
    }

    /**
     * @inheritDoc
     */
    public function persist(array $inputs): Model
    {
        $reviewer = isset($inputs['id']) ? Reviewer::find($inputs['id']) : new Reviewer();
        $reviewer->fill($inputs);
        $reviewer->save();

        return $reviewer;
    }

    /**
     * @inheritDoc
     */
    public function remove(int $id): void
    {
        $reviewer = Reviewer::findOrFail($id);
        $reviewer->delete();
    }
}
