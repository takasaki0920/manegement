@extends('adminlte::page')

@section('title', '商品一覧')

@section('content')

<!-- タイトル -->
<h1 class="text-center pt-5 mb-5">商品一覧</h1>
    <div class="row ">
        <div class="col-12">
            <div class="card text-center">
                <div class="card-header">
                    <!-- 検索機能 -->
                    <div>
                        <form class=" mb-2" action="{{ route('item.index') }}" method="GET">
                            @csrf
                            <input class="mx-3" type="text" name="keyword" value="{{ $keyword }}" style="width:30%; height:50px;" placeholder="ID OR 商品名 OR 商品情報で検索">
                            <input type="number" name="min" value="" style="width:10%; height:50px;" placeholder="¥0">
                            〜
                            <input type="number" name="max" value="" style="width:10%; height:50px;" placeholder="最大金額">
                            <input class="mx-3" type="submit" value="検索" style="width:10%; height:50px;">
                        </form>
                    </div>
                    
                    <!-- 更新・削除　メッセージ -->
                    @if(session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    
                    <!-- 画面タイトル -->
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('item/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 商品一覧画面 ここから　-->
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
                                <th>商品コード</th>
                                <th>&ensp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ Str::limit($item->name,20) }}</td>
                                    <td>
                                        @if(!empty($item->image))
                                        <img src="{{ asset($item->image) }}" style="width: 100px; height:100px;">
                                        @else
                                        <img src="{{ asset('img/baby.png') }}" style="width: 100px; height:100px;">
                                        @endif
                                        
                                    </td>
                                    <td>{{ Str::limit($item->detail,20) }}</td>
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
                                    <td>{{ $item->item_code }}</td>
                                    <td class="table-text text-center">
                                        <a href="edit/{{ $item->id }}">>>編集</a> 
                                    </td>
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
