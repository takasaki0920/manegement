<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// S3ダミー用
class S3Controller extends Controller
{
    

    
    // S3へのファイルアップロード
    public function uploadS3(Request $request)
    {
        // バリデーション
        $request->validate(
            [
                'file' => 'required|file',
            ]
        );

        // S3へファイルをアップロード
        $result = Storage::disk('s3')->put('/', $request->file('file'), 'public'); 

        // アップロードの成功判定
        if ($result) {
            return redirect()->route('home');
            
        }else {
            return redirect('upload');
        }
    }
    

    // S3からのファイルダウンロード
    public function downloadS3()
    {
        
        return view('download');
    
    }

}