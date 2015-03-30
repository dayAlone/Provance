(function() {
  var delay, end, size;

  this.map = false;

  this.mapInit = function() {
    var cords, map, mapElement, mapOptions;
    mapOptions = {
      zoom: 2,
      scrollwheel: false,
      disableDoubleClickZoom: true,
      mapTypeControl: false,
      streetViewControl: false,
      panControl: false,
      zoomControlOptions: {
        style: google.maps.ZoomControlStyle.LARGE,
        position: google.maps.ControlPosition.LEFT_CENTER
      },
      center: new google.maps.LatLng(46.50443728, 17.93459300),
      styles: [
        {
          "featureType": "all",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#333333"
            }, {
              "gamma": "3"
            }
          ]
        }, {
          "featureType": "all",
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "visibility": "on"
            }, {
              "color": "#ffffff"
            }
          ]
        }, {
          "featureType": "all",
          "elementType": "labels.icon",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        }, {
          "featureType": "administrative",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#fefefe"
            }
          ]
        }, {
          "featureType": "administrative",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#fefefe"
            }, {
              "weight": 1.2
            }, {
              "lightness": "17"
            }
          ]
        }, {
          "featureType": "landscape",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#e1e1e1"
            }, {
              "lightness": "0"
            }, {
              "gamma": "1.0"
            }
          ]
        }, {
          "featureType": "poi",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#f5f5f5"
            }, {
              "lightness": 21
            }
          ]
        }, {
          "featureType": "poi.park",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#c8c8c8"
            }, {
              "lightness": "21"
            }, {
              "gamma": "1"
            }
          ]
        }, {
          "featureType": "road.highway",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#505050"
            }, {
              "lightness": "0"
            }, {
              "gamma": "5"
            }
          ]
        }, {
          "featureType": "road.highway",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#ffffff"
            }, {
              "lightness": 29
            }, {
              "weight": 0.2
            }
          ]
        }, {
          "featureType": "road.arterial",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#ffffff"
            }, {
              "lightness": "10"
            }
          ]
        }, {
          "featureType": "road.local",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#ffffff"
            }, {
              "lightness": 16
            }
          ]
        }, {
          "featureType": "transit",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#f2f2f2"
            }, {
              "lightness": "10"
            }
          ]
        }, {
          "featureType": "transit.line",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#cdcdcd"
            }
          ]
        }, {
          "featureType": "transit.station.rail",
          "elementType": "labels.icon",
          "stylers": [
            {
              "visibility": "on"
            }, {
              "gamma": "2.5"
            }
          ]
        }, {
          "featureType": "water",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "##000000"
            }, {
              "lightness": "0"
            }, {
              "gamma": "4.5"
            }
          ]
        }
      ]
    };
    mapElement = $('.modal__map')[0];
    map = new google.maps.Map(mapElement, mapOptions);
    cords = [new google.maps.LatLng(67.074532, 71.069804), new google.maps.LatLng(65.880861, 73.003398), new google.maps.LatLng(65.372506, 77.222148), new google.maps.LatLng(63.157574, 104.819804), new google.maps.LatLng(59.88725, 110.972148), new google.maps.LatLng(55.865354, 125.561991), new google.maps.LatLng(56.93747, 148.237773), new google.maps.LatLng(58.258556, 151.401835)];
    $.each(cords, function() {
      var marker;
      marker = new google.maps.Marker({
        position: this,
        map: map,
        icon: '/layout/images/flag.png'
      });
      return google.maps.event.addListener(marker, 'click', function() {
        map.setZoom(8);
        return map.setCenter(marker.getPosition());
      });
    });
    map.setCenter(mapOptions['center']);
    return $('#Map').data('loaded', true);
  };

  end = 'transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd';

  delay = function(ms, func) {
    return setTimeout(func, ms);
  };

  size = function() {
    $('.page').height($(window).height());
    if ($('.scroll').length > 0) {
      $('.scroll').perfectScrollbar('update');
    }
    if ($(window).width() / $(window).height() > 16 / 9) {
      return $('.video').height(($(window).width() / 16) * 9);
    } else {
      return $('.video').width(($(window).height() / 9) * 16);
    }
  };

  Array.prototype.remByVal = function(val) {
    var i, _i, _ref;
    for (i = _i = 0, _ref = this.length; 0 <= _ref ? _i < _ref : _i > _ref; i = 0 <= _ref ? ++_i : --_i) {
      if (this[i] === val) {
        this.splice(i, 1);
        i--;
      }
    }
    return this;
  };

  $(document).ready(function() {
    var changeMods, scrollTimer, setMod, x;
    $("body").queryLoader2({
      barColor: "#cbbc9c",
      backgroundColor: "white",
      percentage: true,
      barHeight: 5,
      minimumTime: 200,
      fadeOutTime: 1000
    });
    $('.fotorama').hoverIntent({
      over: function() {
        return $(this).data('fotorama').stopAutoplay();
      },
      out: function() {
        return $(this).data('fotorama').startAutoplay();
      }
    });
    $('#News').on('show.bs.modal', function(a, b) {
      var url;
      url = $(a.relatedTarget).data('url');
      return $('#News .news').load(url);
    });
    delay(300, function() {
      var paths, tl;
      paths = $('#home path:not(defs path)');
      paths.each(function(i, e) {
        e.style.strokeDasharray = e.style.strokeDashoffset = e.getTotalLength();
      });
      tl = new TimelineMax;
      return tl.add([
        TweenLite.to(paths.eq(0), 1, {
          strokeDashoffset: 0,
          delay: 0.0
        }).duration(8), TweenLite.to(paths.eq(1), 1, {
          strokeDashoffset: 0,
          delay: 0.5
        }).duration(8)
      ]);
    });
    $('#Map .country').click(function(e) {
      var block;
      if ($(this).parent().find('ul').length > 0) {
        block = $(this).parent().find('ul');
        if ($(this).parent().hasClass('open')) {
          block.velocity({
            properties: "transition.slideUpOut",
            options: {
              duration: 500,
              complete: function() {
                return $(this).parents('li').removeClass('open');
              }
            }
          });
        } else {
          if ($('#Map .countries li.open ul').length > 0) {
            $('#Map .countries li.open ul').velocity({
              properties: "transition.slideUpOut",
              options: {
                duration: 500,
                complete: function() {
                  $(this).parents('li').removeClass('open');
                  return block.velocity({
                    properties: "transition.slideDownIn",
                    options: {
                      duration: 500,
                      complete: function() {
                        return $(this).parents('li').addClass('open');
                      }
                    }
                  });
                }
              }
            });
          } else {
            block.velocity({
              properties: "transition.slideDownIn",
              options: {
                duration: 500,
                complete: function() {
                  return $(this).parents('li').addClass('open');
                }
              }
            });
          }
        }
      }
      return e.preventDefault();
    });
    $('#Map').on('shown.bs.modal', function(e) {
      return delay(300, function() {
        if (!$('#Map').data('loaded')) {
          return $.getScript('https://maps.googleapis.com/maps/api/js?callback=mapInit');
        }
      });
    });
    $('#News').on('shown.bs.modal', function() {
      return $("#News .carousel").waterwheelCarousel({
        autoPlay: 2000,
        speed: 0
      });
    });
    if ($('.scroll').length > 0) {
      $('.scroll').perfectScrollbar({
        suppressScrollX: true
      });
    }
    $('#enter a').click(function(e) {
      e.preventDefault();
      return $('#enter').velocity({
        properties: "transition.fadeOut",
        options: {
          duration: 300,
          complete: function() {
            return $(this).remove();
          }
        }
      });
    });
    x = void 0;
    $(window).resize(function() {
      clearTimeout(x);
      return x = delay(200, function() {
        return size();
      });
    });
    scrollTimer = false;
    $(window).scroll(function() {
      clearTimeout(scrollTimer);
      if (!$('.scroll-fix').hasMod('on')) {
        $('.scroll-fix').mod('on', true);
      }
      return scrollTimer = delay(300, function() {
        return $('.scroll-fix').mod('on', false);
      });
    });
    setMod = function(el, mod, val, mods, all) {
      el.mod(mod, val);
      return delay(100, function() {
        mods = mods.remByVal(mod);
        all = all.remByVal(mod);
        return changeMods(el, mods, all);
      });
    };
    changeMods = function(el, mods, all) {
      return $.each(all, function(k, mod) {
        if ($.inArray(mod, mods) !== -1) {
          if (!el.hasMod(mod)) {
            setMod(el, mod, true, mods, all);
            return false;
          }
        } else {
          if (el.hasMod(mod)) {
            setMod(el, mod, false, mods, all);
            return false;
          }
        }
      });
    };
    $('.nav > ul > li').hoverIntent({
      over: function() {
        if ($(this).find('ul').length > 0) {
          return $(this).find('ul').velocity({
            properties: "transition.slideDownIn",
            options: {
              duration: 300
            }
          });
        }
      },
      out: function() {
        if ($(this).find('ul').length > 0) {
          return $(this).find('ul').velocity({
            properties: "transition.slideUpOut",
            options: {
              duration: 300
            }
          });
        }
      }
    });
    $('.industies').elem('slider').on('fotorama:ready', function(a) {
      $('.fotorama__arr--prev').html($('.arrow__prev').html());
      return $('.fotorama__arr--next').html($('.arrow__next').html());
    }).on('fotorama:showend', function(a, b, c) {
      $('.industies').elem('nav').find('a').removeClass('active');
      return $("a[href='#" + b.activeFrame.id + "']").addClass('active');
    }).fotorama();
    $('.industies').elem('nav').find('a').click(function(e) {
      $('.industies').elem('slider').data('fotorama').show(parseInt($(this).data('id')) - 1);
      return e.preventDefault();
    });
    $('.public').elem('slider').on('fotorama:ready', function() {
      $('.public').elem('slider').mod('init', true);
      $('.fotorama__arr--prev').html($('.arrow__prev').html());
      return $('.fotorama__arr--next').html($('.arrow__next').html());
    }).on('fotorama:show', function(a, b, c) {
      return $(b.activeFrame.html).find('.public__pack').removeClass('public__pack--active').addClass('public__pack--disable');
    }).on('fotorama:showend', function(a, b, c) {
      $(b.activeFrame.html).find('.public__pack').removeClass('public__pack--disable');
      $('.public').elem('nav').find('a').removeClass('active');
      $("a[href='#" + b.activeFrame.id + "']").addClass('active');
      return $('.public').elem('pack').off('click').on('click', function(e) {
        if (!$(this).hasMod('active')) {
          $(b.activeFrame.html).find('.public__pack').removeClass('public__pack--active');
          $(this).removeClass('public__pack--disable').mod('active', true);
          $(b.activeFrame.html).find('.public__pack:not(.public__pack--active)').addClass('public__pack--disable');
        } else {
          $('.public__pack--active').addClass('end').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function() {
            return $(this).removeClass('public__pack--active').removeClass('end');
          });
          $('.public__pack').removeClass('public__pack--disable');
        }
        return e.preventDefault();
      });
    }).fotorama();
    $('.public').elem('nav').find('a').click(function(e) {
      $('.public').elem('slider').data('fotorama').show(parseInt($(this).data('id')) - 1);
      return e.preventDefault();
    });
    $('a:not([data-toggle="modal"])').click(function(e) {
      var id;
      id = "#" + $(this).attr('href').split('#')[1];
      if ($("" + id).length > 0) {
        if ($("" + id).hasClass('modal')) {
          $("" + id).modal();
        } else {
          $('.slider').moveTo($("" + id).index() + 1);
        }
        return e.preventDefault();
      }
    });
    $('.loader, .enter').on('scroll mousewheel touchstart touchmove DOMMouseScroll MozMousePixelScroll', function(e) {
      e.preventDefault();
      return e.stopPropagation();
    });
    return delay(300, function() {
      var sliderTimer;
      size();
      sliderTimer = false;
      $('.slider').show().onepage_scroll({
        animationTime: 1000,
        pagination: false,
        sectionContainer: "section",
        loop: false,
        afterMove: function(a, e) {
          var block;
          block = $(".slider section:nth-child(" + a + ")");
          $(".slider section video").each(function() {
            return this.pause();
          });
          if (block.find('video').length > 0) {
            block.find('video')[0].play();
          }
          if (history.pushState) {
            return history.pushState(null, null, '#' + block.attr('id'));
          } else {
            return location.hash = block.attr('id');
          }
        },
        beforeMove: function(a, e) {
          var block, mods, nav, navMods;
          nav = $('.nav');
          block = $(".slider section:nth-child(" + a + ")");
          nav.elem('item').mod('active', false);
          nav.find("a[href*='" + (block.attr('id')) + "']").addClass('nav__item--active');
          if (block.data('mods')) {
            mods = block.data('mods').split(', ');
            navMods = ['gold', 'white', 'brown'];
            return changeMods(nav, mods, navMods);
          }
        }
      });
      if (location.hash) {
        if ($("" + location.hash).hasClass('modal')) {
          $("" + location.hash).modal();
        } else {
          $('.slider').moveTo($("" + location.hash).index() + 1);
        }
      }
      $('.scroll').hoverIntent({
        over: function() {
          return $(this).parents('.page').data('fix', true);
        },
        out: function() {
          return $(this).parents('.page').data('fix', false);
        }
      });
      $('#loader').velocity({
        properties: "transition.fadeOut",
        options: {
          duration: 300,
          complete: function() {
            return $(this).remove();
          }
        }
      });
      $('body').addClass('loaded');
      if ($.browser.mobile) {
        return $('body').addClass('mobile');
      }
    });
  });

}).call(this);
