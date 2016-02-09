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

  function elementIsShowing(element) {
    return element.offset().top < window.pageYOffset + window.innerHeight && element.offset().top + element.outerHeight() > window.pageYOffset;
  }

  function setParallaxPosition(element, offset) {
    offset = offset || 0;
    var y = (element.offset().top - window.pageYOffset - offset) * 1.1;
    element.css('background-position', '50% ' + y + 'px');
  }

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

        // Paralax elements
        var element = $('.nr_parallax-bg');
        if (element[0]) {
            setParallaxPosition(element, 100);
          $(window).scroll(function() {
            window.requestAnimationFrame(function() {
              if (elementIsShowing(element)) {
                setParallaxPosition(element, 100);
              }
            });
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
