<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.home');
    }

    public function all_item()
    {
        // 商品一覧取得
       
        $items = Item::paginate(5);
        return view('home.all_item',[ 'items' => $items]);
    }

    // public function goods_item()
    // {
    //     return view('home.goods_item');
    // }

    // public function boys_item()
    // {
    //     return view('home.boys_item');
    // }

    // public function girls_item()
    // {
    //     return view('home.girls_item');
    // }

    public function add()
    {
        return view('home');
    }
}
