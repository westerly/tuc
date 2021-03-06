/*!
 * jQuery YouTube Popup Player Plugin v2.3
 * http://lab.abhinayrathore.com/jquery_youtube/
 * Last Updated: Feb 26, 2013
 */
(function(f) {var b=null;var d={init:function(g){g=f.extend({},f.fn.YouTubePopup.defaults,g);if(b==null){b=f("<div>").css({display:"none",padding:0});if(g.cssClass!=""){b.addClass(g.cssClass)}f("body").append(b);b.dialog({autoOpen:false,resizable:false,draggable:g.draggable,modal:g.modal,close:function(){b.html("");f(".ui-dialog-titlebar").show()}})}return this.each(function(){var i=f(this);var h=i.data("YouTube");if(!h){i.data("YouTube",{target:i,active:true});f(i).bind("click.YouTubePopup",function(){var l=g.youtubeId;if(f.trim(l)==""&&i.is("a")){l=c(i.attr("href"))}if(f.trim(l)==""||l===false){l=i.attr(g.idAttribute)}var j=f.trim(g.title);if(j==""){if(g.useYouTubeTitle){a(l)}else{j=i.attr("title")}}var k="http://www.youtube.com/embed/"+l+"?rel=0&showsearch=0&autohide="+g.autohide;k+="&autoplay="+g.autoplay+"&controls="+g.controls+"&fs="+g.fs+"&loop="+g.loop;k+="&showinfo="+g.showinfo+"&color="+g.color+"&theme="+g.theme;b.html(e(k,g.width,g.height));b.dialog({width:"auto",height:"auto"});b.dialog({minWidth:g.width,minHeight:g.height,title:j});b.dialog("open");f(".ui-widget-overlay").fadeTo("fast",g.overlayOpacity);if(g.hideTitleBar&&g.modal){f(".ui-dialog-titlebar").hide();f(".ui-widget-overlay").click(function(){b.dialog("close")})}if(g.clickOutsideClose&&g.modal){f(".ui-widget-overlay").click(function(){b.dialog("close")})}return false})}})},destroy:function(){return this.each(function(){f(this).unbind(".YouTubePopup");f(this).removeData("YouTube")})}};function e(h,j,g){var i='<iframe title="YouTube video player" style="margin:0; padding:0;" width="'+j+'" ';i+='height="'+g+'" src="'+h+'" frameborder="0" allowfullscreen></iframe>';return i}function a(h){var g="https://gdata.youtube.com/feeds/api/videos/"+h+"?v=2&alt=json";f.ajax({url:g,dataType:"jsonp",cache:true,success:function(i){b.dialog({title:i.entry.title.$t})}})}function c(g){var i=/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/;var h=g.match(i);if(h&&h[2].length==11){return h[2]}else{return false}}f.fn.YouTubePopup=function(g){if(d[g]){return d[g].apply(this,Array.prototype.slice.call(arguments,1))}else{if(typeof g==="object"||!g){return d.init.apply(this,arguments)}else{f.error("Method "+g+" does not exist on jQuery.YouTubePopup")}}};f.fn.YouTubePopup.defaults={youtubeId:"",title:"",useYouTubeTitle:true,idAttribute:"rel",cssClass:"",draggable:false,modal:true,width:640,height:480,hideTitleBar:false,clickOutsideClose:false,overlayOpacity:0.5,autohide:2,autoplay:1,color:"red",controls:1,fs:1,loop:0,showinfo:0,theme:"light"}})(jQuery);

$.fn.YouTubePopup.defaults = {
    'youtubeId': '',
    'title': '',
    'useYouTubeTitle': true,
    'idAttribute': 'rel',
    'cssClass': '',
    'draggable': false,
    'modal': true,
    'width': 640,
    'height': 480,
    'hideTitleBar': false,
    'clickOutsideClose': false,
    'overlayOpacity': 0.5,
    'autohide': 2,
    'autoplay': 1,
    'color': 'red',
    'color1': 'FFFFFF',
    'color2': 'FFFFFF',
    'controls': 1,
    'fullscreen': 1,
    'loop': 0,
    'hd': 1,
    'showinfo': 0,
    'theme': 'light'
};

$(function () {
    $("a.youtube").YouTubePopup({ autoplay: 0 });
});