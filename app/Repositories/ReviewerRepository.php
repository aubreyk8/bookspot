<?php

namespace App\Repositories;

use App\Reviewer;

class ReviewerRepository extends BaseRepository
{
    /**
     * @var string
     */
    public string $prototype = Reviewer::class;
}
