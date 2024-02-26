<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use Closure;
use Filament\Forms\Get;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;



class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            //     TextInput::make('name')->required(),
            //     TextInput::make('email')->required()->email(),
            //     TextInput::make('password')->required()->password()->revealable()->maxLength(255),
            //     CheckboxList::make('roles')->relationship('roles', 'name')
            //         ->searchable()
            //         ->reactive(),
        
            //         Select::make('franchise_id')
            //         ->label('Franchise')
            //         ->relationship('franchise', 'name')
            //         ->searchable()
            //         ->hidden(fn ($get): bool => !in_array('Franchisee', $get('roles')))
            //         ->when(fn ($component) => !$component->isHidden(), function ($form) {
            //             $form->rules(['required']); // Add any rules you need when the field is visible
            //         }),
            // ])
            // ->afterStateUpdated(function (Closure $set, Closure $get) {
            //     if (!in_array('Franchisee', $get('roles'))) {
                    // $set('franchise_id', null);
                // }
            // });
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email')->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
