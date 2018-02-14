WebFontConfig = {
	google: { families: [ 'Roboto+Condensed::latin' ] }
};
(function() {
	var wf = document.createElement('script');
	wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
	'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
	wf.type = 'text/javascript';
	wf.async = 'true';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(wf, s);
})();


$(window).on('load', function(){
	var $container = $('#ova-container').isotope({
		itemSelector: '.ova',
		layoutMode: 'fitRows'
	});

	$('.navbar > ul > li > a, .navbar > ul > ul > li > a').click(function() {
		var selector = $(this).attr('data-filter');
		$container.isotope({ filter: selector });
	});

	$("#key_search").click(function(){search();});

	$("[name=text_search]").keypress(function(e){
		if(e.which==13){
			search();
		}
	});

	$(".expandable").click(function(event){
		var subme = $(this);
		event.preventDefault();
		console.log(".expandable");
		subme.parent().next().slideToggle("slow");
		subme.children("span").toggleClass("animate");
		$(".expanded > li > a > h1 > .fa").each(function(key, val){
			$(val).remove();
		});
	});

	$(".expanded > li > a").click(function(){
		event.preventDefault();
		console.log(".expanded > li > a Clicked");
		$(".expanded > li > a > h1 > .fa").each(function(key, val){
			$(val).remove();
		});
		$(this).children("h1").append("<i class='fa fa-check-square' aria-hidden='true'></i>");

	});
	$(".navbar li").click(function(){
		console.log(".navbar li Clicked");
		$(".navbar li").removeClass("active");
		$(this).toggleClass("active");
		event.preventDefault();

	});
});