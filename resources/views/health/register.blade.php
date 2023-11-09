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

            	<h1>グラフ</h1>
   	<canvas id="myChart"></canvas>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
	<!-- グラフを描画 -->
   <script>

   //ラベル
    @foreach ($list as $task)
   var labels = [
		{{ $task->created_at->format('Y/m/d') }}
	];


	var weight_log = [
		{{ $task->name }}
	];


	@endforeach

	//グラフを描画
   var ctx = document.getElementById("myChart");
   var myChart = new Chart(ctx, {
		type: 'line',
		data : {
			labels: labels,
			datasets: [
				{
					label: '体重',
					data: weight_log,
					borderColor: "rgba(0,0,255,1)",
         			backgroundColor: "rgba(0,0,0,0)"
				}
			]


				},
		options: {
			title: {
				display: true,
				text: '体重ログ'
			}
		}
   });
  </script>



        <menu label="リンク">
        <a href="/logout">ログアウト</a><br>
        </menu>
@endsection