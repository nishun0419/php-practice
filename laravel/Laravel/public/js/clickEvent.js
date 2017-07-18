$('.post-new').click(function(){
	$('#white_back').css('display', 'block');
	$('#postBox').animate({height: '400px'},1000);
});

$('#close-PostBox').click(function(){
	$('#postBox').animate({height: '50px'}, 1000);
		$('#white_back').css('display', 'none');
});

$('.close-task').click(function(){
	console.log('sss');
	var taskId = $(this).prev().val();
	console.log(taskId);
	location.href="/SNS/delete?id=" + taskId;
});

$('#back-Top').click(function(){
	console.log('check');
	location.href="/SNS";
})

