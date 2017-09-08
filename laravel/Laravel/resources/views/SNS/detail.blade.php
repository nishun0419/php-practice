@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="text-right">
				投稿日時{{ $data -> created_at }}
			</div>
			<div class="panel panel-info">
				<div class="panel-heading">
					<h1>{{ $data -> title}}</h1>
				</div>
				<div class="panel-body">
					{{ $data -> message}}
					<p>
						<a href="{{ asset('images/imgh1.jpg') }}" rel="lightbox[set]">
							<img src="{{ asset('images/imgh1.jpg') }}" width="256"/>
						</a>
						<a href="{{ asset('images/imgh1.jpg') }}" rel="lightbox[set]">
							<img src="{{ asset('images/imgh1.jpg') }}" width="256"/>
						</a>
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<button type="button" class="btn btn-primary" id="back-Top">
				一覧に戻る
			</button>
			<input type="hidden" class="task-Id" value="{{ $data -> id }}">
			<button type="button" class="btn btn-danger" id="detail-Delete">
				削除
			</button>
		</div>
	</div>
</div>
@endsection