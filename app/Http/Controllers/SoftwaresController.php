<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Software;
use App\Http\Controller\Auth;

class SoftwaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの登録の一覧を作成日時の降順で取得
            // （後のChapterで他ユーザの投稿も取得するように変更しますが、現時点ではこのユーザの投稿のみ取得します）
            $softwares = $user->softwares()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'softwares' => $softwares,
            ];
        }

        // Welcomeビューでそれらを表示
        return view('welcome', $data);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $software = new Software;

        // // メッセージ作成ビューを表示
        // return view('softwares.create', [
        //     'software' => $software,
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|max:255',
        ]);
        
        // 認証済みユーザとして作成（リクエストされた値をもとに作成）
        $request->user()->softwares()->create([
            'title' => $request->title,
            'developer' => $request->developer_id(),
            'distributor' => $request->distributor_id(),
            'platform' => $request->platform_id(),
            'released_day' =>$request->released_day(),
            'played_day' =>$request->played_day(),
        ]);

        // 前のURLへリダイレクトさせる
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // idの値でsoftwareを検索して取得
        $software = Software::findOrFail($id);
        
        // software編集ビューでそれを表示
        if (\Auth::id() === $software->user_id) {
            return view('softwares.edit', [
                'software' => $software,
            ]);
        }
         // 前のURLへリダイレクトさせる
        return back();
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
        // idの値でsoftwareを検索して取得
        $software =  Software::findOrFail($id);
        
        // メッセージを更新
        if (\Auth::id() === $software->user_id) {
            $software->title = $request->title;
            $software->developer_id = $request->developer_id;
            $software->distributor_id = $request->distributor_id;
            $software->platform_id = $request->platform_id;
            $software->released_day = $request->released_day;
            $software->played_day = $request->played_day;
            
            $software->save();
        }
        // トップへリダイレクトさせる
        return redirect()->route('softwares.show', ['user'=>\Auth::id()]);
    }

    /**s
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $software = \App\Software::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその登録の所有者である場合は、登録を削除
        if (\Auth::id() === $software->user_id) {
            $software->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
}
