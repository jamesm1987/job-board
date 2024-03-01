<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobResource\Pages;
use App\Filament\Resources\JobResource\RelationManagers;
use App\Models\Job;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\TextColumn;


use App\Enum\JobHours;
use App\Enum\JobTimeOfDay;


class JobResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'view_own',
            'create',
            'update',
            'restore',
            'restore_any',
            'replicate',
            'reorder',
            'delete',
            'delete_any',
            'force_delete',
            'force_delete_any',
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->can('view_any_job')) {
            return parent::getEloquentQuery();
        }
        
        return parent::getEloquentQuery()->where('creator_id', auth()->user()->id);
    }

    public static function form(Form $form): Form
    {   
        return $form
            ->schema([
                TextInput::make('title')->required(),
                Select::make('location_id')->label('Area')->relationship('location', 'name')->required(),
                Select::make('hours')->options(JobHours::class)->required(),
                Select::make('time_of_day')->options(JobTimeOfDay::class)->required(),
                TextInput::make('location')->required(),
                TextInput::make('wage')->required()->prefix('£'),
                TextInput::make('contact_number')->required()->tel(),
                TextInput::make('contact_email')->required()->email(),
                RichEditor::make('description')->required()->disableToolbarButtons([
                    'attachFiles',
                    'strike',
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('location'),
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
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }

   
}
