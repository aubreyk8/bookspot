<?php

namespace App\Orchid\Layouts\Topic;

use App\Models\Topic;
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use App\Traits\HasFunctionalAuth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;

/**
 * Class PublicationContentLayout
 * @package App\Orchid\Layouts\Content
 */
class TopicLayout extends Table
{
    use HasFunctionalAuth;

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
                        Button::make('Edit')
                            ->icon('icon-pencil')
                            ->method('getTopic')
                            ->parameters([
                                'topic_id' => $topic->id,
                            ])->canSee($this->hasPermission('publication-edit')),
                        Button::make('Remove')
                            ->icon('icon-close')
                            ->method('removeTopic')->parameters([
                                'action' => [
                                    'id' => $topic->id,
                                    'book_id' => $topic->book_id
                                ]
                            ])->canSee($this->hasPermission('publication-remove'))
                    ]);
            })->canSee($this->hasEitherPermission([
                'publication-remove',
                'publication-edit'
            ]))
        ];
    }
}
