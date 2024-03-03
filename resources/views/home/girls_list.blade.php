@extends('adminlte::page')

@section('title', '女の子商品一覧')

@section('content_header')
    <h1 class="pt-3 pb-3">女の子関連商品一覧</h1>
    @stop

@section('content')
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($items as $item)
    <div class="col mb-3">
        <div class="card h-100">
            @if(!empty($item->image))
            <img src="{{ asset($item->image) }}" style="height:20vw">
            @else
            <img src="{{ asset('img/no_image.png') }}" style="height:20vw">
            @endif        
            <div class="card-body">
                <h3 class="card-title">{{ $item->name }}</h3>
                <p class="card-text">{{ $item->detail }}</p>
                <p class="card-text">定価: {{ $item->price }} </p>
            </div>
            <div class="card-footer">
                <p><a href="detail/{{ $item->id }}">>>詳細</a></p> 
            </div>
        </div>
    </div>
    @endforeach    
</div>
{{ $items->links() }}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
