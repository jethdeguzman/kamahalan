if (window['pfDebug'] || !window['priFri']) {

var pfProtocol = document.location.protocol.split(':')[0];
var pfCdnDomain = pfProtocol == 'https' ? 'https://d1xyn5x24gwwys.cloudfront.net': 'http://cdn.printnicer.com';
var pfDomain = pfProtocol + '://www.printfriendly.com';
var pdfDomain = pfProtocol + '://pdf.printfriendly.com';
var pfEmailDomain = pfProtocol + '://email-srv.printfriendly.com';
var pfLogDomain = pfProtocol + '://log.printfriendly.com';
var start = new Date().getTime();
var pfEnv = 'production', pfhref  = '', pfShowModal = false, pfLaunchBrowser = false;

if(window.pfDebug) {
  pfCdnDomain = 'http://cdn-local.printfriendly.com:3000';
  pfDomain = 'http://local.printfriendly.com:3000';
  pfEmailDomain = 'http://local.printfriendly.com:3000';
  pdfDomain = 'http://pdf-local.printfriendly.com:3000';
  pfEnv = 'development';
  if(pfProtocol == 'https') {
    pfCdnDomain = pfDomain = pfEmailDomain = pdfDomain = 'https://local.printfriendly.com';
  }
}

var Pfbrowser = {
  Version: function() {
    var version = 999; // we assume a sane browser
    if (navigator.appVersion.indexOf("MSIE") != -1)
      version = parseFloat(navigator.appVersion.split("MSIE")[1]);
    return version;
  }
};

var priFri = {
  jquerySrc: pfProtocol + '://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js?x=' + (Math.random()),
  readabilitySrc: pfCdnDomain + '/javascripts/v3/algo.js?x=' + (Math.random()) ,
  coreJsSrc: pfCdnDomain + '/javascripts/v3/core.js?x=' + (Math.random()) ,
  pageCssSrc: pfCdnDomain + '/stylesheets/v3/printfriendly.css?x=' + (Math.random()) ,
  pdfSrc: pdfDomain + '/pdfs',
  pdfSrcDirect: pdfDomain + '/pdfs?direct=true',
  emailSrc: pfEmailDomain + '/email/new',
  bodyCache: null,
  deletedNodes: [],
  deletedNodesCss: [],
  iDoc: null,
  height: 400,
  removeads: false,
  removeImages: false,
  domainCssSrc: null,
  domainJsSrc: null,
  dir: 'ltr',
  isIE: (Pfbrowser.Version() < 999),
  printId: null,
  specialDomain: false,
  originalBody: null,
  originalHead: null,
  host: null,
  domain: null,
  iframeHeight: 0,

  userSettings: {
    headerImageUrl: window['pfHeaderImgUrl'],
    headerTagline: window['pfHeaderTagline'],
    imageDisplayStyle: window['pfImageDisplayStyle'],
    customCSSURL: window['pfCustomCSS'],
    disableClickToDel: window['pfdisableClickToDel'],
    disablePDF: window['pfDisablePDF'],
    disablePrint: window['pfDisablePrint'],
    disableEmail: window['pfDisableEmail'],
    hideImages: window['pfHideImages']
  },

  setPrintSrc: function(domain) {
    priFri.domainCssSrc =  pfCdnDomain + '/stylesheets/v3/custom/' + domain + '.css?x=' + (Math.random());
    priFri.domainJsSrc = pfCdnDomain + '/javascripts/v3/custom/' + domain + '.js?x=' + (Math.random());
  },

  // more or less stolen form jquery core and adapted by paul irish
  getScript: function(url,doc, success){
    var script=doc.createElement('script');
    script.src=url;
    var head=doc.getElementsByTagName('head')[0],
        done=false;
    // Attach handlers for all browsers
    script.onload=script.onreadystatechange = function(){
      if ( !done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete') ) {
        done=true;
        success();
        script.onload = script.onreadystatechange = null;
        //head.removeChild(script);
      }
    };
    head.appendChild(script);
  },

  refresh: function() {
    try{
      document.body.innerHTML = '<div style="position:absolute; top:0; bottom:0; left:0; right:0; padding:10%; text-align:center; background:#333;"><a href="'+  window.top.location.href +'" style="color:#7a8999; text-decoration:none; font-size:16px; font-family:\'lucida grande\', \'arial\', sans-serif; ">Please click here if you are not redirected.</a></div>';
      window.top.location.href = window.top.location.href.replace("pfstyle=wp",'').replace(/#(.*)$/,'');
    } catch(err) {
      setTimeout(function(){top.location.replace(window.top.location.href.replace("pfstyle=wp",'').replace(/#(.*)$/,''));},100);
    }
  },

  redirect: function() {
    top.location.replace(pfDomain + '/print/?' + priFri.constructURIComponentString());
  },

  showModal: function() {
    var html = '<div style="position:absolute;top:0;left:0;text-align:center;height: 100%; width: 100%; background-color: rgba(0, 0, 0, .8); z-index: 2147483627"><div style="background:#f7f7f7; padding:44px; width:450px; margin: 10% auto; border: 4px solid #1f1f1f;"><div style="font-family: arial; font-size:22px; font-weight: bold; color:#104040;padding-bottom:14px;margin-bottom:28px; border-bottom:2px dashed #DDDDDD;">Print Friendly Update</div><div style="color:#104040;font-size: 16px;font-family: arial, sans-serif; margin:14px 0;">We\'ve made improvements. This will only take a minute.</div><a href="http://www.printfriendly.com/browser_tool_upgrade" style="text-decoration:underline;"><span style="font-size: 22px;font-weight: ;font-family: arial, sans-serif; color:#1122CC;">Click here to update Print Friendly</span></a></div>';
    document.body.innerHTML = document.body.innerHTML + html;
  },

  isRedirectNecessary: function() {
    var redirect = false;
    try {
      if( (navigator.userAgent.match(/(iphone|ipad|ipod)/i)) || ($ && $.jcarousel && priFri.isIE) ) {
        redirect = true;
      }
      return redirect;
    } catch(e) { return false;}
  },

  convertRelativetoAbsolute: function(elements, type) {
    for(var i = 0; i < elements.length; i++) {
      var el = elements[i];
      if(type == 'img')
        el.src = el.src;
      else
        el.href = el.href;
    }
  },

  constructURIComponentString: function(variables) {
    var components = ['redirect=1', 'url=' + encodeURIComponent(top.location.href)];
    for(var config in priFri.userSettings) {
      if(typeof priFri.userSettings[config] !== 'undefined') components.push(config + '=' + encodeURIComponent(priFri.userSettings[config]));
    }
    return components.join('&');
  }
};

function pfinit() {
  var domain, iframe, maskiframe, div;
  domain = document.domain;
  if(priFri.isRedirectNecessary()) {
    priFri.redirect();
    return;
  }
  priFri.convertRelativetoAbsolute(document.getElementsByTagName('img'), 'img');
  priFri.convertRelativetoAbsolute(document.getElementsByTagName('a'), 'link');
  priFri.bodyCache = document.body.innerHTML;
  // Blank the document. Fixes some issues with IE
  if(priFri.isIE) {document.body.innerHTML = '<p></p>';}

  div = document.createElement('div');
  div.innerHTML = '<div id="pf-mask" style="z-index: 2147483627; position: fixed; top: 0pt; left: 0pt; background-color: rgb(0, 0, 0); opacity: 0.8;filter:progid:DXImageTransform.Microsoft.Alpha(opacity=80); height: 100%; width: 100%;"></div>';
  if(priFri.isIE) {
      maskiframe = createIframe('pf-mask-iframe');
      maskiframe.style.position = 'fixed';
      maskiframe.style.top = '-100px';
      maskiframe.style.left = '-100px';
      maskiframe.style.height = '2500px';
      maskiframe.style.width = '2500px';
      initializeAndAttach(maskiframe, function() {
            return ['<body style="margin: 0; padding: 0; overflow: hidden">' + div.innerHTML + '</body>'].join('');
          });
  } else {
      document.body.appendChild(div.firstChild);
  }
  iframe = createIframe('pf-init-iframe');
  initializeAndAttach(iframe, function() {
    return ['<body onload="var d=document; ', "var _page_css=document.createElement('link');_page_css.rel='stylesheet';_page_css.type='text/css';_page_css.media='screen';","_page_css.href='" + priFri.pageCssSrc + "';", "var h = d.getElementsByTagName('head')[0];h.appendChild(_page_css);h.appendChild(d.createElement('script')).src='" + priFri.coreJsSrc + "';", '"', '', ' data-domain="', domain, '"></body>'].join('');
  });
}

function initializeAndAttach(iframe, generateContentCallback) {
  var domainSrc, domain;
  domain = document.domain;
  document.body.appendChild(iframe);
  try {
    iframe.contentWindow.document.open();
  } catch (error) {
    domainSrc = "javascript:var d=document.open();d.domain='" + domain + "';";
    iframe.src = domainSrc + "void(0);";
  }

  try {
    var d = iframe.contentWindow.document;
    d.write(generateContentCallback());
    d.close();
  } catch (error) {
    iframe.src = domainSrc + 'd.write("' + generateContentCallback().replace(/"/g, '\\"') + '");d.close();';
  }
}

function createIframe(name) {
  var iframe = document.createElement('iframe');
  iframe.style.width = '100%';
  iframe.style.height = '100%';
  iframe.style.display = 'block';
  iframe.frameBorder = '0';
  iframe.style.overflow = 'hidden';
  iframe.className = name;
  iframe.allowTransparency = 'true';
  iframe.name = name;
  iframe.id = name;

  return iframe;
}

function onDOMLoad(callback) {
  if(window.pfOnloadAttached) return;
  if (/complete|loaded/.test(document.readyState)) {
    callback();
    return;
  }
  var onReady, onComplete, done, ie_interval,
  d = window.document;
  // For awesome browsers
  if (window.addEventListener) {
      onComplete = function () {
          window.removeEventListener('DOMContentLoaded', onComplete, false);
          window.removeEventListener('load', onComplete, false);
          if (!done) {
              done = true;
              callback();
          }
      };
      window.addEventListener('DOMContentLoaded', onComplete, false);
      window.addEventListener('load', onComplete, false);
  } else {
      if (window.attachEvent) {
          onComplete = function () {
              window.detachEvent('onreadystatechange', onReady);
              window.detachEvent('onload', onComplete);
              if (!done) {
                  done = true;
                  callback();
              }
          };
          onReady = function () {
              if (d.readyState === 'complete') {
                  onComplete();
              }
          };
          // You can only scroll when the document is ready - ugly hack
          doScrollCheck(onComplete);
          window.attachEvent('onreadystatechange', onReady);
          window.attachEvent('onload', onComplete);
      }
  }
  window.pfOnloadAttached = true;
}

function doScrollCheck(fn) {
  try {
    // If IE is used, use the trick by Diego Perini
    // http://javascript.nwbox.com/IEContentLoaded/
    document.documentElement.doScroll("left");
  } catch(e) {
    setTimeout( function() {doScrollCheck(fn);}, 20 );
    return;
  }
  fn();
}

// required: shim for FF <= 3.5 not having document.readyState
if (document.readyState === null && document.addEventListener) {
    document.readyState = "loading";
    document.addEventListener("DOMContentLoaded", handler = function () {
        document.removeEventListener("DOMContentLoaded", handler, false);
        document.readyState = "complete";
    }, false);
}

if(window.name != 'pfiframe') {
    window.print = function() {
        var timestamp = new Date().getTime();
        // prevent quick consecutive calls since they cause trouble
        if(window.lastCall && (timestamp - window.lastCall < 5000)) {
            return;
        }
        window.lastCall = timestamp;
        onDOMLoad(pfinit);
    };
}

try {pfhref = top.location.href;} catch(e) {pfhref = window.location.href;}
try { pfLaunchBrowser = navigator.appVersion.indexOf("MSIE") != -1 || navigator.userAgent.indexOf('Chrome') != -1  } catch(e) {}
if(typeof pfBkVersion == 'undefined' && typeof pfstyle != 'undefined' && pfLaunchBrowser ) { if (pfstyle == 'nbk' || pfstyle == 'bk') { pfShowModal = true; } }
if(pfShowModal) { priFri.showModal(); } else if (typeof pfstyle != "undefined" || pfhref.indexOf('pfstyle=wp') != -1) { window.print(); }
}
