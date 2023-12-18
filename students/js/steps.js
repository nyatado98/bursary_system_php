$(document).ready(function() {  
var current_fs, next_fs, pre_fs;   
var opacity;  
var current = 1;  
var steps = $("fieldset").length;  
setProgressBar(current);  
$(".next").click(function() {  
current_fs = $(this).parent();  
next_fs = $(this).parent().next();  
$(".progressbar li").eq($("fieldset").index(next_fs)).addClass("active");  
next_fs.show();  
current_fs.animate({opacity: 0}, {  
step: function(now) {  
opacity = 1 - now;  
current_fs.css({  
'display': 'none',  
'position': 'relative'  
});  
next_fs.css({'opacity': opacity});  
},  
duration: 500  
});  
setProgressBar(++current);  
});  
$(".pre").click(function() {  
current_fs = $(this).parent();  
pre_fs = $(this).parent().prev();  
$(".progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");  
pre_fs.show();  
current_fs.animate({opacity: 0}, {  
step: function(now) {  
opacity = 1 - now;  
current_fs.css({  
'display': 'none',  
'position': 'relative'  
});  
pre_fs.css({'opacity': opacity});  
},  
duration: 500  
});  
setProgressBar(--current);  
});  
function setProgressBar(curStep) {  
var percent = parseFloat(100 / steps) * curStep;  
percentpercent = percent.toFixed();  
$(".pbar")  
.css("width",percent+"%")  
}  
$(".submit").click(function() {  
return false;  
})  
});  

