/*!
 * Social Share Kit v1.0.9 (http://socialsharekit.com)
 * Copyright 2015 Social Share Kit / Kaspars Sprogis.
 * Licensed under Creative Commons Attribution-NonCommercial 3.0 license:
 * https://github.com/darklow/social-share-kit/blob/master/LICENSE
 * ---
 */
;var SocialShareKit=(function(){var s=/(twitter|facebook|google-plus|pinterest|tumblr|vk|linkedin|email)/,o="*|*",j,b;b=function(z){var y=z||{},x=y.selector||".ssk";this.nodes=f(x);this.options=y};b.prototype={share:function(){var z=this.nodes,y=this.options,x={};l(function(){if(!z.length){return}e(z,function(D){var E=q(D),C;if(!E){return}p(D,"click",A);n(D,"click",A);if(D.parentNode.className.indexOf("ssk-count")!==-1){E=E[0];C=E+o+w(y,E,D);if(!(C in x)){x[C]=[]}x[C].push(D)}});B()});function A(I){var H=i(I),D=q(H),F=D[0],C;if(!D){return}C=r(y,F,H);if(!C){return}if(window.twttr&&H.getAttribute("href").indexOf("twitter.com/intent/")!==-1){H.setAttribute("href",C);return}if(F!="email"){var G=h(C);if(y.onOpen){y.onOpen(H,F,C,G)}if(y.onClose){var E=window.setInterval(function(){if(G.closed!==false){window.clearInterval(E);y.onClose(H,F,C,G)}},250)}}else{document.location=C}}function B(){var C,D;for(C in x){D=C.split(o);(function(E){t(D[0],D[1],y,function(F){for(var G in E){g(E[G],F)}})})(x[C])}}return this.nodes}};j=function(x){return new b(x)};function u(x){return j(x).share()}function l(x){if(document.readyState!="loading"){x()}else{if(document.addEventListener){document.addEventListener("DOMContentLoaded",x)}else{document.attachEvent("onreadystatechange",function(){if(document.readyState!="loading"){x()}})}}}function f(x){return document.querySelectorAll(x)}function e(z,y){for(var x=0;x<z.length;x++){y(z[x],x)}}function n(z,x,y){if(z.addEventListener){z.addEventListener(x,y)}else{z.attachEvent("on"+x,function(){y.call(z)})}}function p(z,x,y){if(z.removeEventListener){z.removeEventListener(x,y)}else{z.detachEvent("on"+x,y)}}function q(x){return x.className.match(s)}function i(y){var x=y||window.event;if(x.preventDefault){x.preventDefault()}else{x.returnValue=false;x.cancelBubble=true}return x.currentTarget||x.srcElement}function h(y){var z=575,x=400,D=(document.documentElement.clientWidth/2-z/2),C=(document.documentElement.clientHeight-x)/2,A="status=1,resizable=yes,width="+z+",height="+x+",top="+C+",left="+D,B=window.open(y,"",A);B.focus();return B}function r(H,A,z){var x,y=a(H,A,z),C=w(H,A,z,y),E=typeof y.title!=="undefined"?y.title:k(A),G=typeof y.text!=="undefined"?y.text:d(A),B=y.image?y.image:v("og:image"),F=typeof y.via!=="undefined"?y.via:v("twitter:site"),D={shareUrl:C,title:E,text:G,image:B,via:F,options:H,shareUrlEncoded:function(){return encodeURIComponent(this.shareUrl)}};switch(A){case"facebook":x="https://www.facebook.com/share.php?u="+D.shareUrlEncoded();break;case"twitter":x="https://twitter.com/intent/tweet?url="+D.shareUrlEncoded()+"&text="+encodeURIComponent(E+(G&&E?" - ":"")+G);if(F){x+="&via="+F.replace("@","")}break;case"google-plus":x="https://plus.google.com/share?url="+D.shareUrlEncoded();break;case"pinterest":x="https://pinterest.com/pin/create/button/?url="+D.shareUrlEncoded()+"&description="+encodeURIComponent(G);if(B){x+="&media="+encodeURIComponent(B)}break;case"tumblr":x="https://www.tumblr.com/share/link?url="+D.shareUrlEncoded()+"&name="+encodeURIComponent(E)+"&description="+encodeURIComponent(G);break;case"linkedin":x="https://www.linkedin.com/shareArticle?mini=true&url="+D.shareUrlEncoded()+"&title="+encodeURIComponent(E)+"&summary="+encodeURIComponent(G);break;case"vk":x="https://vkontakte.ru/share.php?url="+D.shareUrlEncoded();break;case"email":x="mailto:?subject="+encodeURIComponent(E)+"&body="+encodeURIComponent(E+"\n"+C+"\n\n"+G+"\n");break}D.networkUrl=x;if(H.onBeforeOpen){H.onBeforeOpen(z,A,D)}return D.networkUrl}function w(y,A,z,x){x=x||a(y,A,z);return x.url||window.location.href}function k(x){var y;if(x=="twitter"){y=v("twitter:title")}return y||document.title}function d(x){var y;if(x=="twitter"){y=v("twitter:description")}return y||v("description")}function v(z,y){var A,x=f("meta["+(y?y:z.indexOf("og:")===0?"property":"name")+'="'+z+'"]');if(x.length){A=x[0].getAttribute("content")||""}return A||""}function a(G,A,z){var y=["url","title","text","image"],x={},E,F,B,C,D=z.parentNode;A=="twitter"&&y.push("via");for(C in y){F=y[C];B="data-"+F;E=z.getAttribute(B)||D.getAttribute(B)||(G[A]&&typeof G[A][F]!="undefined"?G[A][F]:G[F]);if(typeof E!="undefined"){x[F]=E}}return x}function g(y,x){var z=document.createElement("div");z.innerHTML=x;z.className="ssk-num";y.appendChild(z)}function t(C,D,A,E){var z,y,x,B=encodeURIComponent(D);switch(C){case"facebook":z="https://graph.facebook.com/?id="+B;y=function(F){return E(F.shares?F.shares:0)};break;case"twitter":if(A&&A.twitter&&A.twitter.countCallback){A.twitter.countCallback(D,E)}break;case"google-plus":z="https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ";x='[{"method":"pos.plusones.get","id":"p","params":{"id":"'+D+'","userId":"@viewer","groupId":"@self","nolog":true},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]';y=function(F){F=JSON.parse(F);if(F.length){return E(F[0].result.metadata.globalCounts.count)}};m(z,y,x);return;case"linkedin":z="https://www.linkedin.com/countserv/count/share?url="+B;y=function(F){return E(F.count)};break;case"pinterest":z="https://api.pinterest.com/v1/urls/count.json?url="+B;y=function(F){return E(F.count)};break;case"vk":z="https://vk.com/share.php?act=count&url="+B;y=function(F){return E(F)};break}z&&y&&c(C,z,y,x)}function m(y,A,x){var z=new XMLHttpRequest();z.onreadystatechange=function(){if(this.readyState===4){if(this.status>=200&&this.status<400){A(this.responseText)}}};z.open("POST",y,true);z.setRequestHeader("Content-Type","application/json");z.send(x)}function c(z,y,B){var A="cb_"+z+"_"+Math.round(100000*Math.random()),x=document.createElement("script");window[A]=function(C){try{delete window[A]}catch(D){}document.body.removeChild(x);B(C)};if(z=="vk"){window.VK={Share:{count:function(D,C){window[A](C)}}}}else{if(z=="google-plus"){window.services={gplus:{cb:window[A]}}}}x.src=y+(y.indexOf("?")>=0?"&":"?")+"callback="+A;document.body.appendChild(x);return true}return{init:u}})();window.SocialShareKit=SocialShareKit;

