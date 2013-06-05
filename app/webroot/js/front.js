$(function(){
      $("#slider").slidesjs({
        width: 1003,
        height: 290
      })
      
      $('.slidesjs-navigation').text('');
      $('.colorbox').colorbox({width:1024, onComplete:function() {$('#cboxClose').html('x');}});
     
     $('.partenaires img').on('click', function() {
        $.colorbox({width:1024, href:$(this).attr('pop'),onComplete:function() {$('#cboxClose').html('x');}});
        $.colorbox.resize();
        
     });
      
  });