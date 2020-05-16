<?php

namespace App\Repositories;

use App\Models\Topic;

/**
 * Class TopicRepository
 * @package App\Repository
 */
class TopicRepository extends BaseRepository
{
    /**
     * @var string
     */
    public string $prototype = Topic::class;
}
