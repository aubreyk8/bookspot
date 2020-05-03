<?php

namespace App\Orchid\Type;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Orchid\Screen\Actions\ModalToggle;

/**
 * Class EditModalToggleType
 * @package App\Orchid\Type
 */
class EditModalToggleType extends ModalToggle
{
    /**
     * @param array $options
     * @return $this
     */
    public function asyncParameters($options = []): self
    {
        return $this
            ->set('asyncParameters', Arr::wrap($options))
            ->set('async', 'true')
            ->addBeforeRender(function () use ($options) {
                $method = $this->get('method');
                $action = route(Route::currentRouteName(), current($options));
                $this->set('action', $action.'/'.$method);
            });
    }
}
