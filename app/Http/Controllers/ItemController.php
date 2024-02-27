<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Consts\CategoryConst;
use App\Consts\SizeConst;
use App\Consts\ItemCategoryConst;
use Illuminate\Validation\Rule;

use function Ramsey\Uuid\v1;

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
        $items = Item::paginate(10);

        $categorys = CategoryConst::CATEGORYS;
        $item_categorys = ItemCategoryConst::ITEMCATEGORYS;
        $sizes = SizeConst::SIZES;


        return view('item.index',[ 'items' => $items, 'sizes' => $sizes, 'item_categorys' => $item_categorys, 'categorys' => $categorys]);

    }

    public function edit(Request $request)
    {
        //requestで受け取ったidのレコード1件取得
        $item = Item::find($request->id);
        // 各項目の定数
        $categorys = CategoryConst::CATEGORYS;
        $item_categorys = ItemCategoryConst::ITEMCATEGORYS;
        $sizes = SizeConst::SIZES;

        $query = Item::orderBy('id', 'asc'); // ItemModelのデータをid昇順にして$usersに渡す
        if($request->size){
            $query = $query -> where('size',$request->size);
        }
        if($request->item_category){
            $query = $query -> where('item_category',$request->item_category);
        }
        if($request->category){
            $query = $query -> where('category',$request->category);
        }

        return view('item.edit', ['item' => $item, 'sizes' => $sizes, 'item_categorys' => $item_categorys, 'categorys' => $categorys]);
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // 各項目の定数
        $categorys = CategoryConst::CATEGORYS;
        $item_categorys = ItemCategoryConst::ITEMCATEGORYS;
        $sizes = SizeConst::SIZES;

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
                'stock' => $request->stock,
                'item_code' => $request->item_code
            ]);

            return redirect('/item/index');
        }
        $query = Item::orderBy('id', 'asc'); // UserModelのデータをid昇順にして$usersに渡す
        if($request->size){
            $query = $query -> where('size',$request->size);
        }
        if($request->item_category){
            $query = $query -> where('item_category',$request->item_category);
        }
        if($request->category){
            $query = $query -> where('category',$request->category);
        }


        $item = $query -> get();
        return view('item.add',['item' => $item, 'sizes' => $sizes, 'item_categorys' => $item_categorys, 'categorys' => $categorys]); 
    }

    public function update($id, Request $request) //idの情報とinputで入力された$request情報を持ってくる
    {
        $request->validate([
            'name' => 'required|string|max:25', 
            'detail' =>'required|max:500',
            'image' =>'image',
            'price' =>'required'|'integer',
            'stock' =>'required|max:500',
            'item_code' =>'required|string',
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

        $item = Item::find($id) ; // 該当idの情報を探して$userに渡す
        $item -> update([  // $userに渡された情報に$requestで渡された情報を更新していく   
            // 'user_id' => Auth::user()->id,
            'name' => $request->name,
            'image'=> $path,
            'detail' => $request->detail,
            'size' => $request->size,
            'item_category' => $request->item_category,
            'category' => $request->category,
            'price' => $request->price,
            'stock' => $request->stock,
            'item_code' => $request->item_code,
        ]);

        return redirect()->route('item.index') -> with('message','✔︎ 更新できました。') ; //ページのURLを変更したので、古いURLを自動的に新しいURLに転送する
    }
}
