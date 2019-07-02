
//generate random number
/*
	let lastNumber // start with undefined lastNumber

function getRandNumber() {
  var x = Math.floor((Math.random() * 5) + 1); // get new random number

	
  if (x === lastNumber) { // compare with last number
    return getRandNumber() // if they are the same, call the function again to repeat the process
  }
	
	
  return x // if they're not the same, return it
	
}
	
	
function myFunction() {
   const number = getRandNumber()
   lastNumber = number 
   document.getElementById("demo").innerHTML = number;
}

//music select from list

list.onclick = function(e) {
  e.preventDefault();

  var elm = e.target;
  var audio = document.getElementById('audio');

  var source = document.getElementById('audioSource');
  source.src = elm.getAttribute('data-value');

  audio.load(); //call this to just preload the audio without playing
  audio.play(); //call this to play the song right away
};

*/	



/*--------------------------------*/

window.onload = function() {
  document.getElementById('button').onclick = function() {
    document.getElementById('modalOverlay').style.display = 'none'
  };
};

/*FADE SCROLL*/

// Trigger CSS animations on scroll.
// Detailed explanation can be found at http://www.bram.us/2013/11/20/scroll-animations/

// Looking for a version that also reverses the animation when
// elements scroll below the fold again?
// --> Check https://codepen.io/bramus/pen/vKpjNP

jQuery(function($) {
  
  // Function which adds the 'animated' class to any '.animatable' in view
  var doAnimations = function() {
    
    // Calc current offset and get all animatables
    var offset = $(window).scrollTop() + $(window).height(),
        $animatables = $('.animatable');
    
    // Unbind scroll handler if we have no animatables
    if ($animatables.length == 0) {
      $(window).off('scroll', doAnimations);
    }
    
    // Check all animatables and animate them if necessary
		$animatables.each(function(i) {
       var $animatable = $(this);
			if (($animatable.offset().top + $animatable.height() - 20) < offset) {
        $animatable.removeClass('animatable').addClass('animated');
			}
    });

	};
  
  // Hook doAnimations on scroll, and trigger a scroll
	$(window).on('scroll', doAnimations);
  $(window).trigger('scroll');

});

