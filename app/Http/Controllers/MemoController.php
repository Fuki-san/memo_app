<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use App\Http\Requests\MemoRequest;

class MemoController extends Controller
{

    // indexページへ移動
    public function index()
    {
        // モデル名::テーブル全件取得
        $memos = Memo::all();
        // memosディレクトリーの中のindexページを指定し、memosの連想配列を代入
        return view('memos.index', ['memos' => $memos]);
    }

    public function create()
    {
        return view('memos.create');
    }

    public function store(MemoRequest $request)
    {
        // インスタンスの作成
        $memo = new Memo;

        // 値の用意
        $memo->title = $request->title;
        $memo->body = $request->body;

        // インスタンスに値を設定して保存
        $memo->save();

        // 登録したらindexに戻る
        return redirect(route('memos.index'));
    }

    public function show($id)
    {
        $memo = Memo::find($id);
        return view('memos.show', ['memo' => $memo]);
    }
    //$idとすることで
    public function edit($id)
    {
        //memoクラスからデータを取得するメソッドfind
        $memo = Memo::find($id);
        // dd($memo);
        return view('memos.edit', ['memo' => $memo]);
    }
    //formのデータをRequestで取得
    public function update(MemoRequest $request, $id)
    {
        $memo = Memo::find($id);
        //$requestにブラウザのフォームで記入されたものが入る。
        $memo->title = $request->title;
        $memo->body = $request->body;

        $memo->save();
        return redirect(route('memos.index'));
    }
    public function destroy($id)
    {
        $memo = Memo::find($id);
        $memo->delete();

        return redirect(route("memos.index"));
    }
}
