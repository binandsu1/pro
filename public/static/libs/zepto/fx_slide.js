(function($) {
    $.fn.slideDown = function(duration, callback) {
      let position = this.css('position');
      this.show();
      this.css({
        position: 'absolute',
        visibility: 'hidden'
      });
      let height = this.css('height');
      this.css({
        position: position,
        visibility: 'visible',
        overflow: 'hidden',
        height: 0
      });
      this.animate({ height: height }, duration, function() {
        // that.removeAttr('style');
        if (typeof callback === 'function') callback();
      });
    };
  
    $.fn.slideUp = function(duration, callback) {
      var that = this;
      var height = this.css('height');
      this.css({
        overflow: 'hidden',
        height: height
      });
      this.animate({ height: 0 }, duration, 'linear', function() {
        that.removeAttr('style');
        if (typeof callback === 'function') callback();
      });
    };
})(Zepto);