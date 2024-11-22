<?php

namespace App\Filament\Resources;

use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use App\Enums\PaymentStatus;
use App\Filament\Resources\TransactionProductResource\Pages;
use App\Filament\Resources\TransactionProductResource\RelationManagers;
use App\Models\Product;
use App\Models\TransactionProduct;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionProductResource extends Resource
{
    protected static ?string $model = TransactionProduct::class;

    protected static ?string $navigationIcon = 'heroicon-s-truck';

    protected static ?string $navigationLabel = 'Transactions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('customer_id')
                    ->relationship('customer', 'nama')
                    ->required()
                    ->label('Name Customer'),
                Select::make('produk_id')
                    ->relationship('produk', 'nama')
                    ->required()
                    ->label('Name Product')
                    ->live()
                    ->afterStateUpdated(function (Set $set, $state, $get) {
                        if ($state) {
                            $product = Product::find($state);
                            $jumlah = $get('jumlah') ?? 0;
                            $harga = $product?->harga ?? 0;
                            $set('harga_total', $harga * $jumlah);
                        }
                    }),
                TextInput::make('jumlah')
                    ->numeric()
                    ->required()
                    ->label('Quantity')
                    ->live()
                    ->afterStateUpdated(function (Set $set, $state, $get) {
                        $produkId = $get('produk_id');
                        if ($produkId && $state) {
                            $product = Product::find($produkId);
                            $harga = $product?->harga ?? 0;
                            $set('harga_total', $harga * $state);
                        }
                    }),
                TextInput::make('harga_total')
                    ->numeric()
                    ->required()
                    ->label('Total Price')
                    ->prefix('Rp')
                    ->placeholder('0')
                    ->readOnly(),

                ToggleButtons::make('status_pembayaran')
                    ->options(
                        PaymentStatus::class
                    )
                    ->inline()
                    ->required()
                    ->label('Payment Status'),

                ToggleButtons::make('metode_pembayaran')
                    ->options(
                        PaymentMethod::class
                    )
                    ->inline()
                    ->required()
                    ->label('Payment Method'),

                DatePicker::make('tanggal_transaksi')
                    ->required()
                    ->label('Date of Transaction'),

                DatePicker::make('tanggal_selesai')
                    ->required()
                    ->label('Date finished'),

                ToggleButtons::make('status_transaksi')
                    ->options(
                        OrderStatus::class
                    )
                    ->inline()
                    ->required()
                    ->label('Transaksi Status'),
                Textarea::make('alamat_pengiriman')
                    ->required()
                    ->label('Address'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer.nama')
                    ->label('Customer Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('produk.nama')
                    ->label('Product Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('jumlah')
                    ->label('Quantity')
                    ->sortable(),

                TextColumn::make('harga_total')
                    ->label('Total Price')
                    ->money('idr')  // For Indonesian Rupiah
                    ->sortable(),

                TextColumn::make('status_pembayaran')
                    ->badge()
                    ->colors([
                        'danger' => 'failed',
                        'warning' => 'pending',
                        'success' => 'paid'
                    ])
                    ->sortable(),

                TextColumn::make('metode_pembayaran')
                    ->label('Payment Method')
                    ->sortable(),

                TextColumn::make('tanggal_transaksi')
                    ->label('Transaction Date')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('tanggal_selesai')
                    ->label('Finish Date')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('status_transaksi')
                    ->badge()
                    ->colors([
                        'primary' => 'new',
                        'warning' => 'processing',
                        'success' => 'completed',
                        'danger' => 'cancelled'
                    ])
                    ->sortable(),

                TextColumn::make('alamat_pengiriman')
                    ->label('Address')
                    ->limit(30)  
                    ->wrap(),   
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTransactionProducts::route('/'),
            'create' => Pages\CreateTransactionProduct::route('/create'),
            'edit' => Pages\EditTransactionProduct::route('/{record}/edit'),
        ];
    }
}
