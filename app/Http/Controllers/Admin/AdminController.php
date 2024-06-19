<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard-admin');
    }

    public function produk()
    {
        return view('admin.produk-admin');
    }

    public function rekapData()
    {
        return view('admin.rekap-admin');
    }
    public function konfirmasiBayar()
    {
        return view('admin.konfirmasi-admin');
    }
}
