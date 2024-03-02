@extends('adminlte::page')

@section('title', '従業員一覧')

@section('content')

    <h1 class="text-center pt-5 pb-5 ">従業員一覧画面</h1> 


<!-- 従業員リスト -->
<div class="row">

@if(session('message'))
	<div class="alert alert-success" role="alert">
		{{ session('message') }}
	</div>
@endif
    <div class="col-12">
        <div class="card text-center">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap ">
                    <thead >
                        <tr>
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
        </div>
    </div>
</div>
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@endsection
