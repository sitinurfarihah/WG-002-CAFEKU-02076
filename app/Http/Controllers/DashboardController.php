<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //menampilkan halaman dashboard
    public function index()
    {
        return view ('dashboard');
    }
//menginisialisasi parameter
    public function store(Request $request)
    {
        $pesanan = explode(',', $request->pesanan);
        $status = $request->status;
        $jumlahpesanan = count($pesanan);
        $totalpesanan = $jumlahpesanan * 25000;
        $order = new Pembayaran;
        $bayar = $order->bayar($status, $jumlahpesanan);
//untuk menampilkan hasil di dashboard
        $data = [
            'nama' => $request->nama,
            'jumlahpesanan' => $jumlahpesanan,
            'totalpesanan' => $totalpesanan,
            'status' => $request->status,
            'diskon' => $order->diskon($status, $totalpesanan),
            'totalpembayaran' => $bayar,
        ];

        return view ('dashboard', compact ('data'));
    }

}
//interface
interface Order {
    public function diskon($status, $totalpesanan);
}
//class method
class Diskon implements Order {
    public function diskon($status, $totalpesanan)
    {
        if ($status == 'member' && $totalpesanan >= 100000 ) {
            return $totalpesanan - (0.2 * $totalpesanan);
        }else if($status == 'member' && $totalpesanan <= 100000 ) {
            return $totalpesanan - (0.1 * $totalpesanan);
        }else{
            return "0%";
        }
    }
}

class Pembayaran extends Diskon{
    public function bayar($status, $totalpesanan)
    {
        return (int)$totalpesanan - (int)$this->diskon($status, $totalpesanan);
    }
}

