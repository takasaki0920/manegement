@extends('adminlte::page')

@section('content')
        

<div class="center-block">
    <h2 class="text-center pt-5 mb-5">従業員編集画面</h2>
    
    <div class="card mx-auto" style="width: 35rem">
    

        <!-- 従業員情報編集画面 -->
        <form  action="{{ url('user/update/'.$user->id) }}" method="POST" >
            {{ csrf_field() }}

            <div class="form-group">
                
                <h4 class="form-label mx-5 mt-4">従業員ID:　{{$user->id}}</h4>
                
                <div class="col-sm ">
                    <label  class="form-label mt-3">名前</label>
                    <input type="text" class="form-control " name="name" id="user-name" value="{{$user->name}}">
                    <div class="text-danger">
                    @if($errors->has('name'))
                        @foreach($errors->get('name') as $message)
                            {{ $message }}<br>
                        @endforeach
                    @endif 
                    </div>
                </div>


                <div class="col-sm ">
                    <label class="form-label mt-3">メールアドレス</label>
                    <input type="text" class="form-control " name="email" id="user-email" value="{{$user->email}}">
                    <div class="text-danger">
                    @if($errors->has('email'))
                        @foreach($errors->get('email') as $message)
                            {{ $message }}<br>
                        @endforeach
                    @endif 
                    </div>
                    
                </div>

                <!-- 管理者用チェックボックス -->
                <div class="form-check mt-4">
                    <input type="checkbox" name="role" id="" value="1" {{ $user->role == 1 ? 'checked' : '' }} > 管理者権限を付与する<br>
                </div>
                
            </div>

            <!-- 従業員情報更新ボタン -->
            <div class="form-group text-center mt-5">
                <div class="btn-group-vertical " role="group" aria-label="Vertical button group">
                    <button type="submit" class="btn btn-outline-primary btn-lg px-5">更新する</button>
                </div>
            </div>
        </form>

        <!-- 従業員削除ボタン -->
        <form class="text-center mt-2" action="{{ url('user/delete/'.$user->id) }}" method="POST" >
            {{ csrf_field() }} 
            <div class="form-group">
                <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                    <button type="submit" class="btn btn-outline-primary btn-lg px-5 mb-4">削除</button>
                </div >
            </div>
        </form>
        <div class="text-center mt-2 mb-3">
            <a href="/user/user_list" >従業員一覧画面へ戻る</a> 
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop