<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
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
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item::all();

        return view('item.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            $path = null;
            if($request->file("image")){
                $dir = "items";
                // アップロードされたファイル名を取得
                $file_name = $request->file('image')->getClientOriginalName();
                
                // 取得したファイル名で保存
                // storage/app/public/items/{ファイル名}
                $request->file('image')->storeAs('public/' . $dir, $file_name);

                // storage/items/{ファイル名}
                $path = 'storage/' . $dir. '/'.$file_name;
            }
            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'image'=> $path,
                'detail' => $request->detail,
                'size' => $request->size,
                'item_category' => $request->item_category,
                'category' => $request->category,
                'price' => $request->price,
                'stock' => $request->stock
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }
}
