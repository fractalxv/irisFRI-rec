$(document).ready(function() {
		
	equalHeight($(".item p"));
	$(".home_widgets .widget:first").css("margin-left", "0");
	$(".footernav  li:last").css("border-right", "0");
	$(".navigation .alignleft:empty").hide();
	$(".navigation .alignright:empty").hide();
	$(".comment-nav .alignright:empty").hide();
	$(".comment-nav .alignleft:empty").hide();
	$(".navigation:empty").hide();
	$(".comment-nav:empty").hide();
	$('ul.sf-menu').superfish();
});


function equalHeight(group) {
	tallest = 0;
	group.each(function() {
		thisHeight = $(this).height();
		if(thisHeight > tallest) {
			tallest = thisHeight;
		}
	});
	group.height(tallest);
}