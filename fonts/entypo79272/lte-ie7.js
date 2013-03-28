/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'entypo\'">' + entity + '</span>' + html;
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
			'icon-user' : '&#xe00e;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; i < els.length; i += 1) {
		el = els[i];
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