<?php
declare(strict_types=1);
namespace App\Http\Controllers;
use App\Http\Requests\HeightRegisterPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Height as HeightModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;



class RegisterController extends Controller
{
    /**
     * トップページ を表示する
     *
     * @return \Illuminate\View\View
     */

   protected function getListBuilder()
    {
        return HeightModel::where('user_id', Auth::id())

                     ->orderBy('created_at');
    }

    public function top()
    {
          $list = $this->getListBuilder();
        return view('health.register', ['list' => $list]);
    }




public function register(HeightRegisterPostRequest $request)
    {


        // validate済みのデータの取得
        $datum = $request->validated();
        //
        //$user = Auth::user();
        //$id = Auth::id();
        //var_dump($datum, $user, $id); exit;

        // user_id の追加
        $datum['user_id'] = Auth::id();

        // テーブルへのINSERT
        try {
            $r = HeightModel::create($datum);
        } catch(\Throwable $e) {
            // XXX 本当はログに書く等の処理をする。今回は一端「出力する」だけ
            echo $e->getMessage();
            exit;
        }

        // タスク登録成功
        $request->session()->flash('front.task_register_success', true);




        //
        return redirect('/health/register');

    }

     protected function getTaskModel($height_id)
    {
        // task_idのレコードを取得する
        $task = HeightModel::find($height_id);
        if ($task === null) {
            return null;
        }
        // 本人以外のタスクならNGとする
        if ($task->user_id !== Auth::id()) {
            return null;
        }
        //
        return $task;
    }



}