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
						<form class="form-horizontal" method="POST" action="/SNS/form" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="form-group">
								<label class="col-md-4 control-label" for="Inputtitle">タイトル</label>
								<div class="col-md-6">
								<input type="text" class="form-control" id="Inputtitle" name="title" placeholder="タイトルを入力してください">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="inputMessage">メッセージ</label>
								<div class="col-md-6">
									<textarea placeholder="メッセージを入力してください" class="form-control" name="message" id="inputMessage"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="inputImage">画像</label>
								<div class="col-md-6">
									<input type="file" id="inputImage" name="inputImage[]" multiple="multiple">
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

<div class="container">
	<button type="button" class="btn btn-primary post-new">新規登録
	</button>
	<div class="row">
		@foreach($data as $val)
			<div class="col-sm-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<a href="/SNS/detail?id={{ $val -> id }}">
							{{ mb_strimwidth($val -> title, 0, 36, "...", "UTF-8") }}
						</a>
						<input type="hidden" class="task-id" value="{{ $val -> id }}"> 
						<button type="button" class="close close-task">&times;</button>
					</div>
					<div class="panel-body task-List">
						{{ mb_strimwidth($val -> message, 0, 36, "...", "UTF-8") }}

						<p class="text-right create-Data">
							{{ $val -> created_at }}
						</p>
					</div>
				</div> 
			</div>
		@endforeach
	</div>
</div>
@endsection
