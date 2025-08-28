<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Invoice;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Kullanıcının toplam faturaları
        $totalInvoices = Invoice::where('user_id', $user->id)->count();

        // Ödenmiş faturalar
        $paidInvoices = Invoice::where('user_id', $user->id)
                               ->where('status', 'paid')
                               ->count();

        // Ödenmemiş / bekleyen faturalar
        $pendingInvoices = Invoice::where('user_id', $user->id)
                                  ->where('status', '!=', 'paid')
                                  ->count();

        // Son 5 faturayı getir
        $recentInvoices = Invoice::where('user_id', $user->id)
                                 ->orderBy('created_at', 'desc')
                                 ->take(5)
                                 ->get();

        return view('userdashboard', compact('totalInvoices', 'paidInvoices', 'pendingInvoices', 'recentInvoices'));
    }
}
