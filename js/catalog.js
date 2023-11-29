$(document).ready(function() {
	switchGrid();
});

$(window).resize(function() {
	if ($(window).width() < 768) {
		$(".product-item").removeAttr("style");
	}
});

$(".js-switch-grid").on("click", function() {
	switchGrid();
});

function switchGrid() {
	if ($(window).width() > 768) {
		$(".product-item").each(function() {
			var size = 1 + Math.floor(Math.random() * 3);
			$(this).css({
				"grid-column": "span " + size,
				"grid-row": "span " + size
			});
		});
	}
}

$(function() {
    //caches a jQuery object containing the header element
    var buttonRow = $(".button-row");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 500) {
            buttonRow.addClass("sticky");
        } else {
            buttonRow.removeClass("sticky");
        }
    });
});