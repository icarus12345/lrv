<?php $comments = \App\Models\Comment::byTopic($topic_id, $topic_type)->get(); ?>
<div class="comment-box" data-topic-id="{{$topic_id}}" data-topic-type="{{$topic_type}}" >
	<div class="comment-list">
		<h5>{{$comments->count()}} comments</h5>
		@foreach($comments as $comment)
		@include('widget.comment.detail')
		@endforeach
	</div>
	<div class="comment-form">
		<h5>Leave a Reply</h5>
		<form id="comment-form-{{$topic_id}}-{{$topic_type}}" name="comment-form-{{$topic_id}}-{{$topic_type}}" class="needs-validation" novalidate>
			<p>Your email address will not be published. Required fields are marked <span class="required">*</span></p>
			<div class="row mb-n20">
				<div class="col-md-4 col-12 mb-20">
					<label>Name<span class="required">*</span></label>
					<input type="text" name="name" required class="form-control">
					
					<div class="invalid-feedback">
					  Name is required.
					</div>
				</div>
				<div class="col-md-4 col-12 mb-20">
					<label>Email<span class="required">*</span></label>
					<input type="email" name="email" required class="form-control">
					
					<div class="invalid-feedback">
					  Email is required.
					</div>
				</div>
				<!-- <div class="col-md-4 col-12 mb-20">
					<label>Website<span class="required">*</span></label>
					<input type="text">
				</div> -->
				<div class="col-12 mb-20">
					<label>Comment</label>
					<textarea name="message" required class="form-control" rows="3"></textarea>
					<div class="invalid-feedback">
					  Comment is required.
					</div>
				</div>
				<div class="col-12 mb-20">
					<input type="submit" value="Leave a Comment">
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	document.getElementById('comment-form-{{$topic_id}}-{{$topic_type}}').addEventListener('submit', (e)=>{
		if(e.target.checkValidity() === false){
			return false;
		}
		e.preventDefault();
		e.stopPropagation();
		Swal.fire({
			"type": "question",
			"showCancelButton": true,
			"showLoaderOnConfirm": true,
			"confirmButtonText": "Post",
			"cancelButtonText": "Cancel",
			"title": "Are you sure to leave a reply?",
			"text": "",
			"confirmButtonColor": "#a2c147",
			preConfirm: function(input) {
				return new Promise(function(resolve, reject) {
					$.ajax({
						url : "/comment/{{$topic_type}}/{{$topic_id}}/add",
						type : "POST",
						data : {
							name: $(e.target).find('[name="name"]').val(),
							email: $(e.target).find('[name="email"]').val(),
							message: $(e.target).find('[name="message"]').val(),
						},
						success: function (data) {
							resolve(data);
						},
						error:function(request){
							reject(request);
						}
					});
				});
			}
		}).then(function(result) {
			if (typeof result.dismiss !== 'undefined') {
				return Promise.reject();
			}
			
			if (typeof result.status === "boolean") {
				var response = result;
			} else {
				var response = result.value;
			}
			console.log(response)
			if(response.code == 1) {
				//Swal.fire('System Notification', response.message, 'success');
				e.target.reset();
				$(response.comment).insertAfter($('.comment-list>h5'))
			} else {
			  Swal.fire('System Error', response.message, 'error');
			}
		});
	});
</script>