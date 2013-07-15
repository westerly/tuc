$(document).ready(function() {

    var carousel_html = "";

	function scrollTo(cible) {
	    if ($(cible).length >= 1) {
	        hauteur = $(cible).offset().top - ($(window).height() - $(cible).height()) / 2;
	    } else {
	        return false;
	    }
	    $('html,body').animate({
	        scrollTop: hauteur
	    }, 1000);
	    return false;
	}

    $('#myCarousel').delegate('.carousel-video','click',function (event){
        var id = $(this).data().id;
        carousel_html = $('#myCarousel').html();
        $('#myCarousel').slideUp(600).empty().delay(200)
        .html('<iframe src="http://player.vimeo.com/video/'+id+'" width="1080" height="560" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe><div style="margin-top:20px;"><button id="carousel-back" class="bouton">Revenir au carousel</button></div>')
        .slideDown(600);
    });

    $('#myCarousel').delegate('#carousel-back','click',function (event){
        $('#myCarousel').slideUp(600).empty().delay(200)
        .html(carousel_html)
        .slideDown(600);
    });

    $(".alert").delay(1500).slideUp(400);

	$('body').delegate("a[href^=#]","click",function (event) {
		event.preventDefault();
		scrollTo($(this).attr('href'));
	});
	
    $('#comments').delegate(".reply","click",function (event) {
        event.preventDefault();
        var a = $(this);
        console.log(a);
        var id = a.attr('id').replace('reply', '');
        var form = $('#commentForm');
        var comment = a.parents('.comment');
        if (comment.hasClass('hasChildren')) {
            comment.next('.answers').append(form);
        } else if (comment.hasClass('child')) {
            comment.parents('.answers').append(form);
        } else {
            comment.after(form);
        }
        scrollTo(form);
        form.hide().slideDown();
        $('#CommentParentId').val(id)
    });

     $('article.partenaire, article.reference').mouseover(function (event) {
        var article = $(this);
        article.addClass('active').removeClass('inactive').siblings().removeClass('active').addClass('inactive');
        $(this).parent().bind('mouseleave', function (event) {
            $(this).find('article').removeClass('inactive').removeClass('active');
        });
    });

});
