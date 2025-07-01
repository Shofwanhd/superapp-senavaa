<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Taskuser;
use Filament\Forms\Form;
use Filament\Pages\Page;
use App\Models\Dailytask;
use App\Models\Clientlist;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Radio;    
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\ExportAction;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Exports\DailyTaskExporter;
use Filament\Tables\Actions\ExportBulkAction;
use App\Filament\Resources\DailyTaskResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DailyTaskResource\RelationManagers;

class DailyTaskResource extends Resource
{
    protected static ?string $navigationGroup = 'Aplikasi';
    protected static ?int $navigationSort = 1;

    protected static ?string $model = Dailytask::class;

        public static function getNavigationLabel(): string
    {
        return 'Daily Task';
    }

        public static function getModelLabel(): string
    {
        return 'Daily Task';
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

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        //$user = Auth::id();
        //$listpic = Taskuser::where('user_id', $user)->get();
        //dd($listpic);

        //dd($user);
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')->default(Auth::id()),
                Forms\Components\DatePicker::make('tanggal')
                    ->required(),
                Forms\Components\Select::make('category')
                    ->options([
                            'Assist' => 'Assist',
                            'Analisa' => 'Analisa',
                            'Consolidation' => 'Consolidation',
                            'Documentation' => 'Documentation',
                            'Deployment' => 'Deployment',
                            'QA/QC' => 'QA/QC',
                            'Meeting' => 'Meeting',
                            'Researching' => 'Researching',
                            'Training External' => 'Training External',
                            'Training Internal' => 'Training Internal',
                            'Screening' => 'Screening',
                            'Improvement' => 'Improvement',
                    ]),
                Forms\Components\TextInput::make('activities')
                    ->maxLength(255),
                Forms\Components\Radio::make('result')
                    ->options([
                            'Done' => 'Done',
                            'Not Done' => 'Not Done',
                        ]),
                Forms\Components\DatePicker::make('target_plan'),
                Forms\Components\TextInput::make('problem')
                    ->maxLength(255),
                // Forms\Components\Select::make('office')
                //     ->options([
                //             'CARE' => 'CARE',
                //             'TPIS' => 'TPIS'
                //         ])
                Forms\Components\Select::make('office')
                ->options(Clientlist::all()->pluck('kode', 'kode'))
                    ->reactive(),
                Forms\Components\Select::make('PIC')
                        ->options(function (callable $get) {
                                $office = $get('office');

                                if (!$office) {
                                    return [];
                                }

                                return Taskuser::where('office', $office)
                                    ->where('user_id', Auth::id())
                                    ->pluck('nama', 'nama')
                                    ->toArray();
                            })
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('activities')
                    ->searchable(),
                Tables\Columns\TextColumn::make('result')
                    ->searchable(),
                Tables\Columns\TextColumn::make('target_plan')
                    ->date(),
                Tables\Columns\TextColumn::make('problem')
                    ->searchable(),
                Tables\Columns\TextColumn::make('office')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('PIC')
                    ->searchable()
                    ->sortable(),
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
                    Filter::make('created_at')
                        ->form([
                            DatePicker::make('Tanggal_Awal')
                                ->default(now()->startOfWeek()),

                            DatePicker::make('Tanggal_Akhir')
                                ->default(now()->endOfWeek()),
                        ])
                        ->query(function (Builder $query, array $data): Builder {
                            return $query
                                ->when(
                                    $data['Tanggal_Awal'],
                                    fn (Builder $query, $date): Builder => $query->whereDate('tanggal', '>=', $date),
                                )
                                ->when(
                                    $data['Tanggal_Akhir'],
                                    fn (Builder $query, $date): Builder => $query->whereDate('tanggal', '<=', $date),
                                );
                        }),
                ])
            
            // ->filters([
            // Filter::make('created_at')
            //     ->form([
            //         DatePicker::make('Tanggal_Awal'),
            //         DatePicker::make('Tanggal_Akhir'),
            //     ])
            //     ->query(function (Builder $query, array $data): Builder {
            //         return $query
            //             ->when(
            //                 $data['Tanggal_Awal'],
            //                 fn (Builder $query, $date): Builder => $query->whereDate('tanggal', '>=', $date),
            //             )
            //             ->when(
            //                 $data['Tanggal_Akhir'],
            //                 fn (Builder $query, $date): Builder => $query->whereDate('tanggal', '<=', $date),
            //             );
            //     })
            // ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make()->exporter(DailyTaskExporter::class),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
        ->headerActions([
            // ExportAction::make()->exporter(DailyTaskExporter::class)
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
            'index' => Pages\ListDailyTasks::route('/'),
            'list' => Pages\ListDailyTasks::route('/list'),
            'create' => Pages\CreateDailyTask::route('/create'),
            'edit' => Pages\EditDailyTask::route('/{record}/edit'),
        ];
    }
}
