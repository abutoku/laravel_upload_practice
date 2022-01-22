<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Models\Picture;
//InterventionImage読み込み
use InterventionImage;
//Storegeの読み込み
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //インデックスページを表示
        $picture = Picture::getAllOrderByUpdated_at();
        return view('picture.index',[
            'picture' => $picture
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //データ入力ページを作成
        return view('picture.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->picture);
        // バリデーション
        $validator = Validator::make($request->all(), [
            'title' => 'required | max:191',
            'picture' => 'required|file|image',
        ]);

        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
                ->route('picture.create')
                ->withInput()
                ->withErrors($validator);
        }
        //リクエストファイルの画像を取得
        $upload_image = $request->file('picture');
        //画像をpublic直下のuploadsに保存し$pathにパスを取得
        $path = $upload_image->store('uploads', "public");

        if($path){
            //DBに保存
            $result = Picture::create([
                "title" => $request->title,
                "pictureUrl" => $path
            ]);
        }

        $resize = "storage/" . $path;
        InterventionImage::make($resize)->resize(100, null, function ($constraint) {$constraint->aspectRatio();})->save();

        // ルーティング「todo.index」にリクエスト送信（一覧ページに移動）
        return redirect()->route('picture.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
