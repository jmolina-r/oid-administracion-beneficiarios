/*
 *  SliderNav - A Simple Content Slider with a Navigation Bar
 *  Copyright 2010 Monjurul Dolon, http://mdolon.com/
 *  Released under the MIT, BSD, and GPL Licenses.
 *  More information: http://devgrow.com/slidernav
 */

$.fn.sliderNav=function(e){var t={items:["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"],debug:false,height:null,arrows:true,event:"mouseover"};var n=$.extend(t,e);var r=$.meta?$.extend({},n,$$.data()):n;var i=$(this);$(i).addClass("slider");$(".slider-content li:first",i).addClass("selected");$(i).append('<div class="slider-nav"><ul></ul></div>');for(var s in r.items)$(".slider-nav ul",i).append("<li><a alt='#"+r.items[s]+"'>"+r.items[s]+"</a></li>");var o=$(".slider-nav",i).height();if(r.height)o=r.height;$(".slider-content, .slider-nav",i).css("height",o);if(r.debug)$(i).append('<div id="debug">Scroll Offset: <span>0</span></div>');$(".slider-nav a",i).on(n.event,function(e){var t=$(this).attr("alt");var n=$(".slider-content",i).offset().top;var s=$(".slider-content "+t,i).offset().top;var o=$(".slider-nav",i).height();if(r.height)o=r.height;var u=s-n-o/8;$(".slider-content li",i).removeClass("selected");$(t).addClass("selected");$(".slider-content",i).stop().animate({scrollTop:"+="+u+"px"});if(r.debug)$("#debug span",i).html(s)});if(r.arrows){$(".slider-nav",i).css("top","20px");$(i).prepend('<div class="slide-up end"><span class="arrow up"></span></div>');$(i).append('<div class="slide-down"><span class="arrow down"></span></div>');$(".slide-down",i).click(function(){$(".slider-content",i).animate({scrollTop:"+="+o+"px"},500)});$(".slide-up",i).click(function(){$(".slider-content",i).animate({scrollTop:"-="+o+"px"},500)})}}
;
