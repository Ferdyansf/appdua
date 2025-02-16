<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    
    public static function getNavigationGroup(): ?string
    {
    return 'Order management';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('catalog_id')
                ->label('Product')
                ->relationship('catalog', 'name_product')
                ->required(),
            DatePicker::make('start_date')
                ->label('Start Date')
                ->required(),
            DatePicker::make('end_date')
                ->label('End Date')
                ->required(),
            TextInput::make('duration')
                ->label('Duration (days)')
                ->numeric()
                ->required(),
            TextInput::make('total_price')
                ->label('Total Price')
                ->numeric()
                ->disabled() 
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('uid')
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('catalog.name_product')
                    ->label('Product')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('start_date')
                    ->label('Start Date')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('end_date')
                    ->label('End Date')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('duration')
                    ->label('Duration (days)')
                    ->sortable(),
                TextColumn::make('total_price')
                    ->label('Total Price')
                    ->sortable(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
