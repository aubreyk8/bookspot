<?php

namespace App\Orchid\Type;

/**
 * Class Indicator
 * @package App\Orchid\Type
 */
class IndicatorType
{
    public static function make(bool $state, array $labels = [])
    {
        if (empty($labels)) {
            $labels = [
                'Suspended',
                'Active',
            ];
        }

        return view('platform::partials.indicator', [
            'state' => $state,
            'labels' => $labels,
        ])->render();
    }
}
