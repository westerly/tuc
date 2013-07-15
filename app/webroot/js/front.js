$(function(){
    $('.navtabs').append('<li class="quebec q-b"></li><li class="quebec q-t"></li>');
    $q = $('li.quebec');
    $active = $('li.active');

    function animateQuebecTo(cible){
        width = cible.width();
        left = 0;
        $.each(cible.prevAll(),function(i){
            left += $(this).width();
        });
        $q.stop().animate(
            {
                left: left+"px", 
                width: width+"px"
            },{ 
                duration: 300,  
                specialEasing: {
                    width: 'easeOutExpo',
                    left: 'easeOutCirc'
                },
            }
        );
    }

    $('ul.navtabs > li:not(.quebec)').on('mouseenter',function(){
        $item = $(this).find('ul.subnav');
        $a = $(this).children('a');
        
        animateQuebecTo($(this));

        if($item.length==1) {
            width = $(this).width();
            $item.css('width',width+"px");
            $item.slideDown(30);
            $('.q-b').css('display','none');
        }
    });
    $('ul.navtabs > li:not(.quebec)').on('mouseleave',function(){
        $item = $(this).find('ul.subnav');
        if($item.length==1) {
            $('.q-b').css('display','block');
            $item.slideUp(30);
        }

        animateQuebecTo($active);
    });

    $('.navpill').mouseleave();

    $(window).resize(function() {
        if($('.navtabs').css('display') == 'none'){
            $('.dk-div').empty().html('<select name="menu" class="dk-change" tabindex="1"> </select>');
            $.each($('.navtabs > li:not(.quebec)'),function(){
                $c = $(this).children('a');
                if($(this).hasClass('navpill'))
                    name = 'Accueil';
                else
                    name = $c.text();
                link = $c.attr('href');
                if($(this).hasClass('active'))
                    $('.dk-change').append('<option data-child="dk_no_child" selected="selected" value="'+link+'">'+name+'</option>');
                else
                    $('.dk-change').append('<option data-child="dk_no_child" value="'+link+'">'+name+'</option>');
                $item = $(this).find('ul.subnav');
                if($item.length==1) {
                    $('.dk-change').append('<optgroup label="'+name+'"></optgroup>');
                    $.each($item.find('li'),function(){
                        $c = $(this).children('a');
                        name = $c.text();
                        link = $c.attr('href');
                        $('.dk-change optgroup:last').append('<option data-child="dk_child" value="'+link+'">'+name+'</option>');
                    });
                }
            });
            $('.dk-div').append('<div class="clear"></div>');
            $('.dk-change').dropkick({
                change: function (value,label) {
                    document.location.href=value;
                  }
            });
        }
    });

    $(window).trigger('resize');

    $("#slider").slidesjs({
        width: 1003,
        height: 630
    })

    $('.slidesjs-navigation').text('');
    $('.colorbox').colorbox({width:1024, onComplete:function() {$('#cboxClose').html('x');}});

    $('.partenaires img').on('click', function() {
    $.colorbox({width:1024, href:$(this).attr('pop'),onComplete:function() {$('#cboxClose').html('x');}});
    $.colorbox.resize();

    });

    $('.prev, .next').click(function() {

    var id_car = $(this).attr('defis_id');
    var imgs = $('#car_'+id_car+' div');
    var dep = 0;
    var vitesse = 500;
    if($(this).attr('item') > 1) {
        if($(this).hasClass('prev')) {
            dep = 236;
            if($(this).parent().find('.next').attr('item') == 1)
                dep = 243;
            $(this).parent().find('.next').attr('item', parseInt($(this).parent().find('.next').attr('item'))+1);
            $(this).parent().find('.prev').attr('item', parseInt($(this).parent().find('.prev').attr('item'))-1);
        }
        else if($(this).hasClass('next')) {
            dep = -236;
            if($(this).parent().find('.prev').attr('item') == 2)
                dep = -243;
            $(this).parent().find('.next').attr('item', parseInt($(this).parent().find('.next').attr('item'))-1);
            $(this).parent().find('.prev').attr('item', parseInt($(this).parent().find('.prev').attr('item'))+1);
       }
    imgs.animate({left: '+='+dep}, vitesse);
    }

    });
      
  });