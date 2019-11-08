<div class="single-reply">
	<div class="comment-author">
		<img src="/images/default-avatar.png" alt="">
	</div>
	<div class="comment-info">
		<div class="comment-author-info">
			<a href="#"><b>{{$comment->name}}</b></a>
			
			<span>{{ \Carbon\Carbon::parse($comment->created_at)->format('M, d Y \a\t h:i A') }}</span>
			<!--<a href="#">Reply</a>-->
		</div>
		<p class="word-wrap">{{$comment->message}}</p>
	</div>
</div>