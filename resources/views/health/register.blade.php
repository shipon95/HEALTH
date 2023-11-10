@extends('layout')

{{-- タイトル --}}
@section('title')(詳細画面)@endsection

{{-- メインコンテンツ --}}
@section('contets')
        <h1>体重登録</h1>
            @if (session('front.task_register_success') == true)
                体重を登録しました！！<br>
            @endif

            @if ($errors->any())
                <div>
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
                </div>
            @endif
            <form action="/health/register" method="post">
                @csrf
                体重:<input name="name" value="{{ old('name') }}"><br>

                <button>体重を登録する</button>
            </form>

<table border="1">
        <tr>
            <th>1
            <th>2
@foreach ($list as $task)
        <tr>
            <td>{{ $task->name }}
             <td>{{ $task->created_at }}
       @endforeach
  </table>

g




        <menu label="リンク">
        <a href="/logout">ログアウト</a><br>
        </menu>
@endsection