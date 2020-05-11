<?php

namespace App\Orchid\Layouts\Topic;

use App\Services\BookLocator;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\TextArea;

/**
 * Class PublicationFormLayout
 * @package App\Orchid\Layouts\Content
 */
class TopicFormLayout extends Rows
{
    /**
     * @var int|null
     */
    private int $book_id;

    /**
     * TopicFormLayout constructor.
     * @param array $layouts
     * @param BookLocator $bookLocator
     */
    public function __construct(BookLocator $bookLocator = null, array $layouts = [])
    {
        parent::__construct($layouts);
        $this->book_id = $bookLocator->getBookId();
    }

    /**
     * @inheritDoc
     */
    protected function fields(): array
    {
        return [
            Input::make('topic.id')
                ->type('hidden'),
            Input::make('topic.book_id')
                ->type('hidden')
                ->value($this->book_id),
            Input::make('topic.topic')
                ->title('Chapter')
                ->placeholder('Chapter')
                ->horizontal(),
            TextArea::make('topic.brief_description')
                ->title('Description')
                ->placeholder('Description')
                ->rows(8)
                ->horizontal(),
            Button::make('Save')
                ->icon('icon-save')
                ->class('btn btn-primary')
                ->method('saveBookTopics')
        ];
    }
}
