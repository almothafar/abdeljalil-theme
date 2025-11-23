// Search box

$(document).ready(function() 
{

$('.searchbox').click(function() {
  $(this).animate({
   width: '225'
  }, 1000, function() {
  });
});

$('.searchbox').blur(function() {
  $(this).animate({
   width: '75'
  }, 1000, function() {
  });
});


});


// Form

function clear_value(Text) {
     if (Text.value == Text.defaultValue) {
         Text.value = ""
     }
 }

function set_value(Text) {
     if (Text.value == "") {
         Text.value = Text.defaultValue
     }
 }