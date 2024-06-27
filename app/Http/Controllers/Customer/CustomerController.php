<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function transaksi()
    {
        $transactions = Orders::where('user_id', Auth::id())->orderByDesc('created_at')->paginate(5);

        return view('transaksi.transaksi', compact('transactions'));
    }
}
