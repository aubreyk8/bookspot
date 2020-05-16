<?php

namespace App\Repositories;

use App\Models\Theme;

/**
 * Class ThemeRepository
 * @package App\Repositories
 */
class ThemeRepository extends BaseRepository
{
    /**
     * @var string
     */
    public string $prototype = Theme::class;
}
