@extends('adminlte::page')

@section('title', '男の子商品一覧')

@section('content_header')
    <h1>男の子関連商品一覧</h1>
    @stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>商品名</th>
                                <th>画像</th>
                                <th>商品情報</th>
                                <th>サイズ</th>
                                <th>アイテム種別</th>
                                <th>カテゴリー</th>
                                <th>価格</th>
                                <th>在庫</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <img src="{{ asset($item->image) }}" style="width: 100px; height:100px;">
                                    </td>
                                    <td>{{ $item->detail }}</td>
                                    <td>
                                    @if($sizes[ $item->size])
                                    <p>{{$sizes[$item -> size]['height']}}</p> 
                                    @endif
                                    </td>
                                    <td>
                                    @if($item_categorys[ $item->item_category])
                                    <p>{{$item_categorys[$item -> item_category]['item_category']}}</p> 
                                    @endif
                                    </td>
                                    <td>
                                    @if($categorys[ $item->category])
                                    <p>{{$categorys[$item ->category]['category']}}</p> 
                                    @endif
                                    </td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->stock }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $items->links() }}
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
