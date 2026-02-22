<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Get real data from database
        $totalProducts = \App\Models\Product::count();
        $totalSalesToday = \App\Models\Sale::whereDate('sale_date', today())->sum('jumlah');
        $totalSalesThisMonth = \App\Models\Sale::whereMonth('sale_date', now()->month)
                                              ->whereYear('sale_date', now()->year)
                                              ->count();
        
        // Get recent products (top 3)
        $topProducts = \App\Models\Product::latest()->take(3)->get();
        
        // Get recent sales for activity
        $recentSales = \App\Models\Sale::latest()->take(3)->get();
        
        return view('dashboard.index', compact(
            'user',
            'totalProducts',
            'totalSalesToday',
            'totalSalesThisMonth',
            'topProducts',
            'recentSales'
        ));
    }
}
