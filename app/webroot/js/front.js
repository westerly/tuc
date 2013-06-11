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
      
  });