const modal_img_full = document.getElementById('modal_img_full');
const link_modal_img_full = document.querySelectorAll('link_modal_img_full');

modal_img_full.addEventListener('shown.bs.modal', () => {
	link_modal_img_full.focus();
});