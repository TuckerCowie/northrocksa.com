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

        // Responsive colorbox
        function cbEnable() {
          console.log('CB Enabled');
          $('.nr_video-box').colorbox({
            iframe: true,
            innerWidth: '640',
            innerHeight: '390',
            title: false,
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

        var days, goLive, hours, intervalId, minutes, seconds;

        // Your churchonline.org url
        var churchUrl = "http://northrocksa.churchonline.org";

        goLive = function() {
          $("#churchonline_counter .time").hide();
          $("#churchonline_counter .live").show();
        };
        loadCountdown = function(data){
          var seconds_till;
          $("#churchonline_counter").show();
          if (data.response.item.isLive) {
            return goLive();
          } else {
            // Parse ISO 8601 date string
            date = data.response.item.eventStartTime.match(/^(\d{4})-0?(\d+)-0?(\d+)[T ]0?(\d+):0?(\d+):0?(\d+)Z$/);
            dateString = date[2] + "/" + date[3] + "/" + date[1] + " " + date[4] + ":" + date[5] + ":" + date[6] + " +0000";
            seconds_till = ((new Date(dateString)) - (new Date())) / 1000;
            days = Math.floor(seconds_till / 86400);
            hours = Math.floor((seconds_till % 86400) / 3600);
            minutes = Math.floor((seconds_till % 3600) / 60);
            seconds = Math.floor(seconds_till % 60);
            var intervalId = setInterval(function() {
              if (--seconds < 0) {
                seconds = 59;
                if (--minutes < 0) {
                  minutes = 59;
                  if (--hours < 0) {
                    hours = 23;
                    if (--days < 0) {
                      days = 0;
                    }
                  }
                }
              }
              $("#churchonline_counter .days").html((days.toString().length < 2) ? "0" + days : days);
              $("#churchonline_counter .hours").html((hours.toString().length < 2 ? "0" + hours : hours));
              $("#churchonline_counter .minutes").html((minutes.toString().length < 2 ? "0" + minutes : minutes));
              $("#churchonline_counter .seconds").html((seconds.toString().length < 2 ? "0" + seconds : seconds));
              if (seconds === 0 && minutes === 0 && hours === 0 && days === 0) {
                goLive();
                return clearInterval(intervalId);
              }
            }, 1000);
            return intervalId;
          }
        };
        days = void 0;
        hours = void 0;
        minutes = void 0;
        seconds = void 0;
        intervalId = void 0;
        eventUrl = churchUrl + "/api/v1/events/current";
        msie = /msie/.test(navigator.userAgent.toLowerCase());
        if (msie && window.XDomainRequest) {
          var xdr = new XDomainRequest();
          xdr.open("get", eventUrl);
          xdr.onload = function() {
            loadCountdown($.parseJSON(xdr.responseText));
          };
          xdr.send();
        } else {
          $.ajax({
            url: eventUrl,
            dataType: "json",
            crossDomain: true,
            success: function(data) {
              loadCountdown(data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
              return console.log(thrownError);
            }
          });
        }

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

})(jQuery);
