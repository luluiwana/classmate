$(document).ready(function () {
	$("#daftar_siswa").DataTable();
});
$(document).ready(function () {
	$("#teman").DataTable();
});



//popover
var popoverTriggerList = [].slice.call(
	document.querySelectorAll('[data-bs-toggle="popover"]')
);
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
	return new bootstrap.Popover(popoverTriggerEl);
});
