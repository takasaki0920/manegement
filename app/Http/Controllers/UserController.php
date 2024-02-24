<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
   
    // 従業員一覧画面
    public function user_list(Request $request)
    {

        // $role = Auth::user()->role;
        // true or false
        // $isAdmin = $role == '1';

        
        $query = User::orderBy('id', 'asc'); // UserModelのデータをid昇順にして$usersに渡す
       
        $users = $query -> get();
        return view('user/user_list', ['users' => $users]);  // user_list画面を戻す　'isAdmin' => $isAdmin
    
    }


    // 従業員編集画面
    public function edit($id) //　idの引数が来たら
    {

        // $role = Auth::user()->role;
        // true or false
        // $isAdmin = $role == '1';
    
        $user = User::find($id); // 該当idの情報を探して$userに渡す

        return view('user/edit',['user' => $user ]); // edit画面を戻す
    }


    // 従業員情報を編集処理
    public function update($id, Request $request) //idの情報とinputで入力された$request情報を持ってくる
    {
        
        $request->validate([
            'name' => 'required|string|max:25', 
            'email' => ['required',Rule::unique('users')->ignore($id),'email:strict',"email:filter",'max:255'],
        ],
        [
            'name.required' => '＊名前を入力してください。',
            'name.max' => '＊名前は100文字までです。',
            'email.required' => '＊メールアドレスを入力してください。',
            'email.unique' => '＊すでに登録済みのメールアドレスです',
            'email.max' => '＊名前は255文字までです。',
            'email' => '＊有効なメールアドレスを入力してください',
        ]);
        
        $user = User::find($id) ; // 該当idの情報を探して$userに渡す
        $user -> update([  // $userに渡された情報に$requestで渡された情報を更新していく   
            'name' => $request->name,
            'email' => $request->email,
            'role' => !$request->role ? 0 : 1 ,
        ]);
        
        return redirect()->route('user_list') -> with('message','✔︎ 更新できました。') ; //ページのURLを変更したので、古いURLを自動的に新しいURLに転送する
    
    }


    //  従業員情報の削除処理
    public function delete($id)
    {
        $user = User::find($id); //Membersデータベースから該当のIDを探す
        $user -> delete(); //該当のID情報を消去する

        return redirect()->route('user_list')->with('message', '✔︎ 削除できました。') ; //ページのURLを変更したので、古いURLを自動的に新しいURLに転送する
    } 
    
}
