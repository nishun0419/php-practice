@extends('layouts.app')

@section('content')
<div id="white_back">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div id="postBox" class="panel panel-info">
					<div class="panel-heading">
						新規投稿
						<button type="button" class="close" id="close-PostBox">&times;</button>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" method="POST" action="/SNS/form">
							{{ csrf_field() }}
							<div class="form-group">
								<label class="col-md-4 control-label" for="Inputtitle">タイトル</label>
								<div class="col-md-6">
								<input type="text" class="form-control" id="Inputtitle" name="title" placeholder="タイトルを入力してください">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="Inputmassage">メッセージ</label>
								<div class="col-md-6">
									<textarea placeholder="メッセージを入力してください" row="5" class="form-control" name="message" id="Inputmassage"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-8 col-md-offset-4">
						  			<button type="submit" class="btn btn-primary">
                            		投稿
                            		</button>
                        		</div>
                    		</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<button type="button" class="btn btn-primary post-new">新規登録</button>
	<div class="row">
	@foreach($data as $val)
		<div class="col-sm-2">
			<div class="panel panel-info">
				<div class="panel-heading">
					{{ $val -> title }}
					<input type="hidden" class="task-id" value="{{ $val -> id }}"> 
					<button type="button" class="close close-task">&times;</button>
				</div>
				<div class="panel-body">
					{{ $val -> message }}
					@if($val -> created_at != $val -> updated_at)
						&nbsp;&nbsp;&nbsp;更新日時：{{ $val -> updated_at }}
					@endif
				</div> 
		
			<!-- <a href="/SNS/delete?id={{$val -> id}}">削除</a> <a href="/SNS/edit?id={{$val -> id}}">編集</a>&nbsp;IPアドレス：{{ $_SERVER["REMOTE_ADDR"] }} -->
			</div>
		</div>
	@endforeach
	</div>
@endsection