/*!
 * Stickyfill -- `position: sticky` polyfill
 * v. 1.1.4 | https://github.com/wilddeer/stickyfill
 * Copyright Oleg Korsunsky | http://wd.dizaina.net/
 *
 * MIT License
 */
(function(doc, win) {
    var watchArray = [],
        scroll,
        initialized = false,
        html = doc.documentElement,
        noop = function() {},
        checkTimer,

        //visibility API strings
        hiddenPropertyName = 'hidden',
        visibilityChangeEventName = 'visibilitychange';

    //fallback to prefixed names in old webkit browsers
    if (doc.webkitHidden !== undefined) {
        hiddenPropertyName = 'webkitHidden';
        visibilityChangeEventName = 'webkitvisibilitychange';
    }

    //test getComputedStyle
    if (!win.getComputedStyle) {
        seppuku();
    }

    //test for native support
    var prefixes = ['', '-webkit-', '-moz-', '-ms-'],
        block = document.createElement('div');

    for (var i = prefixes.length - 1; i >= 0; i--) {
        try {
            block.style.position = prefixes[i] + 'sticky';
        }
        catch(e) {}
        if (block.style.position != '') {
            seppuku();
        }
    }

    updateScrollPos();

    //commit seppuku!
    function seppuku() {
        init = add = rebuild = pause = stop = kill = noop;
    }

    function mergeObjects(targetObj, sourceObject) {
        for (var key in sourceObject) {
            if (sourceObject.hasOwnProperty(key)) {
                targetObj[key] = sourceObject[key];
            }
        }
    }

    function parseNumeric(val) {
        return parseFloat(val) || 0;
    }

    function updateScrollPos() {
        scroll = {
            top: win.pageYOffset,
            left: win.pageXOffset
        };
    }

    function onScroll() {
        if (win.pageXOffset != scroll.left) {
            updateScrollPos();
            rebuild();
            return;
        }
        
        if (win.pageYOffset != scroll.top) {
            updateScrollPos();
            recalcAllPos();
        }
    }

    //fixes flickering
    function onWheel(event) {
        setTimeout(function() {
            if (win.pageYOffset != scroll.top) {
                scroll.top = win.pageYOffset;
                recalcAllPos();
            }
        }, 0);
    }

    function recalcAllPos() {
        for (var i = watchArray.length - 1; i >= 0; i--) {
            recalcElementPos(watchArray[i]);
        }
    }

    function recalcElementPos(el) {
        if (!el.inited) return;

        var currentMode = (scroll.top <= el.limit.start? 0: scroll.top >= el.limit.end? 2: 1);

        if (el.mode != currentMode) {
            switchElementMode(el, currentMode);
        }
    }

    //checks whether stickies start or stop positions have changed
    function fastCheck() {
        for (var i = watchArray.length - 1; i >= 0; i--) {
            if (!watchArray[i].inited) continue;

            var deltaTop = Math.abs(getDocOffsetTop(watchArray[i].clone) - watchArray[i].docOffsetTop),
                deltaHeight = Math.abs(watchArray[i].parent.node.offsetHeight - watchArray[i].parent.height);

            if (deltaTop >= 2 || deltaHeight >= 2) return false;
        }
        return true;
    }

    function initElement(el) {
        if (isNaN(parseFloat(el.computed.top)) || el.isCell || el.computed.display == 'none') return;

        el.inited = true;

        if (!el.clone) clone(el);
        if (el.parent.computed.position != 'absolute' &&
            el.parent.computed.position != 'relative') el.parent.node.style.position = 'relative';

        recalcElementPos(el);

        el.parent.height = el.parent.node.offsetHeight;
        el.docOffsetTop = getDocOffsetTop(el.clone);
    }

    function deinitElement(el) {
        var deinitParent = true;

        el.clone && killClone(el);
        mergeObjects(el.node.style, el.css);

        //check whether element's parent is used by other stickies
        for (var i = watchArray.length - 1; i >= 0; i--) {
            if (watchArray[i].node !== el.node && watchArray[i].parent.node === el.parent.node) {
                deinitParent = false;
                break;
            }
        };

        if (deinitParent) el.parent.node.style.position = el.parent.css.position;
        el.mode = -1;
    }

    function initAll() {
        for (var i = watchArray.length - 1; i >= 0; i--) {
            initElement(watchArray[i]);
        }
    }

    function deinitAll() {
        for (var i = watchArray.length - 1; i >= 0; i--) {
            deinitElement(watchArray[i]);
        }
    }

    function switchElementMode(el, mode) {
        var nodeStyle = el.node.style;

        switch (mode) {
            case 0:
                nodeStyle.position = 'absolute';
                nodeStyle.left = el.offset.left + 'px';
                nodeStyle.right = el.offset.right + 'px';
                nodeStyle.top = el.offset.top + 'px';
                nodeStyle.bottom = 'auto';
                nodeStyle.width = 'auto';
                nodeStyle.marginLeft = 0;
                nodeStyle.marginRight = 0;
                nodeStyle.marginTop = 0;
                break;

            case 1:
                nodeStyle.position = 'fixed';
                nodeStyle.left = el.box.left + 'px';
                nodeStyle.right = el.box.right + 'px';
                nodeStyle.top = el.css.top;
                nodeStyle.bottom = 'auto';
                nodeStyle.width = 'auto';
                nodeStyle.marginLeft = 0;
                nodeStyle.marginRight = 0;
                nodeStyle.marginTop = 0;
                break;

            case 2:
                nodeStyle.position = 'absolute';
                nodeStyle.left = el.offset.left + 'px';
                nodeStyle.right = el.offset.right + 'px';
                nodeStyle.top = 'auto';
                nodeStyle.bottom = 0;
                nodeStyle.width = 'auto';
                nodeStyle.marginLeft = 0;
                nodeStyle.marginRight = 0;
                break;
        }

        el.mode = mode;
    }

    function clone(el) {
        el.clone = document.createElement('div');

        var refElement = el.node.nextSibling || el.node,
            cloneStyle = el.clone.style;

        cloneStyle.height = el.height + 'px';
        cloneStyle.width = el.width + 'px';
        cloneStyle.marginTop = el.computed.marginTop;
        cloneStyle.marginBottom = el.computed.marginBottom;
        cloneStyle.marginLeft = el.computed.marginLeft;
        cloneStyle.marginRight = el.computed.marginRight;
        cloneStyle.padding = cloneStyle.border = cloneStyle.borderSpacing = 0;
        cloneStyle.fontSize = '1em';
        cloneStyle.position = 'static';
        cloneStyle.cssFloat = el.computed.cssFloat;

        el.node.parentNode.insertBefore(el.clone, refElement);
    }

    function killClone(el) {
        el.clone.parentNode.removeChild(el.clone);
        el.clone = undefined;
    }

    function getElementParams(node) {
        var computedStyle = getComputedStyle(node),
            parentNode = node.parentNode,
            parentComputedStyle = getComputedStyle(parentNode),
            cachedPosition = node.style.position;

        node.style.position = 'relative';

        var computed = {
                top: computedStyle.top,
                marginTop: computedStyle.marginTop,
                marginBottom: computedStyle.marginBottom,
                marginLeft: computedStyle.marginLeft,
                marginRight: computedStyle.marginRight,
                cssFloat: computedStyle.cssFloat,
                display: computedStyle.display
            },
            numeric = {
                top: parseNumeric(computedStyle.top),
                marginBottom: parseNumeric(computedStyle.marginBottom),
                paddingLeft: parseNumeric(computedStyle.paddingLeft),
                paddingRight: parseNumeric(computedStyle.paddingRight),
                borderLeftWidth: parseNumeric(computedStyle.borderLeftWidth),
                borderRightWidth: parseNumeric(computedStyle.borderRightWidth)
            };

        node.style.position = cachedPosition;

        var css = {
                position: node.style.position,
                top: node.style.top,
                bottom: node.style.bottom,
                left: node.style.left,
                right: node.style.right,
                width: node.style.width,
                marginTop: node.style.marginTop,
                marginLeft: node.style.marginLeft,
                marginRight: node.style.marginRight
            },
            nodeOffset = getElementOffset(node),
            parentOffset = getElementOffset(parentNode),
            
            parent = {
                node: parentNode,
                css: {
                    position: parentNode.style.position
                },
                computed: {
                    position: parentComputedStyle.position
                },
                numeric: {
                    borderLeftWidth: parseNumeric(parentComputedStyle.borderLeftWidth),
                    borderRightWidth: parseNumeric(parentComputedStyle.borderRightWidth),
                    borderTopWidth: parseNumeric(parentComputedStyle.borderTopWidth),
                    borderBottomWidth: parseNumeric(parentComputedStyle.borderBottomWidth)
                }
            },

            el = {
                node: node,
                box: {
                    left: nodeOffset.win.left,
                    right: html.clientWidth - nodeOffset.win.right
                },
                offset: {
                    top: nodeOffset.win.top - parentOffset.win.top - parent.numeric.borderTopWidth,
                    left: nodeOffset.win.left - parentOffset.win.left - parent.numeric.borderLeftWidth,
                    right: -nodeOffset.win.right + parentOffset.win.right - parent.numeric.borderRightWidth
                },
                css: css,
                isCell: computedStyle.display == 'table-cell',
                computed: computed,
                numeric: numeric,
                width: nodeOffset.win.right - nodeOffset.win.left,
                height: nodeOffset.win.bottom - nodeOffset.win.top,
                mode: -1,
                inited: false,
                parent: parent,
                limit: {
                    start: nodeOffset.doc.top - numeric.top,
                    end: parentOffset.doc.top + parentNode.offsetHeight - parent.numeric.borderBottomWidth -
                        node.offsetHeight - numeric.top - numeric.marginBottom
                }
            };

        return el;
    }

    function getDocOffsetTop(node) {
        var docOffsetTop = 0;

        while (node) {
            docOffsetTop += node.offsetTop;
            node = node.offsetParent;
        }

        return docOffsetTop;
    }

    function getElementOffset(node) {
        var box = node.getBoundingClientRect();

            return {
                doc: {
                    top: box.top + win.pageYOffset,
                    left: box.left + win.pageXOffset
                },
                win: box
            };
    }

    function startFastCheckTimer() {
        checkTimer = setInterval(function() {
            !fastCheck() && rebuild();
        }, 500);
    }

    function stopFastCheckTimer() {
        clearInterval(checkTimer);
    }

    function handlePageVisibilityChange() {
        if (!initialized) return;

        if (document[hiddenPropertyName]) {
            stopFastCheckTimer();
        }
        else {
            startFastCheckTimer();
        }
    }

    function init() {
        if (initialized) return;

        updateScrollPos();
        initAll();

        win.addEventListener('scroll', onScroll);
        win.addEventListener('wheel', onWheel);

        //watch for width changes
        win.addEventListener('resize', rebuild);
        win.addEventListener('orientationchange', rebuild);

        //watch for page visibility
        doc.addEventListener(visibilityChangeEventName, handlePageVisibilityChange);

        startFastCheckTimer();

        initialized = true;
    }

    function rebuild() {
        if (!initialized) return;

        deinitAll();
        
        for (var i = watchArray.length - 1; i >= 0; i--) {
            watchArray[i] = getElementParams(watchArray[i].node);
        }
        
        initAll();
    }

    function pause() {
        win.removeEventListener('scroll', onScroll);
        win.removeEventListener('wheel', onWheel);
        win.removeEventListener('resize', rebuild);
        win.removeEventListener('orientationchange', rebuild);
        doc.removeEventListener(visibilityChangeEventName, handlePageVisibilityChange);

        stopFastCheckTimer();

        initialized = false;
    }

    function stop() {
        pause();
        deinitAll(); 
    }

    function kill() {
        stop();

        //empty the array without loosing the references,
        //the most performant method according to http://jsperf.com/empty-javascript-array
        while (watchArray.length) {
            watchArray.pop();
        }
    }

    function add(node) {
        //check if Stickyfill is already applied to the node
        for (var i = watchArray.length - 1; i >= 0; i--) {
            if (watchArray[i].node === node) return;
        };

        var el = getElementParams(node);

        watchArray.push(el);

        if (!initialized) {
            init();
        }
        else {
            initElement(el);
        }
    }

    function remove(node) {
        for (var i = watchArray.length - 1; i >= 0; i--) {
            if (watchArray[i].node === node) {
                deinitElement(watchArray[i]);
                watchArray.splice(i, 1);
            }
        };
    }

    //expose Stickyfill
    win.Stickyfill = {
        stickies: watchArray,
        add: add,
        remove: remove,
        init: init,
        rebuild: rebuild,
        pause: pause,
        stop: stop,
        kill: kill
    };
})(document, window);


//if jQuery is available -- create a plugin
if (window.jQuery) {
    (function($) {
        $.fn.Stickyfill = function(options) {
            this.each(function() {
                Stickyfill.add(this);
            });

            return this;
        };
    })(window.jQuery);
}

'use strict';

(function () {
  (function ($) {
    var src, text, url;
    console.log("single.coffee loaded");
    src = $(location).attr('href');
    text = $('blockquote.twitter-me p').text();
    url = 'https://twitter.com/intent/tweet?url=' + src + '&text=' + encodeURIComponent(text) + '&via=skepticliberty';
    console.log(text);
    $('blockquote.twitter-me').wrapInner("<a target='_new' href='" + url + "' class='ssk-twitter'></a>");
    $('.sticky').Stickyfill();
    SocialShareKit.init();
    return true;
  })(jQuery);
}).call(undefined);
//# sourceMappingURL=single.js.map
