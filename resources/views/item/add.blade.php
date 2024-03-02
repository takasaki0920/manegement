@extends('adminlte::page')

@section('title', '商品登録画面')

@section('content')
    <div class="row">
        <div class="col-md-10">
        <h1>商品登録画面</h1>
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
                
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">商品名 *必須</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="商品名">
                        </div>

                        <div class="form-group">
                            <label for="detail">商品情報 *必須</label>
                            <textarea type="text" class="form-control" id="detail" name="detail" placeholder="詳細情報"></textarea>
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
                            <input type="text" class="form-control" id="price" name="price" placeholder="価格">
                        </div>

                        <div class="form-group">
                            <label for="stock">初期在庫 *必須</label>
                            <input type="text" class="form-control" id="stock" name="stock" placeholder="登録在庫">
                        </div>

                        <div class="form-group">
                            <label for="stock">商品コード *必須</label>
                            <input type="text" class="form-control" id="item_code" name="item_code" placeholder="商品コード">
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
