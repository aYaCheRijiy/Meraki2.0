<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LinkResource\Pages;
use App\Filament\Resources\LinkResource\RelationManagers;
use App\Models\Link;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LinkResource extends Resource
{
    protected static ?string $model = Link::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('page_id')
                    ->relationship('page', 'title') // предполагая, что у Page есть поле title
                    ->required()
                    ->searchable()
                    ->preload()
                    ->columnSpanFull(),

                Forms\Components\Select::make('type')
                    ->options([
                        'social' => 'Social Media',
                        'marketplace' => 'Marketplace',
                        'website' => 'Website',
                        'other' => 'Other',
                    ])
                    ->required()
                    ->searchable(),

                Forms\Components\TextInput::make('text')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('url')
                    ->required()
                    ->url()
                    ->maxLength(500),

                Forms\Components\TextInput::make('icon')
                    ->maxLength(255)
                    ->helperText('Название иконки (например: heroicon-o-link)'),

                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page.title')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'social' => 'success',
                        'marketplace' => 'warning',
                        'website' => 'info',
                        'other' => 'gray',
                    }),

                Tables\Columns\TextColumn::make('text')
                    ->searchable(),

                Tables\Columns\TextColumn::make('url')
                    ->searchable()
                    ->limit(30),

                Tables\Columns\TextColumn::make('order')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'social' => 'Social Media',
                        'marketplace' => 'Marketplace',
                        'website' => 'Website',
                        'other' => 'Other',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLinks::route('/'),
            'create' => Pages\CreateLink::route('/create'),
            'edit' => Pages\EditLink::route('/{record}/edit'),
        ];
    }
}
