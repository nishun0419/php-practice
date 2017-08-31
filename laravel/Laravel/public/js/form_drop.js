$(function(){
	Dropzone.autoDiscover = false;

	Dropzone.options.dropImage = {
		paramName : "file",
		acceptedFiles: 'image/*',
		maxFilesize: 5
	}
});