<?php

namespace App\Repositories;

use App\Topic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class TopicRepository
 * @package App\Repository
 */
class TopicRepository implements Repository
{

    /**
     * @inheritDoc
     */
    public function list(string $needle = null, string $column = 'id', array $options = []): LengthAwarePaginator
    {
        return Topic::where($column, $needle)->paginate();
    }

    /**
     * @inheritDoc
     */
    public function find(string $needle, string $column = 'id', array $options = []): Model
    {
        return Topic::findOrFail($needle);
    }

    /**
     * @inheritDoc
     */
    public function persist(array $inputs): Model
    {
        $topic = isset($inputs['id']) ? Topic::find($inputs['id']) : new Topic();
        $topic->fill($inputs);
        $topic->save();

        return $topic;
    }

    /**
     * @inheritDoc
     */
    public function remove(int $id): void
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();
    }
}
