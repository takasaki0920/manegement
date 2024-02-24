@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-md-10">
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
                            <textarea type="text" class="form-control" id="datall" name="detail" placeholder="詳細情報"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="size">サイズ *必須</label>
                            <input type="text" class="form-control" id="size" name="size" placeholder="サイズ">
                        </div>

                        <div class="form-group">
                            <label for="item_category">アイテムカテゴリー *必須</label>
                            <input type="text" class="form-control" id="item_category" name="item_category" placeholder="アイテムカテゴリー">
                        </div>

                        <div class="form-group">
                            <label for="category">カテゴリー *必須</label>
                            <input type="text" class="form-control" id="category" name="category" placeholder="カテゴリー">
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
