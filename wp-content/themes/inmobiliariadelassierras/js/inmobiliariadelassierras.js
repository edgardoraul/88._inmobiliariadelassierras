function activacionScripts() {
	const modalProduct = document.getElementById('modal-product');
	const myInput = document.getElementById('myInput');

	modalProduct.addEventListener('figure-img img-thumbnail rounded', () => {
	  myInput.focus();
	});
}
document.addEventListener("DOMContentLoaded", activacionScripts, false);