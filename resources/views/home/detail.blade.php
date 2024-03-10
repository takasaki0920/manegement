@extends('adminlte::page')

@section('title', '商品詳細')

@section('content')

<div class="row text-center">
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

            <div class="center-block">
            <h1 class="text-center pt-5 mb-5">商品詳細</h1>
                <button class="rounded-md bg-gray-800 text-black px-4 py-2" onClick="history.back();">戻る</button>                    @csrf
                    <div class="card-body">
                        @if(!empty($item->image))
                        <img src="{{ asset($item->image) }}" style="height:20vw">
                        @else
                        <img src="{{ asset('img/baby.png') }}" style="height:20vw">
                        @endif   
                        <div class="form-group">
                            <label for="name">商品ID:{{$item->id}} </label>
                        </div>
                        <div class="form-group">
                            <label for="name">商品名</label>
                            <p>{{$item->name}}</p>
                        </div>

                        <div class="form-group">
                            <label for="detail">商品情報</label>
                            <p>{{$item->detail}}</p>
                        </div>

                        <div class="form-group">
                            <label for="size">サイズ</label>
                            @if($sizes[ $item->size])
                            <p>{{$sizes[$item -> size]['height']}}</p> 
                            @endif
                            
                        </div>

                        <div class="form-group">
                            <label for="item_category">アイテムカテゴリー</label>
                            @if($item_categorys[ $item->item_category])
                            <p>{{$item_categorys[$item -> item_category]['item_category']}}</p> 
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="category">カテゴリー</label>
                            @if($categorys[ $item->category])
                            <p>{{$categorys[$item ->category]['category']}}</p> 
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="price">価格</label>
                            <p>{{$item->price}}</p>                        
                        </div>

                        <div class="form-group">
                            <label for="stock">初期在庫</label>
                            <p>{{$item->stock}}</p>                        
                        </div>

                        <div class="form-group">
                            <label for="stock">商品コード</label>
                            <p>{{$item->item_code}}</p>                        
                        </div>

                    </div>
                
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop


