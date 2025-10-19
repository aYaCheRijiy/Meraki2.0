<?php

namespace App\Filament\Resources;
use App\Models\User;
use App\Models\Role;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;

use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Closure;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Пользователи';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Основная информация')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Имя')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        Forms\Components\TextInput::make('password')
                            ->label('Пароль')
                            ->password()
                            ->required(fn ($livewire) => $livewire instanceof \Filament\Resources\Pages\CreateRecord)
                            ->rule(Password::default())
                            ->dehydrated(fn ($state) => filled($state))
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
                    ])->columns(2),

                Forms\Components\Section::make('Роли и права')
                    ->schema([
                        Forms\Components\Select::make('roles')
                            ->label('Роли')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->options(Role::all()->pluck('name', 'id'))
                            ->rules([
                                function () {
                                    return function (string $attribute, $value, Closure $fail) {
                                        $currentUser = auth()->user();
                                        $selectedRoles = Role::whereIn('id', $value)->get();

                                        foreach ($selectedRoles as $role) {
                                            if ($role->hierarchy_level >= $currentUser->getHierarchyLevel()) {
                                                $fail("Вы не можете назначать роль '{$role->name}' - у нее такой же или высший уровень доступа.");
                                            }
                                        }
                                    };
                                },
                            ])
                            ->hint(function () {
                                $currentUser = auth()->user();
                                $availableRoles = Role::where('hierarchy_level', '<', $currentUser->getHierarchyLevel())->get();
                                return 'Доступные роли: ' . $availableRoles->pluck('name')->implode(', ');
                            }),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Имя')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('roles.name')
                    ->label('Роли')
                    ->badge()
                    ->colors([
                        'danger' => 'super_admin',
                        'warning' => 'admin',
                        'success' => 'moderator',
                        'gray' => 'user',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Создан')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('roles')
                    ->label('Роль')
                    ->relationship('roles', 'name')
                    ->multiple(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->hidden(fn (User $record): bool =>
                    !auth()->user()->canManageUser($record)
                    ),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        $currentUser = auth()->user();

        // Супер-админ видит всех, кроме других супер-админов
        if ($currentUser->isSuperAdmin()) {
            return parent::getEloquentQuery()
                ->whereHas('roles', function ($query) {
                    $query->where('name', '!=', 'super_admin');
                })
                ->orWhereDoesntHave('roles');
        }

        // Обычный админ видит только тех, у кого уровень ниже
        return parent::getEloquentQuery()
            ->whereHas('roles', function ($query) use ($currentUser) {
                $query->where('hierarchy_level', '<', $currentUser->getHierarchyLevel());
            })
            ->orWhereDoesntHave('roles');
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\UserResource\Pages\ListUsers::route('/'),
            'create' => \App\Filament\Resources\UserResource\Pages\CreateUser::route('/create'),
            'edit' => \App\Filament\Resources\UserResource\Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
