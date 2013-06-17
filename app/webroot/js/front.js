$(function(){
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
     
     $('nav li').mouseenter(function(event){
         var item = $(this).find('ul');
         if(item) {
             item.show();
         }
         
     });
     
     $('nav li').mouseleave(function(event){
         var item = $(this).find('ul');
         if(item) {
             item.hide();
         }
         
     });
     $('nav li ul').mouseleave(function(event){
         var item = $(this);//.parent('ul');
         if(item) {
             item.hide();
         }
         
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