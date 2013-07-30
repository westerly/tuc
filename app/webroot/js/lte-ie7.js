/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-home' : '&#xe000;',
			'icon-pencil' : '&#xe001;',
			'icon-paint-format' : '&#xe002;',
			'icon-image' : '&#xe003;',
			'icon-camera' : '&#xe004;',
			'icon-play' : '&#xe005;',
			'icon-tags' : '&#xe006;',
			'icon-phone' : '&#xe007;',
			'icon-notebook' : '&#xe008;',
			'icon-envelop' : '&#xe009;',
			'icon-location' : '&#xe00a;',
			'icon-clock' : '&#xe00b;',
			'icon-calendar' : '&#xe00c;',
			'icon-box-add' : '&#xe00d;',
			'icon-user' : '&#xe00e;',
			'icon-user-2' : '&#xe00f;',
			'icon-link' : '&#xe010;',
			'icon-thumbs-up' : '&#xe011;',
			'icon-thumbs-up-2' : '&#xe012;',
			'icon-checkmark' : '&#xe013;',
			'icon-close' : '&#xe014;',
			'icon-safari' : '&#xe015;',
			'icon-opera' : '&#xe016;',
			'icon-IE' : '&#xe017;',
			'icon-firefox' : '&#xe018;',
			'icon-chrome' : '&#xe019;',
			'icon-html5' : '&#xe01a;',
			'icon-file-pdf' : '&#xe01b;',
			'icon-libreoffice' : '&#xe01c;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};