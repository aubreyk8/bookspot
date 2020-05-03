<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;

/**
 * Class SlugHelper
 * @package App\Helpers
 */
class SlugHelper
{
    /**
     * @param string $title
     * @return string
     */
    public static function generate(string $title): string
    {
        return Str::slug(
            $title . '-' .str_replace(':', ' ', Carbon::now()->toDateTimeString()),
            '-'
        );
    }
}
