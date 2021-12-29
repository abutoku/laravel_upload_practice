<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Models\Photo;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //インデックスページを表示
        $photos = Photo::getAllOrderByUpdated_at();
        return view('photo.index',[
            'photos' => $photos
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
        return view('photo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->image);
        // バリデーション
        $validator = Validator::make($request->all(), [
            'title' => 'required | max:191',
            'image' => 'required|file|image',
        ]);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
                ->route('photo.create')
                ->withInput()
                ->withErrors($validator);
        }
        //リクエストファイルの画像を取得
        $upload_image = $request->file('image');

        //画像をpublic直下のuploadsに保存し$pathにパスを取得
        $path = $upload_image->store('uploads', "public");

        if($path){
            //DBに保存
            $result = Photo::create([
                "title" => $request->title,
                "image" => $path
            ]);
        }


        // ルーティング「todo.index」にリクエスト送信（一覧ページに移動）
        return redirect()->route('photo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::find($id);
        return view('photo.show', ['photo' => $photo]);
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
