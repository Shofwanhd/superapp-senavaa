<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientlistResource\Pages;
use App\Filament\Resources\ClientlistResource\RelationManagers;
use App\Models\Clientlist;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClientlistResource extends Resource
{
    protected static ?string $model = Clientlist::class;

    protected static ?string $navigationGroup = 'Administrator';
    protected static ?int $navigationSort = 99;
    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function getNavigationLabel(): string
    {
        return 'List Client';
    }

    public static function getModelLabel(): string
    {
        return 'List Client';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Deskripsi')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Deskripsi')
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
            'index' => Pages\ListClientlists::route('/'),
            'create' => Pages\CreateClientlist::route('/create'),
            'edit' => Pages\EditClientlist::route('/{record}/edit'),
        ];
    }
}
