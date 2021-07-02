const toggler = document.querySelector('.main-nav button');
const menu = document.querySelector('.main-nav .menu');

function toggleMenu() {
	const open = JSON.parse(toggler.getAttribute('aria-expanded'));
	toggler.setAttribute('aria-expanded', !open);
	menu.hidden = !menu.hidden;
}

function closeMenu(event) {
	if(event.keyCode==27){
		toggler.focus();
		toggleMenu();
	}
}

function initMenu() {
	if (window.matchMedia('(max-width: 40.999em)').matches) {
		menu.setAttribute('hidden', '');
		toggler.addEventListener('click', toggleMenu);
		menu.addEventListener('keydown', closeMenu);
	} else {
		menu.removeAttribute('hidden');
		toggler.removeEventListener('click', toggleMenu)
		menu.removeEventListener('keydown', closeMenu);
	}
}

initMenu();

window.addEventListener('resize', initMenu);