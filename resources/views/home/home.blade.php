@extends('adminlte::page')

@section('title', 'BabyBoon')

@section('content_header')
    <h1>BabyBoon</h1>
@stop

@section('content')
    <p>Welcome to BabyBoon.</p>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card h-100">
            <a href="{{URL::to('/check')}}">
            <img src="{{ asset('img/baby用品画像3.jpg') }}" class="card-img-top" alt="...">
            </a>
            <div class="card-body">
                <h5 class="card-title">Baby</h5>
                <p class="card-text">すべての商品を見る</p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
            <img src="{{ asset('img/baby用品画像2.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Goods</h5>
                <p class="card-text">赤ちゃんグッズを見る</p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
            <img src="{{ asset('img/Boy画像.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Baby_Boys</h5>
                <p class="card-text">男の子関連の商品を見る</p>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 ">
            <img src="{{ asset('img/Girl画像.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Baby_Girls</h5>
                <p class="card-text">女の子関連の商品を見る</p>
            </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
