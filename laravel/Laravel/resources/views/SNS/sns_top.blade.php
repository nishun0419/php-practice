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
							<div class="radio col-md-offset-4">
								<label>
									<input type="radio" name="security" value="public" checked>公開
								</label>
							</div>
							<div class="radio col-md-offset-4">
								<label>
									<input type="radio" name="security" value="private">非公開
								</label>
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
			<div class="col-md-4">
				<div class="panel{{ $val -> security == true ? ' panel-info' : ' panel-primary' }}">
					<div class="panel-heading">
						@if($val -> visit_user != "")
							@foreach($val -> visit_user as $visit)
								@if($visit == Auth::user() -> user_id)
									@php
										$flag = true;
									@endphp
									@break
								@endif
							@endforeach
							@if(!$flag)
								<span class="label label-danger labelNew">New</span>
							@endif
							@php
								$flag = false;
							@endphp
						@else
							<span class="label label-danger labelNew">New</span>
						@endif
						<a href="/SNS/detail?id={{ $val -> id }}" class="{{ $val -> security == true ?
							'titlePublic' : 'titlePrivate' }}">
							{{ mb_strimwidth($val -> title, 0, 36, "...", "UTF-8") }}
						</a>
						<input type="hidden" class="task-id" value="{{ $val -> id }}">
						@if(Auth::user()-> user_id == $val -> user)
							<button type="button" class="close close-task">&times;</button>
						@endif
					</div>
					<div class="panel-body task-List">
						{{ mb_strimwidth($val -> message, 0, 36, "...", "UTF-8") }}
						<p>
						@if($val -> image_url != "")
							@for($i = 0; $i < 3; $i++)
								@empty($val -> image_url[$i])
									@break
								@endempty
								<img src = "{{ url('SNS/image/'. $val -> id. '/'. $val -> image_url[$i]) }}" height="70", width="100">
							@endfor
						@else
							<div class="noImage"></div>
						@endif
						</p>

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
