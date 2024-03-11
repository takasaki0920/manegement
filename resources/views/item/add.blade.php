@extends('adminlte::page')

@section('title', '商品登録画面')

@section('content')
    <div class="row">
        <div class="col-md-10">
        <h1 class="text-center pt-5 mb-5">商品登録画面</h1>
        <button class="rounded-md bg-gray-800 text-black px-4 py-2" onClick="history.back();">前のページに戻る</button>                    @csrf
            <div class="card card-primary">
                
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">商品名 *必須</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="商品名">
                            <div class="text-danger">
                            @if($errors->has('name'))
                                @foreach($errors->get('name') as $message)
                                    {{ $message }}<br>
                                @endforeach
                            @endif  
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="detail">商品情報 *必須</label>
                            <textarea type="text" class="form-control" id="detail" name="detail" placeholder="詳細情報">{{ old('name') }}</textarea>
                            <div class="text-danger">
                            @if($errors->has('detail'))
                                @foreach($errors->get('detail') as $message)
                                    {{ $message }}<br>
                                @endforeach
                            @endif  
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="size">サイズ</label>
                            <select class="form-select" name="size" id="floatingSelect" aria-label="Floating label select example">
                            @foreach($sizes as $key => $size)
                                <option value="{{$key}}">{{$size['height']}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="item_category">アイテムカテゴリー</label>
                            <select class="form-select" name="item_category" id="floatingSelect" aria-label="Floating label select example">
                            @foreach($item_categorys as $key => $item_category)
                                <option value="{{$key}}">{{$item_category['item_category']}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category">カテゴリー</label>
                            <select class="form-select" name="category" id="floatingSelect" aria-label="Floating label select example">
                            @foreach($categorys as $key => $category)
                                <option value="{{$key}}">{{$category['category']}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">価格 *必須</label>
                            <input type="number" min="1" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="価格">
                            <div class="text-danger">
                            @if($errors->has('price'))
                                @foreach($errors->get('price') as $message)
                                    {{ $message }}<br>
                                @endforeach
                            @endif  
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="stock">初期在庫 *必須</label>
                            <input type="number" min="1" class="form-control" id="stock" name="stock" value="{{ old('stock') }}" placeholder="登録在庫">
                            <div class="text-danger">
                            @if($errors->has('stock'))
                                @foreach($errors->get('stock') as $message)
                                    {{ $message }}<br>
                                @endforeach
                            @endif  
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="stock">商品コード *必須</label>
                            <input type="text" class="form-control" id="item_code" name="item_code" value="{{ old('item_code') }}" placeholder="商品コード">
                            <div class="text-danger">
                            @if($errors->has('item_code'))
                                @foreach($errors->get('item_code') as $message)
                                    {{ $message }}<br>
                                @endforeach
                            @endif  
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image">画像 </label>
                            <div class="col-md-6">
                                <input id="image" type="file" name="image">
                            </div>
                        </div>


                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
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
