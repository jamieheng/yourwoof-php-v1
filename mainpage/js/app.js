$(document).ready(function(){

   $('.food-slider').slick({
      autoplay:true,
     slidesToShow:3,
     slidesToScroll:1,
     prevArrow:".prev-btn",
     nextArrow:".next-btn",
     responsive:[
        {
           breakpoint:992,
           settings:{
            slidesToShow:2,
           }
        },
        {
         breakpoint:768,
         settings:{
          slidesToShow:1,
         }
      }
     ]

   });

   $('.nav-trigger').click(function(){
      $('.site-content-wrapper').toggleClass('scaled');
   })

   
   $('.btn-interest').click(function(){
      alert('yes')
   })

});

// showmore
function myFunction() {
   var dots = document.getElementById("dots");
   var moreText = document.getElementById("more");
   var btnText = document.getElementById("myBtn");

   if (dots.style.display === "none") {
       dots.style.display = "inline";
       btnText.innerHTML = "Read more";
       moreText.style.display = "none";
   } else {
       dots.style.display = "none";
       btnText.innerHTML = "Read less";
       moreText.style.display = "inline";
   }
}