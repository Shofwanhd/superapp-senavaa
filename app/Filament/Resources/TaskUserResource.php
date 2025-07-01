<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Taskuser;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TaskUserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TaskUserResource\RelationManagers;

class TaskUserResource extends Resource
{

    protected static ?string $navigationGroup = 'Aplikasi';
    protected static ?int $navigationSort = 1;
    protected static ?string $model = Taskuser::class;

        public static function getNavigationLabel(): string
    {
        return 'List User';
    }

        public static function getModelLabel(): string
    {
        return 'List User';
    }
        public static function getNavigationGroup(): string
    {
        return 'Aplikasi > Daily Task';
    }

        public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', Auth::id());
    }
    
    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              	Forms\Components\Hidden::make('user_id')->default(Auth::id()),
                Forms\Components\Select::make('office')
                    ->required()
                    ->relationship('listoffice', 'kode'),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ListUser.name')
              		->label('user')
                    ->sortable(),
                Tables\Columns\TextColumn::make('office')
                    ->searchable()
              		->sortable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListTaskUsers::route('/'),
            'create' => Pages\CreateTaskUser::route('/create'),
            'edit' => Pages\EditTaskUser::route('/{record}/edit'),
        ];
    }
}
