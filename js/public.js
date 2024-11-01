// JavaScript Document
jQuery().ready(function() {
	allembru_simple_social_load();
});
function allembru_simple_social_load() {
	// GOOGLE+ API //
	(function() {var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();
	// FACEBOOK API //
	(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));
	// TWITTER API //
	!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
	// LINKEDIN API //
	(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//platform.linkedin.com/in.js";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'linkedin-jssdk'));	
}
function allembru_simple_social_reload() {
	// GOOGLE+ API //
	gapi.plusone.go();
	// FACEBOOK API //
	FB.XFBML.parse();
	// TWITTER API //
	twttr.widgets.load();
	// LINKEDIN API //
	IN.init();
}