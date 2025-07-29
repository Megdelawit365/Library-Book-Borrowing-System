<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Borrow;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Pages\Actions\EditAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\BorrowResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BorrowResource\Pages\EditBorrow;
use App\Filament\Resources\BorrowResource\RelationManagers;
use App\Filament\Resources\BorrowResource\Pages\ListBorrows;
use App\Filament\Resources\BorrowResource\Pages\CreateBorrow;

class BorrowResource extends Resource
{
    protected static ?string $model = Borrow::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('book_id')->relationship('book', 'title')->required(),
                Select::make('student_id')->relationship('student', 'name')->required(),
                DateTimePicker::make('borrowed_at')
                    ->label('Borrowed At')
                    ->default(Carbon::now())
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('book.title'),
                Tables\Columns\TextColumn::make('student.name'),
                Tables\Columns\TextColumn::make('borrowed_at'),
                Tables\Columns\TextColumn::make('returned_at')->label('Status')->formatStateUsing(fn($state) => $state === null ? 'Not returned' : 'Returned'),

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
            'index' => Pages\ListBorrows::route('/'),
            'create' => Pages\CreateBorrow::route('/create'),
            'edit' => Pages\EditBorrow::route('/{record}/edit'),
        ];
    }
}
