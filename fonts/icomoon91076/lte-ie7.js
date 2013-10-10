/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-search' : '&#xe000;',
			'icon-facebook' : '&#xe002;',
			'icon-twitter' : '&#xe001;',
			'icon-export' : '&#xe003;',
			'icon-house' : '&#xe004;',
			'icon-list' : '&#xe005;',
			'icon-arrow-left' : '&#xe006;',
			'icon-arrow-down' : '&#xe007;',
			'icon-arrow-up' : '&#xe008;',
			'icon-arrow-right' : '&#xe009;',
			'icon-pinterest' : '&#xe00a;',
			'icon-googleplus' : '&#xe00b;',
			'icon-rss' : '&#xe00c;',
			'icon-reply' : '&#xe00d;',
			'icon-user' : '&#xe00e;',
			'icon-map' : '&#xe00f;',
			'icon-cycle' : '&#xe010;',
			'icon-reload' : '&#xe011;',
			'icon-location' : '&#xe012;',
			'icon-equalizer' : '&#xe013;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, c, el;
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