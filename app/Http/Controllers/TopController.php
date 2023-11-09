<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;



class TopController extends Controller
{
    /**
     * トップページ を表示する
     *
     * @return \Illuminate\View\View
     */
    public function top()
    {
        return view('health.top');
    }
}