<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Models\Tag;
use Dom\Text;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TagsInput;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->label('Image')
                    ->nullable()
                    ->image()
                    ->disk('public')
                    ->directory('posts')
                    ->maxSize(5120)
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->openable()
                    ->downloadable()
                    ->columnSpanFull(),
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->string()
                    ->maxLength(255),
                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload(),
                RichEditor::make('content')
                    ->label('Content')
                    ->nullable()
                    ->maxLength(65535)
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('posts/content')
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->label('Description')
                    ->nullable()
                    ->rows(3)
                    ->maxLength(1000)
                    ->columnSpanFull(),
                TagsInput::make('tags')
                    ->label('Tags')
                    ->nullable()
                    ->separator(',')
                    ->splitKeys(['Tab', ' '])
                    ->reorderable()
                    ->trim()
                    ->nestedRecursiveRules([
                        'min:3',
                        'max:50',
                        'alpha_dash',
                    ])
                    ->helperText('Use letters, numbers, or dash (-). Max 50 characters per tag.')
                    ->formatStateUsing(
                        fn($record) => $record?->tags?->pluck('name')->toArray()
                    )
                    ->saveRelationshipsUsing(function ($record, $state) {
                        $tagIds = collect($state)
                            ->mapWithKeys(fn($tag, $index) => [
                                Tag::firstOrCreate(['name' => $tag])->id => ['order' => $index]
                            ])
                            ->toArray();
                        $record->tags()->sync($tagIds);
                    })
                    ->dehydrated(false),
                TagsInput::make('keywords')
                    ->label('Keywords')
                    ->nullable()
                    ->placeholder('New keyword')
                    ->separator(',')
                    ->splitKeys(['Tab', ' '])
                    ->reorderable()
                    ->trim()
                    ->nestedRecursiveRules([
                        'min:3',
                        'max:50',
                        'alpha_dash',
                    ])
                    ->helperText('Use letters, numbers, or dash (-). Max 50 characters per tag.'),
                Select::make('status')
                    ->label('Status')
                    ->required()
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'archived' => 'Archived',
                    ])
                    ->default('draft'),
            ]);
    }
}
