<?php

namespace App\Orchid\Layouts\Theme;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Actions\Button;

/**
 * Class ThemeFormLayout
 * @package App\Orchid\Layouts\Theme
 */
class ThemeFormLayout extends Rows
{

    protected function fields(): array
    {
        return [
            Input::make('theme.id')
                ->type('hidden'),
            Input::make('theme.primary_color')
                ->type('text')
                ->title('Primary Color')
                ->placeholder('Primary Color')
                ->horizontal(),
            Input::make('theme.secondary_color')
                ->type('text')
                ->title('Secondary Color')
                ->placeholder('Secondary Color')
                ->horizontal(),
            Input::make('theme.icon_color')
                ->type('text')
                ->title('Icon Color')
                ->placeholder('Icon Color')
                ->horizontal(),
            Input::make('theme.cover_image_height')
                ->type('number')
                ->title('Cover Image Height')
                ->placeholder('Cover Image Height')
                ->horizontal(),
            Input::make('theme.secondary_image_height')
                ->type('number')
                ->title('Secondary Image Height')
                ->placeholder('Secondary Image Height')
                ->horizontal(),
            Input::make('theme.font_color')
                ->type('text')
                ->title('Font Color')
                ->placeholder('Font Color')
                ->horizontal(),
            Input::make('theme.book_id')
                ->type('hidden'),
            Button::make('Save')
                ->class('btn btn-primary')
                ->icon('icon-save')
                ->method('saveThemeSettings')
        ];
    }
}
