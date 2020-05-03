<?php

namespace App\Orchid\Type;

/**
 * Class RatingType
 * @package App\Orchid\Type
 */
class RatingType
{
    /**
     * @param int $rating
     * @param string $icon
     * @return array|string
     * @throws \Throwable
     */
    public static function make(int $rating, string $icon = 'fa fa-star')
    {
        return view('vendor.platform.partials.rating', [
            'rating' => $rating,
            'icon' => $icon
        ])->render();
    }
}
