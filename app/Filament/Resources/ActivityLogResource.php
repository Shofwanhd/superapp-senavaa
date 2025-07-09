<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ActivityLog;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Toggle;
use Filament\Pages\Actions\EditAction;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use App\Filament\Exports\ActivityLogExporter;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ExportBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ActivityLogResource\Pages;
use App\Filament\Resources\ActivityLogResource\RelationManagers;
use App\Filament\Resources\ActivityLogResource\Pages\EditActivityLog;
use App\Filament\Resources\ActivityLogResource\Pages\ListActivityLogs;
use App\Filament\Resources\ActivityLogResource\Pages\CreateActivityLog;
//use Filament\Actions\Exports\ExportBulkAction;

class ActivityLogResource extends Resource
{
    protected static ?string $model = ActivityLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

        public static function getNavigationLabel(): string
    {
        return 'Activity Log';
    }
    public static function getModelLabel(): string
    {
        return 'Activity Log';
    }
    public static function getNavigationGroup(): string
    {
        return 'Aplikasi > Activity Log';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')->default(Auth::id()),
                Forms\Components\Toggle::make('isExported')
                    ->required(),
                Forms\Components\TextInput::make('subject')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('requester')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('isi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('jawaban')
                    ->maxLength(255),
                Forms\Components\TextInput::make('noAL')
                    ->label(('Nomor AL'))
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('isExported')
                    ->boolean(),
                Tables\Columns\TextColumn::make('subject')
                    ->searchable(),
                Tables\Columns\TextColumn::make('requester')
                    ->searchable(),
                Tables\Columns\TextColumn::make('isi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jawaban')
                    ->searchable(),
                Tables\Columns\TextColumn::make('noAL')
                    ->label(('Nomor AL'))
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

                ExportBulkAction::make('exportOnly')
                    ->label('Export Data')
                    ->exporter(ActivityLogExporter::class),

                BulkAction::make('markExported')
                    ->label('Tandai sebagai Exported')
                    ->icon('heroicon-o-check-circle')
                    ->action(function ($records) {
                        $ids = $records->pluck('id')->toArray();
                        ActivityLog::whereIn('id', $ids)->update(['isExported' => 1]);
                    }),

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
            'index' => Pages\ListActivityLogs::route('/'),
            'create' => Pages\CreateActivityLog::route('/create'),
            'edit' => Pages\EditActivityLog::route('/{record}/edit'),
        ];
    }
}
