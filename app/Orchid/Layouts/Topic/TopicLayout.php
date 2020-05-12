<?php

namespace App\Orchid\Layouts\Topic;

use App\Topic;
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;

/**
 * Class PublicationContentLayout
 * @package App\Orchid\Layouts\Content
 */
class TopicLayout extends Table
{
    public $target = 'topics';

    /**
     * @inheritDoc
     */
    protected function columns(): array
    {
        return [
            TD::set('topic', 'Topic'),
            TD::set('brief_description', 'Summary')->render(function (Topic $topic) {
                return substr($topic->brief_description, 0, 80) . '...';
            }),
            TD::set('action', 'Action')->render(function (Topic $topic) {
                return DropDown::make()
                    ->icon('icon-menu')
                    ->list([
                        Button::make('Remove')
                            ->icon('icon-close')
                            ->method('removeTopic')->parameters([
                                'action' => [
                                    'id' => $topic->id,
                                    'book_id' => $topic->book_id
                                ]
                            ])
                    ]);
            })
        ];
    }
}
