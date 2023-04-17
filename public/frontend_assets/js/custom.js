$(document).ready(function(){
    $('#dropDown').click(function(){
      $('.drop-down').toggleClass('drop-down--active');
    });
  });


$(document).ready(function(){
  //the trigger on hover when cursor directed to this class
    $(".core-menu li").hover(
    function(){
      //i used the parent ul to show submenu
        $(this).children('ul').slideDown('fast');
    }, 
      //when the cursor away 
    function () {
        $('ul', this).slideUp('fast');
    });
  //this feature only show on 600px device width
    $(".hamburger-menu").click(function(){
      $(".burger-1, .burger-2, .burger-3").toggleClass("open");
        $(".core-menu").slideToggle("fast");
    });
});

// ********** //





// ********** //
var btn = $('#ScrollUp');
btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});


AOS.init();
