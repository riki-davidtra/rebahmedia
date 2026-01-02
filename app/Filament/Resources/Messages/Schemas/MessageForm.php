<?php

namespace App\Filament\Resources\Messages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->string()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Email')
                    ->nullable()
                    ->email(),
                TextInput::make('subject')
                    ->label('Subject')
                    ->required()
                    ->string()
                    ->maxLength(255),
                Textarea::make('body')
                    ->label('Message')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Toggle::make('is_read')
                    ->label('Is Read')
                    ->required()
                    ->default(false),
            ]);
    }
}
