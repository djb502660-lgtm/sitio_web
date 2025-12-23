<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Panel principal del administrador
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $lowStockProducts = Product::where('stock', '<=', 5)->count();
        
        return view('admin.index', compact(
            'totalUsers',
            'totalProducts',
            'totalCategories',
            'lowStockProducts'
        ));
    }

    public function settings()
    {
        // Configuración del sistema
        return view('admin.settings');
    }
}
