<?php

namespace App\Orchid\Layouts\Publishing;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Actions\Button;

class PublicationFormLayout extends Rows
{

    /**
     * @inheritDoc
     */
    protected function fields(): array
    {
        return [
            Input::make('name')->title('Name')->placeholder('Name')->horizontal(),
            Button::make('submit')->class('btn btn-primary pull-right')
                ->method('createOrEditBook')
        ];
    }
}
