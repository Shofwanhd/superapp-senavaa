<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserroleResource\Pages;
use App\Filament\Resources\UserroleResource\RelationManagers;
use App\Models\Userrole;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserroleResource extends Resource
{
    protected static ?string $model = Userrole::class;

    protected static ?string $navigationGroup = 'Administrator';
    protected static ?int $navigationSort = 99;
    protected static ?string $navigationIcon = 'heroicon-o-shield-exclamation';

    public static function getNavigationLabel(): string
    {
        return 'User Role';
    }
    public static function getModelLabel(): string
    {
        return 'User Role';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('role')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('role')
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
            'index' => Pages\ListUserroles::route('/'),
            'create' => Pages\CreateUserrole::route('/create'),
            'edit' => Pages\EditUserrole::route('/{record}/edit'),
        ];
    }
}
