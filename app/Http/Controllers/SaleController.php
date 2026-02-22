<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        $query = Sale::with('product');
        
        // Filter by date range
        if ($request->filled('start_date')) {
            $query->whereDate('sale_date', '>=', $request->start_date);
        }
        
        if ($request->filled('end_date')) {
            $query->whereDate('sale_date', '<=', $request->end_date);
        }
        
        // Filter by specific date
        if ($request->filled('date')) {
            $query->whereDate('sale_date', $request->date);
        }
        
        $sales = $query->latest('sale_date')->paginate(10)->withQueryString();
        
        // Calculate summary for filtered data
        $totalJumlah = $query->sum('jumlah');
        $totalTransactions = $query->count();
        
        return view('sales.index', compact('sales', 'totalJumlah', 'totalTransactions'));
    }

    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'sale_date' => 'required|date',
            'jumlah' => 'required|integer|min:1',
        ]);

        Sale::create($validated);

        return redirect()->route('sales.index')
            ->with('success', 'Data penjualan berhasil ditambahkan!');
    }

    public function show(Sale $sale)
    {
        $sale->load('product');
        return view('sales.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {
        $products = Product::all();
        return view('sales.edit', compact('sale', 'products'));
    }

    public function update(Request $request, Sale $sale)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'sale_date' => 'required|date',
            'jumlah' => 'required|integer|min:1',
        ]);

        $sale->update($validated);

        return redirect()->route('sales.index')
            ->with('success', 'Data penjualan berhasil diupdate!');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();

        return redirect()->route('sales.index')
            ->with('success', 'Data penjualan berhasil dihapus!');
    }
}
