$(document).on('submit', '#delete-form', function(event) {
	return confirm("¿Desea borrar el dato?");
});

$(".select-tag").chosen();

$('.editor').trumbowyg();    