@extends('adminlte::page')

@section('content')

<h3 class="text-center pt-5 pb-5 ">従業員一覧画面</h3> 

<div class="text-center pb-5">
    <p><a href="user_list" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fs-6">全て表示する</a></p>
</div>

<!-- 従業員リスト -->
<div class="px-5 bg mx-5 bg pb-5">

@if(session('message'))
	<div class="alert alert-success" role="alert">
		{{ session('message') }}
	</div>
@endif

    <table class="table table-bordered">
    
        <thead >
            <tr class="table-primary text-center">
                <th>ID</th>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>更新日時</th>
                <th>権限</th>
                <th>&ensp;</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
            <tr>
                <!-- 従業員情報 -->
                <td class="table-text text-center">
                    <div>{{ $user->id }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $user->name }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $user->email }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $user->updated_at }}</div>
                </td>
                <td class="table-text text-center">
                    <!-- もしデータベースの中で {{$user->role}} が ‘0’ であれば、’利用者’を入力。そうでなければ、’管理者‘を入力。 -->
                    <div>{{ $user->role =='0' ? '利用者' : '管理者' }}</div>
                </td>
                <td class="table-text text-center">
                    <a href="edit/{{ $user->id }}">>>編集</a> 
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@endsection
