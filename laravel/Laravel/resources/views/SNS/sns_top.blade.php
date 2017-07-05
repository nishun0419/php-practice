@extends('layouts.app')

@section('content')
	<div id="white_back">
		<div id="postBox" class="panel panel-info">
			<div class="panel-heading">
				新規投稿
				<button type="button" class="close" id="close-PostBox">&times;</button>
			</div>
		<div class="panel-body">
			<form method="POST" action="/SNS/form">
				<table id="post_table" border cellpadding="0">
					<tr>
						<th>タイトル</th>
						<td id="post_Title"><input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="text" name="title" placeholder="タイトルの入力してください"></td>
					</tr>
					<tr>
						<th>メッセージ</th><td id="post_Message"><textarea name="message"></textarea></td>
					</tr>
				</table>
				<button type="submit">投稿</button>
			</form>
		</div>
	</div>
	</div>


	<button type="button" class="btn btn-primary post-new">新規登録</button>
	@foreach($data as $val)
			<div><a href="/SNS/detail?id={{ $val -> id }}">{{ $val -> title}}</a>&nbsp;&nbsp;&nbsp;投稿日時：{{ $val -> created_at }}
			@if($val -> created_at != $val -> updated_at)
					&nbsp;&nbsp;&nbsp;更新日時：{{ $val -> updated_at }}
			@endif 
			<a href="/SNS/delete?id={{$val -> id}}">削除</a> <a href="/SNS/edit?id={{$val -> id}}">編集</a>&nbsp;IPアドレス：{{ $_SERVER["REMOTE_ADDR"] }}</div>
	@endforeach
	
@endsection
