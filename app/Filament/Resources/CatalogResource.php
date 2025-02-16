<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CatalogResource\Pages;
use App\Filament\Resources\CatalogResource\RelationManagers;
use App\Models\Catalog; // Ensure that the Catalog class exists in thisuse Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\BelongsToSelect;

class CatalogResource extends Resource
{
    protected static ?string $model = Catalog::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';


    public static function getNavigationGroup(): ?string
    {
    return 'Item management';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name_product')
                    ->required()
                    ->maxLength(255),
                TextInput::make('price')
                    ->required()
                    ->numeric(),
                    
                TextInput::make('stock')
                    ->required()
                    ->numeric(),
                    
                Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ])
                    ->required(),
                select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Textarea::make('description')
                    ->nullable(),
                FileUpload::make('image')
                    ->image()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name_product')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('price')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('stock')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category_id')
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('image')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
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
            'index' => Pages\ListCatalogs::route('/'),
            'create' => Pages\CreateCatalog::route('/create'),
            'edit' => Pages\EditCatalog::route('/{record}/edit'),
        ];
    }
}
