(function() {
  var fullScreenApi = {
          supportsFullScreen: false,
          isFullScreen: function() { return false; },
          requestFullScreen: function() {},
          cancelFullScreen: function() {},
          fullScreenEventName: '',
          prefix: '',
          kmInFullScreen: false
      },
      browserPrefixes = 'webkit moz o ms khtml'.split(' ');
 
  // check for native support
  if (typeof document.cancelFullScreen != 'undefined') {
    fullScreenApi.supportsFullScreen = true;
  }else if (typeof document.exitFullscreen != 'undefined') {
    fullScreenApi.supportsFullScreen = true;
    fullScreenApi.prefix = 'ms';
  } else {
    // check for fullscreen support by vendor prefix
    for (var i = 0, il = browserPrefixes.length; i < il; i++ ) {
      fullScreenApi.prefix = browserPrefixes[i]; 
      if (typeof document[fullScreenApi.prefix + 'CancelFullScreen' ] != 'undefined' ) {
        fullScreenApi.supportsFullScreen = true;
        break;
      }
      if (typeof document[fullScreenApi.prefix + 'ExitFullscreen' ] != 'undefined' ) {
        fullScreenApi.supportsFullScreen = true;
        break;
      }
    }
  }

  // update methods to do something useful
  if (fullScreenApi.supportsFullScreen) {
    fullScreenApi.fullScreenEventName = fullScreenApi.prefix + 'fullscreenchange';
    fullScreenApi.isFullScreen = function() {
      switch (this.prefix) {
        case 'ms':
          return this.kmInFullScreen;
        case '':
          return document.fullScreen;
        case 'webkit':
          return document.webkitIsFullScreen;
        default:
          return document[this.prefix + 'FullScreen'];
      }
    }
    fullScreenApi.requestFullScreen = function(el) {
      //console.log('Requesting Fullscreen...');
      //console.log(this);
      this.kmInFullScreen = true;
      if(this.prefix == 'ms'){
        return el.msRequestFullscreen();
      }else
        return (this.prefix === '') ? el.requestFullScreen() : el[this.prefix + 'RequestFullScreen']();
    }
    fullScreenApi.cancelFullScreen = function(el) {
      this.kmInFullScreen = false;
      if(this.prefix == 'ms'){
        return document.msExitFullscreen();
      }else
        return (this.prefix === '') ? document.cancelFullScreen() : document[this.prefix + 'CancelFullScreen']();
    }
  }
 
  // jQuery plugin
  if (typeof jQuery != 'undefined') {
    jQuery.fn.requestFullScreen = function() {
      return this.each(function() {
        if (fullScreenApi.supportsFullScreen)
          fullScreenApi.requestFullScreen(this);
      });
    };
  }
 
  // export api
  window.fullScreenApi = fullScreenApi;
})();

function toggleFullScreen(){
  aElement = document.all[0];//.getElementById('frame');
  //console.log(aElement);
  if(fullScreenApi.isFullScreen()){
    fullScreenApi.cancelFullScreen();
  }else
    fullScreenApi.requestFullScreen(aElement);
  return false;
}

function cancelFullScreen(){
  aElement = document.all[0];//.getElementById('frame');
  //console.log(aElement);
  if(fullScreenApi.isFullScreen()){
    fullScreenApi.cancelFullScreen();
  }
  return false;
}