@extends('adminlte::page')

@section('title', '商品編集画面')

@section('content')
        

<div class="center-block">
    <h1 class="text-center pt-5 mb-5">商品編集画面</h1>
    <div class="col-md-10 mx-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <div class="card card-primary">
            <form action="{{ url('item/update/'.$item->id) }}" method="POST" >
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">商品ID:{{$item->id}} </label>
                    </div>
                    <div class="form-group">
                        <label for="name">商品名 *必須</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}" >
                    </div>
                    <div class="form-group">
                        <label for="detail">商品情報 *必須</label>
                        <textarea type="text" class="form-control" id="detail" name="detail">{{ $item->detail }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="size">サイズ</label>
                        <select class="form-select" name="size" id="floatingSelect" aria-label="Floating label select example">
                        @foreach($sizes as $key => $size)
                            <option value="{{$key}}" {{ $item->size == $key ? 'selected' : '' }}>{{$size['height']}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="item_category">アイテムカテゴリー</label>
                        <select class="form-select" name="item_category" id="floatingSelect" aria-label="Floating label select example">
                        @foreach($item_categorys as $key => $item_category)
                            <option value="{{$key}}" {{ $item->item_category == $key ? 'selected' : '' }}>{{$item_category['item_category']}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category">カテゴリー</label>
                        <select class="form-select" name="category" id="floatingSelect" aria-label="Floating label select example">
                        @foreach($categorys as $key => $category)
                            <option value="{{$key}}" {{ $item->category == $key ? 'selected' : '' }}>{{$category['category']}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">価格 *必須</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{$item->price}}">
                    </div>
                    <div class="form-group">
                        <label for="stock">初期在庫 *必須</label>
                        <input type="text" class="form-control" id="stock" name="stock" value="{{$item->stock}}">
                    </div>
                    <div class="form-group">
                        <label for="stock">商品コード *必須</label>
                        <input type="text" class="form-control" id="item_code" name="item_code" value="{{$item->item_code}}">
                    </div>
                    <div class="form-group">
                        <label for="image">画像 </label>
                        <div class="col-md-6">
                            <input id="image" type="file" name="image" >
                        </div>
                    </div>
                </div>
                <!-- 更新ボタン -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">更新する</button>
                </div>
            </form>
            <!-- 商品削除ボタン -->
            <form action="{{ url('item/delete/'.$item->id) }}" method="POST">
            {{ csrf_field() }} 
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">削除する</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
