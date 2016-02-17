/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        
        // Remove clickable dropdowns
        $('.dropdown').hover(function() {
            $(this).addClass('open');
          },
          function() {
            $(this).removeClass('open');
        });

        // Capture scrollTimer for multiple contexts
        var scrollTimer = null;
        // Query for parallax elements
        var elements = $('.nr_parallax-bg');

        // Sanity check
        if (elements) {
          // Gets called way too much
          $(window).scroll(function () {
            if (!scrollTimer) {
              // Should be more than 60 so that there isn't ever more than one computation per frame (60fps)
              // Higher is more efficient, although close to 100ms and above is clearly visible to user
              scrollTimer = setTimeout(parallax, 61, elements, 0.05, 0);
            }
            // Didn't exectute because it was too soon, or a computation is in progress
          });
        }

        /** 
         * Efficiently adjusts the 'background-position' css of items in an array of DOM elements which are 
         * currently within the bounds of the viewport to create a parallax effect.
         *
         * @arg {array} elements - jQuery array of DOM elements
         * @arg {number} speed - float that controls the parallax position computation multiplier
         * @arg {number} offset - number of pixels to offset the parallax position from the top
         *
         */
        function parallax(elements, speed, offset) {
          // Clear timer to enqueue new execution on next scroll
          scrollTimer = null;
          elements.each(function() {
            // Cache variables
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var windowTop = window.pageYOffset;
            var windowBottom =  windowTop + window.innerHeight;
            // Avoid computations if element isn't in viewport
            if (elementTop < windowBottom && elementBottom > windowTop) {
              // Calculate new background position
              var parallaxPosition = ((windowBottom - elementTop) * speed * -1) + offset;
              var element = $(this);
              // If this frame has too much overhead or if it is too late to update, wait for next frame
              requestAnimationFrame(function() {
                // Avoid huge fractions to alleviate rerenders by browser
                element.css('background-position', '50% ' + parallaxPosition.toFixed() + 'px');
              });
            }
          });
        }

        // Responsive colorbox
        function cbEnable() {  
          console.log('CB Enabled');
          $('.nr_video-box').colorbox({
            iframe: true,
            innerWidth: '640',
            innerHeight: '390'
          });
        }

        function cbDisable() {  
          console.log('CB Disabled');
          $('.nr_video-box').each(function() {
            $this = $(this);
            $this.attr('target', '_blank');
            $this.colorbox.remove();
          });
        }

        $.mediaquery({
          minWidth: [ 768 ],
          maxWidth: [ 767 ]
        });

        $(window).on('mqchange.mediaquery', function(e, data) {
          if (data.maxWidth === 767) {
            cbDisable();
          }
          if (data.minWidth === 768) {
            cbEnable();
          }   
        });

        $(window).trigger('mqchange.mediaquery', $.mediaquery("state"));

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');

    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
