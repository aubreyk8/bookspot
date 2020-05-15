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
            Input::make('theme.primary_color')
                ->title('Primary Color')
                ->placeholder('Primary Color')
                ->horizontal(),
            Input::make('theme.secondary_color')
                ->title('Secondary Color')
                ->placeholder('Secondary Color')
                ->horizontal(),
            Input::make('theme.icon_color')
                ->title('Icon Color')
                ->placeholder('Icon Color')
                ->horizontal(),
            Input::make('theme.cover_image_height')
                ->title('Cover Image Height')
                ->placeholder('Cover Image Height')
                ->horizontal(),
            Input::make('theme.secondary_image_height')
                ->title('Secondary Image Height')
                ->placeholder('Secondary Image Height')
                ->horizontal(),
            Input::make('theme.font_color')
                ->title('Font Color')
                ->placeholder('Font Color')
                ->horizontal(),
            Button::make('Save')
                ->class('btn btn-primary')
                ->icon('icon-save')
                ->method('saveThemeSettings')
        ];
    }
}
