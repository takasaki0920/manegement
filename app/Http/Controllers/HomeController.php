<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Consts\CategoryConst;
use App\Consts\SizeConst;
use App\Consts\ItemCategoryConst;
use Illuminate\Support\Facades\Auth;

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
     * ホーム画面
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.home');
    }

    /**
     * 全商品一覧（利用者用）
     */
    public function all_item()
    {
        // すべての商品一覧を９件ずつ取得
        $items = Item::paginate(9);

        // 各ドロップダウンリストの読み込み用
        $categorys = CategoryConst::CATEGORYS;
        $item_categorys = ItemCategoryConst::ITEMCATEGORYS;
        $sizes = SizeConst::SIZES;

        return view('home.all_item',[ 'items' => $items, 'sizes' => $sizes, 'item_categorys' => $item_categorys, 'categorys' => $categorys]);
    }

    /**
     * グッズ一覧（利用者用）
     */
    public function goods_list()
    {
        // 商品カテゴリーがGoodsの一覧を９件ずつ取得
        $items = Item::where('category','1')->paginate(9);

        // 各ドロップダウンリストの読み込み用
        $categorys = CategoryConst::CATEGORYS;
        $item_categorys = ItemCategoryConst::ITEMCATEGORYS;
        $sizes = SizeConst::SIZES;

        return view('home.goods_list',[ 'items' => $items, 'sizes' => $sizes, 'item_categorys' => $item_categorys, 'categorys' => $categorys]);
    }

    /**
     * 男の子商品一覧（利用者用）
     */
    public function boys_list()
    {
        // 商品カテゴリーがBoysの一覧を９件ずつ取得
        $items = Item::where('category','2')->paginate(9);

        // 各ドロップダウンリストの読み込み用
        $categorys = CategoryConst::CATEGORYS;
        $item_categorys = ItemCategoryConst::ITEMCATEGORYS;
        $sizes = SizeConst::SIZES;

        return view('home.boys_list',[ 'items' => $items, 'sizes' => $sizes, 'item_categorys' => $item_categorys, 'categorys' => $categorys]);
    }

    /**
     * 女の子商品一覧（利用者用）
     */
    public function girls_list()
    {
        // 商品カテゴリーがGirlsの一覧を９件ずつ取得
        $items = Item::where('category','3')->paginate(9);

        // 各ドロップダウンリストの読み込み用
        $categorys = CategoryConst::CATEGORYS;
        $item_categorys = ItemCategoryConst::ITEMCATEGORYS;
        $sizes = SizeConst::SIZES;

        return view('home.girls_list',[ 'items' => $items, 'sizes' => $sizes, 'item_categorys' => $item_categorys, 'categorys' => $categorys]);
    }

    /**
     * 商品詳細画面（利用者用）
     */
    public function detail($id)
    {
        //requestで受け取ったidのレコード1件取得
        $item = Item::find($id);

        // 各ドロップダウンリストの読み込み用
        $categorys = CategoryConst::CATEGORYS;
        $item_categorys = ItemCategoryConst::ITEMCATEGORYS;
        $sizes = SizeConst::SIZES;

        return view('home.detail', ['item' => $item, 'sizes' => $sizes, 'item_categorys' => $item_categorys, 'categorys' => $categorys]);
    }

}
