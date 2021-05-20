// version 0.08
// v0.01    initial
// v0.02    added video tracking for video[data-omnitext]
// v0.03    added old WapoPlayer tracking for .powa-video, skipping first play/pause events
// v0.04    added setTimeout endless loop for video tracking, as some videos are loaded dynamically
// v0.05    removed getArticleData variable
// v0.06    fixed ie errors
// v0.07    added dynamic event attachment to data-gtm elements
// v0.08    added sending direct tracking value if #wpbs has data-directtracking="true"
// v0.081   window.dataLayer init
// v0.082   check if #wpbs exists

(function () {
    var gtmtracking;
    var publishdate;
    var pagename;
    var ogData = {};
    // document.querySelectorAll('meta[property*="og:"]').forEach(function (el) {
    //     ogData[el.getAttribute('property')] = el.content;
    // });

    for (let index = 0; index < document.querySelectorAll('meta[property*="og:"]').length; index++) {
        const element = document.querySelectorAll('meta[property*="og:"]')[index];
        ogData[element.getAttribute('property')] = element.content;
    }


    var url = document.querySelector('meta[property="og:url"]').content.split('/');
    pagename=url.pop();
    if (!pagename) pagename=url.pop();
    var client=url.pop();
    gtmtracking='brand-studio-'+client+'-'+pagename;
    publishdate= document.querySelector('meta[property*="time"]').content.split('T')[0];

    var wpbs=document.querySelector('#wpbs');
    var isDirectValue=(wpbs && wpbs.hasAttribute('data-directtracking'));

    window.gaPageVars = {
        title: window.title,
        publishdate: publishdate,
        og: ogData,
        videoCount:0,
        pagename: pagename,
        gtmtracking: gtmtracking,
        isDirectValue: isDirectValue
    };

    window.Gtm = {
        gtmBasePathSet: function (basePath) {
            if (!basePath) { return; }

            basePath = basePath.replace(/^[\/]+|[\/]+$/g, ''); // trims "/"
            window.GtmPath = basePath.replace(/\//g, '-');

        },
        getUrlParameter: function (url, parameter) {
            parameter = parameter.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?|&]' + parameter.toLowerCase() + '=([^&#]*)');
            var results = regex.exec('?' + url.toLowerCase().split('?')[1]);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        },


        sendStats: function (value) {
            var convertedValue = value.replace(/\//g, '-');
            window.dataLayer = window.dataLayer || [];

            if (window.gaPageVars.isDirectValue) {
                console.log(convertedValue);                
                window.dataLayer.push({ 'event': 'onpage-click', 'category': 'onpage', 'action': 'onpage-click-event', 'label': convertedValue });
            } else {
                console.log(window.GtmPath+'-'+ convertedValue);
                window.dataLayer.push({ 'event': 'onpage-click', 'category': 'onpage', 'action': 'onpage-click-event', 'label': window.GtmPath + '-' + convertedValue });
            }
        },

        sendStatsVideo: function (avName, event, category, action, label,avPlayer) {
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push(
                {
                    'avName': avName,
                    'avCMS':'brand-studio-custom-execution',
                    'avSection':'brand-studio',
                    'avSource':'the-washington-post',
                    'avPlayer':avPlayer,
                    'event': event,
                    'category': category,
                    'action': action,
                    'label': label
                });

        },

        sendStatsMulti: function (event, category, action, label) {
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ 'event': event, 'category': category, 'action': action, 'label': label });
        },

        getGtmData: function (eventObj) {
            return eventObj.currentTarget.dataset['gtm'];
        },


        activate: function (elements) {
            // document.querySelectorAll('[data-gtm]').forEach(function (el) {
            //     el.addEventListener("click", function (eventObj) {
            //         window.Gtm.sendStats(window.Gtm.getGtmData(eventObj));
            //     }, false);
            // });

            for (let index = 0; index < elements.length; index++) {
                const element = elements[index];
                element.addEventListener("click", function (eventObj) {
                    window.Gtm.sendStats(window.Gtm.getGtmData(eventObj));
                }, false);
            }
        }
    }


    window.dataLayer = window.dataLayer || [];

    console.log('classicPageView/'+window.dataLayer.length);

    window.dataLayer.push({
        'event': 'classicPageView',
        'itid': window.Gtm.getUrlParameter(location.search, 'itid'),
        'pageName': window.gaPageVars.pagename,
        'section': 'brand-studio',
        'contentType': 'brand-studio',
        'cms': 'wordpress',
        'publishDate': window.gaPageVars.publishdate,
        'userAgent': navigator.userAgent,
        'pageViewType': 'load',
        'platformType': 'wordpress',
        'authorName': 'WP BrandStudio',
        'authorId': 'wpbrandstudio'
    });
    window.Gtm.gtmBasePathSet(window.gaPageVars.gtmtracking);
})();

window.addEventListener('load', function () {
    (function () {


        var sanitizeFunction = function (astring) { return astring.replace(/'/g, '').replace(/[\/]/g, '-').replace(/ /g, '-').replace(/[\u2018\u2019Ã„Â‚Ã‚Â„Ä‚Ë˜Ã‚Â€Ã‚ÂšÃ„Â‚Ã‚Â‹Ä‚Â‹Ã‚ÂœÃ„Â‚Ã‚ÂƒÄ‚Â‚Ã‹Â˜Ã„Â‚Ã‚Â‚Ä‚Ë˜Ã‚Â€Ã‚ÂšÃ„Â‚Ã‚Â…Ä‚Â‚Ä¹Ä„Ã„Â‚Ã‚Â„Ä‚Â‚Ä¹Ä„Ã„Â‚Ã‚Â‚Ä‚Ë˜Ã‚Â€Ã‚ÂœÃ„Â‚Ã‚Â„Ä‚Ë˜Ã‚Â€Ã‚ÂšÃ„Â‚Ã‚Â‹Ä‚Â‹Ã‚ÂœÃ„Â‚Ã‚ÂƒÄ‚Â‚Ã‹Â˜Ã„Â‚Ã‚Â‚Ä‚Ë˜Ã‚Â€Ã‚ÂšÃ„Â‚Ã‚Â…Ä‚Â‚Ä¹Ä„Ã„Â‚Ã‚ÂƒÄ‚Ë˜Ã‚Â€Ã‚ÂšÃ„Â‚Ã‚Â‚Ä‚Â‚Ã‚ÂÃ„Â‚Ã‚Â„Ä‚Ë˜Ã‚Â€Ã‚ÂšÃ„Â‚Ã‚Â‹Ä‚Â‹Ã‚ÂœÃ„Â‚Ã‚ÂƒÄ‚Â‚Ã‹Â˜Ã„Â‚Ã‚Â‚Ä‚Ë˜Ã‚Â€Ã‚ÂšÃ„Â‚Ã‚Â…Ä‚Â‚Ä¹Ä„Ã„Â‚Ã‚ÂƒÄ‚Ë˜Ã‚Â€Ä¹Ä„Ã„Â‚Ã‚Â‚Ã„Å¡Ã‚Â“Ã„Â‚Ã‚Â„Ä‚Ë˜Ã‚Â€Ã‚ÂšÃ„Â‚Ã‚Â‹Ä‚Â‹Ã‚ÂœÃ„Â‚Ã‚ÂƒÄ‚Â‚Ã‹Â˜Ã„Â‚Ã‚Â‚Ä‚Ë˜Ã‚Â€Ã‚ÂšÃ„Â‚Ã‚Â…Ä‚Â‚Ä¹Ä„Ã„Â‚Ã‚ÂƒÄ‚Â‚Ã‹Â˜Ã„Â‚Ã‚Â‚Ä‚Ë˜Ã‚Â€Ã‚ÂžÃ„Â‚Ã‚Â‹Ä‚Â‹Ã‚Âœ]/g, '').toLowerCase() };

        // document.querySelectorAll('[data-omni]').forEach(function (el) {
        //     if (el.dataset.hasOwnProperty('omni') && !el.dataset.hasOwnProperty('gtm')) {
        //         el.setAttribute('data-gtm', sanitizeFunction(el.dataset['omni']));
        //     } else if (!el.dataset.hasOwnProperty('gtm')) {
        //         el.setAttribute('data-gtm', sanitizeFunction(el.innerText));
        //     }
        // });

        for (let index = 0; index < document.querySelectorAll('[data-omni]').length; index++) {
            const el = document.querySelectorAll('[data-omni]')[index];
            if (el.dataset.hasOwnProperty('omni') && !el.dataset.hasOwnProperty('gtm')) {
                el.setAttribute('data-gtm', sanitizeFunction(el.dataset['omni']));
            } else if (!el.dataset.hasOwnProperty('gtm')) {
                el.setAttribute('data-gtm', sanitizeFunction(el.innerText));
            }
        }

        // Attach videos

        var wrapVideo = function (el) {


            window.gaPageVars.videoCount++;

            var videoVars = {};
            videoVars.isWapo = el.classList.contains('powa-video');

            videoVars.play = el.parentNode.querySelector(":scope > .js-play");
            videoVars.pause = el.querySelector(":scope > .js-pause");
            videoVars.screenPause = el.querySelector(":scope > .js-screen-pause");
            videoVars.volume = el.querySelector(":scope > .js-volume");
            videoVars.volumeBtn = el.querySelector(":scope > .js-volume-btn");
            videoVars.timer = el.querySelector(":scope > .js-timer");
            videoVars.progress = el.querySelector(":scope > .js-progress");
            videoVars.progressbar = el.querySelector(":scope > .js-progressbar");
            videoVars.volumebar = el.querySelector(":scope > .js-volumebar");
            videoVars.volumeWrapper = el.querySelector(":scope > .js-volume-wrapper");
            videoVars.volumeDot = el.querySelector(":scope > .js-volume-dot");
            videoVars.fullscreen = el.querySelector(":scope > .js-fullscreen");
            videoVars.wrapper = el.querySelector(":scope > .js-video-wrapper");
            videoVars.cc = el.querySelector(":scope > .js-cc");
            videoVars.trackbox = el.querySelector(":scope > .js-tracks");
            videoVars.spots = el.querySelector(":scope > .js-video-spots");
            videoVars.hotspots = el.querySelector(":scope > .js-video-hotspots");
            videoVars.loader = el.querySelector(":scope > .js-video-loader");
            videoVars.avName = el.parentNode.dataset["name"] ? el.parentNode.dataset["name"] : window.gaPageVars.pagename;
            videoVars.avPlayer = 'brand-studio-custom-player';

            if (window.gaPageVars.videoCount>1)
                videoVars.avName+=' no.'+window.gaPageVars.videoCount;

            videoVars.category = "video";
            videoVars.label = "autoplay-embed";
            el.dataset["wasmuted"]='true';
            el.dataset["everplayed"]='false';

            if (videoVars.isWapo)
            {
                el.dataset["skipFirstPlay"]='true';
                el.dataset["skipFirstPause"]='true';
                videoVars.avPlayer = 'brand-studio-wapo-player';
            }


            if (videoVars.play)
            {
                videoVars.play.addEventListener("click", function (eventObj) {
                 if (el.dataset["everplayed"]=="false")
                 {
                    el.dataset["videostartsent"]="false";
                    el.dataset["waspaused"]="false";
                    videoVars.label='click-embed';
                 }
                }, false);
            }

            document.addEventListener("fullscreenchange", function () {
                var event = document.fullscreenElement ? "video-expand" : "video-collapse";
                Gtm.sendStatsVideo(
                    videoVars.avName,
                    event,
                    videoVars.category,
                    event,
                    videoVars.label,
                    videoVars.avPlayer
                );
            });

            el.addEventListener('volumechange', function (event) {

                if (el.muted) {
                    if (el.dataset["wasmuted"]=='false')
                    Gtm.sendStatsVideo(
                        videoVars.avName,
                        "video-mute",
                        videoVars.category,
                        "video-mute",
                        videoVars.label,
                        videoVars.avPlayer
                    );
                    el.dataset["wasmuted"] = 'true';
                }
                else //if (el.dataset["wasmuted"] && el.dataset["wasmuted"] == 'true')
                {
                    if (el.dataset["wasmuted"]=='true')
                    Gtm.sendStatsVideo(
                        videoVars.avName,
                        "video-unmute",
                        videoVars.category,
                        "video-unmute",
                        videoVars.label,
                        videoVars.avPlayer
                    );
                    el.dataset["wasmuted"] = 'false';
                }
            });

            el.addEventListener('play', function (event) {
                var event = '';

                if (el.dataset["skipFirstPlay"]=='true')
                {
                    el.dataset["skipFirstPlay"]='false';
                    return;
                }

                if (el.dataset["waspaused"]=='true')
                {
                    event = "video-unpause";
                } else {
                    event = "video-start";
                    el.dataset["videostartsent"]="true";
                }
                el.dataset["waspaused"]='false';

                Gtm.sendStatsVideo(
                    videoVars.avName,
                    event,
                    videoVars.category,
                    event,
                    videoVars.label,
                    videoVars.avPlayer
                );
            });

            el.addEventListener('pause', function (event) {

                if (el.dataset["skipFirstPause"]=='true')
                {
                    el.dataset["skipFirstPause"]='false';
                    return;
                }


                var event = 'video-pause';
                if (el.currentTime!=el.duration)
                {

                Gtm.sendStatsVideo(
                    videoVars.avName,
                    event,
                    videoVars.category,
                    event,
                    videoVars.label,
                    videoVars.avPlayer
                );
                el.dataset["waspaused"]='true';
                }
            });


            el.addEventListener('timeupdate', function (event) {

                var progress =
                    Math.floor(el.currentTime) /
                    Math.floor(el.duration);
                var step = Math.floor(
                    (el.currentTime / el.duration) * 100
                );

                var event = '';

                if (step>0) el.dataset["everplayed"]="true";

                if (step >0 && el.dataset.videostartsent!=="true")
                {
                    window.Gtm.sendStatsVideo(
                        videoVars.avName,
                        "video-start",
                        videoVars.category,
                        "video-start",
                        videoVars.label,
                        videoVars.avPlayer
                    );

                    el.dataset["videostartsent"]="true";

                }

                if (step >= 25 && !el.dataset.step25) {
                    event = "video-25-complete";
                    el.dataset.step25 = 'true';
                }

                if (step >= 50 && !el.dataset.step50) {
                    event = "video-50-complete";
                    el.dataset.step50 = 'true';
                }

                if (step >= 75 && !el.dataset.step75) {
                    event = "video-75-complete";
                    el.dataset.step75 = true;
                };

                if (step >= 100 && !el.dataset.step100) {
                    event = "video-complete";
                    el.dataset.step100 = true;
                    el.dataset["videostartsent"]="false";
                    el.dataset["waspaused"]="false";
                };

                if (event!='')
                window.Gtm.sendStatsVideo(
                    videoVars.avName,
                    event,
                    videoVars.category,
                    event,
                    videoVars.label,
                    videoVars.avPlayer
                );

                if (step>=100) videoVars.label='click-embed';

            });


        }

        function wrapVideoTry()
        {
            // document.querySelectorAll('.js-player-custom,video[data-omnitext],.powa-video').forEach(function (el) {
            //     if (!el.dataset.trackingsetup) {
            //         wrapVideo(el);
            //         el.dataset.trackingsetup = 'complete';
            //     }
            // });
            for (let index = 0; index < document.querySelectorAll('.js-player-custom,video[data-omnitext],.powa-video').length; index++) {
                const el = document.querySelectorAll('.js-player-custom,video[data-omnitext],.powa-video')[index];
                if (!el.dataset.trackingsetup) {
                    wrapVideo(el);
                    el.dataset.trackingsetup = 'complete';
                }
            }
            setTimeout(wrapVideoTry,1000);
        }

        wrapVideoTry();


        if (!!window.google_tag_manager) {
              // Google Tag Manager has already been loaded
            window.Gtm.activate(document.querySelectorAll('[data-gtm]'));
        } else {
              window.addEventListener('gtm_loaded', function() {
                // Google Tag Manager has been loaded
                window.Gtm.activate(document.querySelectorAll('[data-gtm]'));
              });
        }


    })()
});

!function(a){"use strict";function b(a,c){if(!(this instanceof b)){var d=new b(a,c);return d.open(),d}this.id=b.id++,this.setup(a,c),this.chainCallbacks(b._callbackChain)}if("undefined"==typeof a)return void("console"in window&&window.console.info("Too much lightness, Featherlight needs jQuery."));var c=[],d=function(b){return c=a.grep(c,function(a){return a!==b&&a.$instance.closest("body").length>0})},e=function(a,b){var c={},d=new RegExp("^"+b+"([A-Z])(.*)");for(var e in a){var f=e.match(d);if(f){var g=(f[1]+f[2].replace(/([A-Z])/g,"-$1")).toLowerCase();c[g]=a[e]}}return c},f={keyup:"onKeyUp",resize:"onResize"},g=function(c){a.each(b.opened().reverse(),function(){return c.isDefaultPrevented()||!1!==this[f[c.type]](c)?void 0:(c.preventDefault(),c.stopPropagation(),!1)})},h=function(c){if(c!==b._globalHandlerInstalled){b._globalHandlerInstalled=c;var d=a.map(f,function(a,c){return c+"."+b.prototype.namespace}).join(" ");a(window)[c?"on":"off"](d,g)}};b.prototype={constructor:b,namespace:"featherlight",targetAttr:"data-featherlight",variant:null,resetCss:!1,background:null,openTrigger:"click",closeTrigger:"click",filter:null,root:"body",openSpeed:250,closeSpeed:250,closeOnClick:"background",closeOnEsc:!0,closeIcon:"&#10005;",loading:"",persist:!1,otherClose:null,beforeOpen:a.noop,beforeContent:a.noop,beforeClose:a.noop,afterOpen:a.noop,afterContent:a.noop,afterClose:a.noop,onKeyUp:a.noop,onResize:a.noop,type:null,contentFilters:["jquery","image","html","ajax","iframe","text"],setup:function(b,c){"object"!=typeof b||b instanceof a!=!1||c||(c=b,b=void 0);var d=a.extend(this,c,{target:b}),e=d.resetCss?d.namespace+"-reset":d.namespace,f=a(d.background||['<div class="'+e+"-loading "+e+'">','<div class="'+e+'-content">','<span class="'+e+"-close-icon "+d.namespace+'-close">',d.closeIcon,"</span>",'<div class="'+d.namespace+'-inner">'+d.loading+"</div>","</div>","</div>"].join("")),g="."+d.namespace+"-close"+(d.otherClose?","+d.otherClose:"");return d.$instance=f.clone().addClass(d.variant),d.$instance.on(d.closeTrigger+"."+d.namespace,function(b){var c=a(b.target);("background"===d.closeOnClick&&c.is("."+d.namespace)||"anywhere"===d.closeOnClick||c.closest(g).length)&&(d.close(b),b.preventDefault())}),this},getContent:function(){if(this.persist!==!1&&this.$content)return this.$content;var b=this,c=this.constructor.contentFilters,d=function(a){return b.$currentTarget&&b.$currentTarget.attr(a)},e=d(b.targetAttr),f=b.target||e||"",g=c[b.type];if(!g&&f in c&&(g=c[f],f=b.target&&e),f=f||d("href")||"",!g)for(var h in c)b[h]&&(g=c[h],f=b[h]);if(!g){var i=f;if(f=null,a.each(b.contentFilters,function(){return g=c[this],g.test&&(f=g.test(i)),!f&&g.regex&&i.match&&i.match(g.regex)&&(f=i),!f}),!f)return"console"in window&&window.console.error("Featherlight: no content filter found "+(i?' for "'+i+'"':" (no target specified)")),!1}return g.process.call(b,f)},setContent:function(b){var c=this;return(b.is("iframe")||a("iframe",b).length>0)&&c.$instance.addClass(c.namespace+"-iframe"),c.$instance.removeClass(c.namespace+"-loading"),c.$instance.find("."+c.namespace+"-inner").not(b).slice(1).remove().end().replaceWith(a.contains(c.$instance[0],b[0])?"":b),c.$content=b.addClass(c.namespace+"-inner"),c},open:function(b){var d=this;if(d.$instance.hide().appendTo(d.root),!(b&&b.isDefaultPrevented()||d.beforeOpen(b)===!1)){b&&b.preventDefault();var e=d.getContent();if(e)return c.push(d),h(!0),d.$instance.fadeIn(d.openSpeed),d.beforeContent(b),a.when(e).always(function(a){d.setContent(a),d.afterContent(b)}).then(d.$instance.promise()).done(function(){d.afterOpen(b)})}return d.$instance.detach(),a.Deferred().reject().promise()},close:function(b){var c=this,e=a.Deferred();return c.beforeClose(b)===!1?e.reject():(0===d(c).length&&h(!1),c.$instance.fadeOut(c.closeSpeed,function(){c.$instance.detach(),c.afterClose(b),e.resolve()})),e.promise()},resize:function(a,b){if(a&&b){this.$content.css("width","").css("height","");var c=Math.max(a/(parseInt(this.$content.parent().css("width"),10)-1),b/(parseInt(this.$content.parent().css("height"),10)-1));c>1&&(c=b/Math.floor(b/c),this.$content.css("width",""+a/c+"px").css("height",""+b/c+"px"))}},chainCallbacks:function(b){for(var c in b)this[c]=a.proxy(b[c],this,a.proxy(this[c],this))}},a.extend(b,{id:0,autoBind:"[data-featherlight]",defaults:b.prototype,contentFilters:{jquery:{regex:/^[#.]\w/,test:function(b){return b instanceof a&&b},process:function(b){return this.persist!==!1?a(b):a(b).clone(!0)}},image:{regex:/\.(png|jpg|jpeg|gif|tiff|bmp|svg)(\?\S*)?$/i,process:function(b){var c=this,d=a.Deferred(),e=new Image,f=a('<img src="'+b+'" alt="" class="'+c.namespace+'-image" />');return e.onload=function(){f.naturalWidth=e.width,f.naturalHeight=e.height,d.resolve(f)},e.onerror=function(){d.reject(f)},e.src=b,d.promise()}},html:{regex:/^\s*<[\w!][^<]*>/,process:function(b){return a(b)}},ajax:{regex:/./,process:function(b){var c=a.Deferred(),d=a("<div></div>").load(b,function(a,b){"error"!==b&&c.resolve(d.contents()),c.fail()});return c.promise()}},iframe:{process:function(b){var c=new a.Deferred,d=a("<iframe/>").hide().attr("src",b).css(e(this,"iframe")).on("load",function(){c.resolve(d.show())}).appendTo(this.$instance.find("."+this.namespace+"-content"));return c.promise()}},text:{process:function(b){return a("<div>",{text:b})}}},functionAttributes:["beforeOpen","afterOpen","beforeContent","afterContent","beforeClose","afterClose"],readElementConfig:function(b,c){var d=this,e=new RegExp("^data-"+c+"-(.*)"),f={};return b&&b.attributes&&a.each(b.attributes,function(){var b=this.name.match(e);if(b){var c=this.value,g=a.camelCase(b[1]);if(a.inArray(g,d.functionAttributes)>=0)c=new Function(c);else try{c=a.parseJSON(c)}catch(h){}f[g]=c}}),f},extend:function(b,c){var d=function(){this.constructor=b};return d.prototype=this.prototype,b.prototype=new d,b.__super__=this.prototype,a.extend(b,this,c),b.defaults=b.prototype,b},attach:function(b,c,d){var e=this;"object"!=typeof c||c instanceof a!=!1||d||(d=c,c=void 0),d=a.extend({},d);var f,g=d.namespace||e.defaults.namespace,h=a.extend({},e.defaults,e.readElementConfig(b[0],g),d);return b.on(h.openTrigger+"."+h.namespace,h.filter,function(g){var i=a.extend({$source:b,$currentTarget:a(this)},e.readElementConfig(b[0],h.namespace),e.readElementConfig(this,h.namespace),d),j=f||a(this).data("featherlight-persisted")||new e(c,i);"shared"===j.persist?f=j:j.persist!==!1&&a(this).data("featherlight-persisted",j),i.$currentTarget.blur(),j.open(g)}),b},current:function(){var a=this.opened();return a[a.length-1]||null},opened:function(){var b=this;return d(),a.grep(c,function(a){return a instanceof b})},close:function(a){var b=this.current();return b?b.close(a):void 0},_onReady:function(){var b=this;b.autoBind&&(a(b.autoBind).each(function(){b.attach(a(this))}),a(document).on("click",b.autoBind,function(c){c.isDefaultPrevented()||"featherlight"===c.namespace||(c.preventDefault(),b.attach(a(c.currentTarget)),a(c.target).trigger("click.featherlight"))}))},_callbackChain:{onKeyUp:function(b,c){return 27===c.keyCode?(this.closeOnEsc&&a.featherlight.close(c),!1):b(c)},onResize:function(a,b){return this.resize(this.$content.naturalWidth,this.$content.naturalHeight),a(b)},afterContent:function(a,b){var c=a(b);return this.onResize(b),c}}}),a.featherlight=b,a.fn.featherlight=function(a,c){return b.attach(this,a,c)},a(document).ready(function(){b._onReady()})}(jQuery);

var Natgeo = Natgeo || {  
	isMobile: false,  
    isFixed:false,
    isKeyShown:false,
    currentEra: 0,
    articleArr:[],
    offset: $('.bc-nav').height() + $('.sponsor-bar').height()
}

Natgeo.Article = function() {
	var that = this;
	var nas = [
		'hinckley/newsclip', 'reagan-sweeps/newsclip', 'former-beatle/newsclip',
		'not-guilty/newsclip', 'hearing-adjourned/newsclip', 'reagan-bids/newsclip',
		'alzheimers/newsclip', 'reagan-dies/newsclip', 'nancy/newsclip', 'hinckley-move/newsclip'
	];

	this.init = function() {
		if (Natgeo.checkDate('10/10/2016') && !Natgeo.checkDate('10/15/2016')) {
			$('#foot h3').html('Movie Event Sunday 8/7c');
			$('.video-container').html('<div class="posttv-video-embed wpv-player" data-uuid="c1ce8eb6-8b43-11e6-8cdc-4fbb1973b506" data-object-id="57f57244e4b036ab3495b142" data-youtube-id="BWgQDDQ5uJs" data-is-truth-teller="0" data-max-width="0" data-max-height="0" data-show-endscreen="0" data-show-promo="http://s3.amazonaws.com/posttv-thumbnails-prod/10-05-2016/t_1475703339776_name_screenshot2.jpg" data-headline="Killing Reagan Sunday" data-duration="30080" data-category-id="sponsoredvideo" data-aspect-ratio="0.5625" data-video-360="0" data-variants="0" data-emoji="0" data-show-caption="0"><script type="text/javascript" src="//js.washingtonpost.com/video/resources/env/WapoVideo/dist/WapoVideoEmbed.min.js"></script></div>');
		} else if (Natgeo.checkDate('10/15/2016', true)) {
			$('#foot h3').html('Movie Event Tomorrow 8/7c');
			$('.video-container').html('<div class="posttv-video-embed wpv-player" data-uuid="02543620-8b44-11e6-8cdc-4fbb1973b506" data-object-id="57f572aee4b036ab3495b1ec" data-youtube-id="m0MigDqLffE" data-is-truth-teller="0" data-max-width="0" data-max-height="0" data-show-endscreen="0" data-show-promo="http://s3.amazonaws.com/posttv-thumbnails-prod/10-05-2016/t_1475703437245_name_screenshot2.jpg" data-headline="Killing Reagan Tomorrow" data-duration="30080" data-category-id="sponsoredvideo" data-aspect-ratio="0.5625" data-video-360="0" data-variants="0" data-emoji="0" data-show-caption="0"><script type="text/javascript" src="//js.washingtonpost.com/video/resources/env/WapoVideo/dist/WapoVideoEmbed.min.js"></script></div>');
		} else if (Natgeo.checkDate('10/16/2016', true)) {
			$('#foot h3').html('Movie Event Tonight 8/7c');
			$('.video-container').html('<div class="posttv-video-embed wpv-player" data-uuid="75014b22-8b44-11e6-8cdc-4fbb1973b506" data-object-id="57f57371e4b036ab3495b346" data-youtube-id="DtoAvyLjV7o" data-is-truth-teller="0" data-max-width="0" data-max-height="0" data-show-endscreen="0" data-show-promo="http://s3.amazonaws.com/posttv-thumbnails-prod/10-05-2016/t_1475703623794_name_screenshot2.jpg" data-headline="Killing Reagan Tonight" data-duration="30080" data-category-id="sponsoredvideo" data-aspect-ratio="0.5625" data-video-360="0" data-variants="0" data-emoji="0" data-show-caption="0"><script type="text/javascript" src="//js.washingtonpost.com/video/resources/env/WapoVideo/dist/WapoVideoEmbed.min.js"></script></div>');
		} else {
			$('#foot h3').html('Movie Event Sunday Oct 16 8/7c');
			$('.video-container').html('<div class="posttv-video-embed wpv-player" data-uuid="bab40e86-7c6f-11e6-8064-c1ddc8a724bb" data-object-id="57dc91a2e4b0fb838dc9d8c4" data-youtube-id="" data-is-truth-teller="0" data-max-width="0" data-max-height="0" data-show-endscreen="0" data-show-promo="http://s3.amazonaws.com/posttv-thumbnails-prod/09-17-2016/t_1474072947623_name_screenshot2.jpg" data-headline="Killing Reagan" data-duration="31000" data-category-id="sponsoredvideo" data-aspect-ratio="0.5625" data-video-360="0" data-variants="0" data-show-caption="0"><script type="text/javascript" src="//js.washingtonpost.com/video/resources/env/WapoVideo/dist/WapoVideoEmbed.min.js"></script></div>');
		}

		$(window).on('scroll', function() {
			window.requestAnimationFrame(that.scrollHandler);
		});

		$('.indicator ul li').on('click', function() {
			Natgeo.tracking.sendDataToOmniture('brand-connect/nat-geo/Reagan/' + $(this).text());

			$('html, body').animate({
				scrollTop: $('.era' + $(this).text()).offset().top - Natgeo.offset - 60
			}, 1000);
		});

		var clickable = $("article.clipping, article.skinny-clipping", "#wpbs section.timeline");

        clickable.on('click',function() {
        	var targetUrl = $("img", this).attr("src").split('/');
            	targetUrl = targetUrl[targetUrl.length-1].replace('.png', "_newspaper.jpg");
            var baseClippingURL = 'https://www.washingtonpost.com/wp-stat/ad/public/static/brandconnect/natgeo-killing-reagan/newspaper-images/'

                        Natgeo.tracking.sendDataToOmniture('brand-connect/nat-geo/reagan/' + nas[clickable.index(this)]);

            $.featherlight(baseClippingURL + targetUrl, {
            	variant: 'natgeo'
            });
        });

		var speed = 500;
        $("#wpbs header div.banner").animate({top: "+=10px"},1);
        $("#wpbs header span").animate({top: "+=10px"},1);
		$("#wpbs header").animate({
			opacity: 1
		}, speed, function() {
			$("#wpbs header div.banner").animate({
				opacity: 1,
				top: "-=10px"
			}, speed, function() {
				$("#wpbs header span").animate({
					opacity: 1,
					top: "-=10px"
				}, speed, function() {
					$("#wpbs .scrollDir").animate({
						opacity: 1
					}, speed,function() {});
				});
			});
		});

		$("#wpbs section.timeline article").each(function(n, e) {
			Natgeo.articleArr[n] = false;
			$(e).css({
				"opacity": 0,
				marginTop: function(i, v) {
					return v + 50
				}
			});
		});

		this.scrollHandler = function() {
			var offset = $('.timeline').offset().top - Natgeo.offset;

			if ($(window).scrollTop() >= offset && !Natgeo.fixed) {
				Natgeo.fixed = true;
				$('.indicator').addClass('fixed');
			}
			if ($(window).scrollTop() < offset && Natgeo.fixed) {
				Natgeo.fixed = false;
				$('.indicator').removeClass('fixed');
			}

			if (!Natgeo.isKeyShown && that.isVisible("#timelineKey")) {
				that.showKey();
			}

			$("#wpbs section.timeline article").each(function(n, e) {
				if (!Natgeo.articleArr[n] && that.isVisible("#wpbs section.timeline article:eq(" + n + ")", 1)) {
					Natgeo.articleArr[n] = true;

                                        var newHeight = $(e).offset().top + ($(e).height()*0.65) - $('#timelineLine').offset().top;   
                    var maxHeight = $("section#foot").offset().top -$('#timelineLine').offset().top - 40;
                    var currentHeight = $("#timelineLine").height();
                    var h = Math.max(currentHeight,newHeight);
                    if(n >= Natgeo.articleArr.length-1 || h > maxHeight) h=maxHeight;
                    $('#timelineLine').animate({"height":h},500);
                    $(e).animate({ opacity: 1, marginTop: "-=50px" }, 400); 
				}
			});

			that.atTop();
		}

		this.isVisible = function(el, isLoose) {
			var docViewTop = $(window).scrollTop();
			var docViewBottom = docViewTop + $(window).height();

			var vis = false;
			$(el).each(function(n, eli) {
				var elemTop = $(eli).offset().top;
				var elemBottom = elemTop + $(eli).height();

				if ((elemBottom <= docViewBottom) && (elemTop >= docViewTop) || (isLoose && elemTop <= docViewBottom - 100 && elemTop > docViewTop)) {
					vis = true;
					return;
				}
			});
			return vis;
		}

		this.atTop = function() {
			var items = $('.era');
			var current = $(window).scrollTop() + $(window).height();

			for (var i = items.length - 1; i >= 0; i--) {
				var itop = $(items[i]).offset().top;

				if (itop > $(window).scrollTop() - 150 && itop < current && !$(items[i]).hasClass('active')) {
					$('.era, .indicator ul li').removeClass('active');
					$('.indicator ul li:eq('+ i +')').addClass('active');
					$(items[i]).addClass('active');
				}
			}
		}

		this.showKey = function() {
			Natgeo.isKeyShown = true;
			$("#timelineKey").animate({
				opacity: 1
			}, 500, function() {
				$("#timelineKey span").each(function(n, e) {
					$(e).delay(n * 250).animate({
						opacity: 1
					}, 350);
				});
			});
		}
	}
}

Natgeo.Tracking = function() {
	var that = this;

	this.init = function() {
		if (typeof s !== 'undefined') {
			s.sendDataToOmniture('natgeo-killing-reagan-omniture', {
			    eVar1 : '/blogs/brand-connect/natgeo/killing-reagan/'
			});
		}
	}

	this.sendDataToOmniture = function(value) {
		if (typeof s !== 'undefined') {
			s.sendDataToOmniture('natgeo-killing-reagan-omniture', 'event80', {
			    eVar1 : '/blogs/brand-connect/natgeo/killing-reagan/',
			    eVar26 : value
			});
		}
	}
};

Natgeo.checkDate = function(date, only) {
	if (typeof date === 'undefined') {
		return;
	}

	var todaysDate = new Date(),
		inputDate = new Date(date);

	if (only) {
		return todaysDate.setHours(0,0,0,0) == inputDate.setHours(0,0,0,0) ? true : false;
	} else {
		return todaysDate.setHours(0,0,0,0) >= inputDate.setHours(0,0,0,0) ? true : false;
	}
};

$(document).ready(function() {
	window.requestAnimationFrame = window.requestAnimationFrame
	    || window.mozRequestAnimationFrame
	    || window.webkitRequestAnimationFrame
	    || window.msRequestAnimationFrame
	    || function(f) { setTimeout(f, 1000/60) }

	Natgeo.article = new Natgeo.Article();
	Natgeo.tracking = new Natgeo.Tracking();	

		Natgeo.article.init();
	Natgeo.tracking.init();
});


!function(){var e={1989:function(e,t,n){var o=n(1789),i=n(401),r=n(7667),a=n(1327),s=n(1866);function u(e){var t=-1,n=null==e?0:e.length;for(this.clear();++t<n;){var o=e[t];this.set(o[0],o[1])}}u.prototype.clear=o,u.prototype.delete=i,u.prototype.get=r,u.prototype.has=a,u.prototype.set=s,e.exports=u},8407:function(e,t,n){var o=n(7040),i=n(4125),r=n(2117),a=n(7518),s=n(4705);function u(e){var t=-1,n=null==e?0:e.length;for(this.clear();++t<n;){var o=e[t];this.set(o[0],o[1])}}u.prototype.clear=o,u.prototype.delete=i,u.prototype.get=r,u.prototype.has=a,u.prototype.set=s,e.exports=u},7071:function(e,t,n){var o=n(852)(n(5639),"Map");e.exports=o},3369:function(e,t,n){var o=n(4785),i=n(1285),r=n(6e3),a=n(9916),s=n(5265);function u(e){var t=-1,n=null==e?0:e.length;for(this.clear();++t<n;){var o=e[t];this.set(o[0],o[1])}}u.prototype.clear=o,u.prototype.delete=i,u.prototype.get=r,u.prototype.has=a,u.prototype.set=s,e.exports=u},2705:function(e,t,n){var o=n(5639).Symbol;e.exports=o},6874:function(e){e.exports=function(e,t,n){switch(n.length){case 0:return e.call(t);case 1:return e.call(t,n[0]);case 2:return e.call(t,n[0],n[1]);case 3:return e.call(t,n[0],n[1],n[2])}return e.apply(t,n)}},9932:function(e){e.exports=function(e,t){for(var n=-1,o=null==e?0:e.length,i=Array(o);++n<o;)i[n]=t(e[n],n,e);return i}},2488:function(e){e.exports=function(e,t){for(var n=-1,o=t.length,i=e.length;++n<o;)e[i+n]=t[n];return e}},4865:function(e,t,n){var o=n(9465),i=n(7813),r=Object.prototype.hasOwnProperty;e.exports=function(e,t,n){var a=e[t];r.call(e,t)&&i(a,n)&&(void 0!==n||t in e)||o(e,t,n)}},8470:function(e,t,n){var o=n(7813);e.exports=function(e,t){for(var n=e.length;n--;)if(o(e[n][0],t))return n;return-1}},9465:function(e,t,n){var o=n(8777);e.exports=function(e,t,n){"__proto__"==t&&o?o(e,t,{configurable:!0,enumerable:!0,value:n,writable:!0}):e[t]=n}},1078:function(e,t,n){var o=n(2488),i=n(7285);e.exports=function e(t,n,r,a,s){var u=-1,c=t.length;for(r||(r=i),s||(s=[]);++u<c;){var l=t[u];n>0&&r(l)?n>1?e(l,n-1,r,a,s):o(s,l):a||(s[s.length]=l)}return s}},7786:function(e,t,n){var o=n(1811),i=n(327);e.exports=function(e,t){for(var n=0,r=(t=o(t,e)).length;null!=e&&n<r;)e=e[i(t[n++])];return n&&n==r?e:void 0}},4239:function(e,t,n){var o=n(2705),i=n(9607),r=n(2333),a=o?o.toStringTag:void 0;e.exports=function(e){return null==e?void 0===e?"[object Undefined]":"[object Null]":a&&a in Object(e)?i(e):r(e)}},8565:function(e){var t=Object.prototype.hasOwnProperty;e.exports=function(e,n){return null!=e&&t.call(e,n)}},13:function(e){e.exports=function(e,t){return null!=e&&t in Object(e)}},9454:function(e,t,n){var o=n(4239),i=n(7005);e.exports=function(e){return i(e)&&"[object Arguments]"==o(e)}},8458:function(e,t,n){var o=n(3560),i=n(5346),r=n(3218),a=n(346),s=/^\[object .+?Constructor\]$/,u=Function.prototype,c=Object.prototype,l=u.toString,d=c.hasOwnProperty,p=RegExp("^"+l.call(d).replace(/[\\^$.*+?()[\]{}|]/g,"\\$&").replace(/hasOwnProperty|(function).*?(?=\\\()| for .+?(?=\\\])/g,"$1.*?")+"$");e.exports=function(e){return!(!r(e)||i(e))&&(o(e)?p:s).test(a(e))}},5970:function(e,t,n){var o=n(3012),i=n(9095);e.exports=function(e,t){return o(e,t,(function(t,n){return i(e,n)}))}},3012:function(e,t,n){var o=n(7786),i=n(611),r=n(1811);e.exports=function(e,t,n){for(var a=-1,s=t.length,u={};++a<s;){var c=t[a],l=o(e,c);n(l,c)&&i(u,r(c,e),l)}return u}},611:function(e,t,n){var o=n(4865),i=n(1811),r=n(5776),a=n(3218),s=n(327);e.exports=function(e,t,n,u){if(!a(e))return e;for(var c=-1,l=(t=i(t,e)).length,d=l-1,p=e;null!=p&&++c<l;){var v=s(t[c]),f=n;if("__proto__"===v||"constructor"===v||"prototype"===v)return e;if(c!=d){var h=p[v];void 0===(f=u?u(h,v,p):void 0)&&(f=a(h)?h:r(t[c+1])?[]:{})}o(p,v,f),p=p[v]}return e}},6560:function(e,t,n){var o=n(5703),i=n(8777),r=n(6557),a=i?function(e,t){return i(e,"toString",{configurable:!0,enumerable:!1,value:o(t),writable:!0})}:r;e.exports=a},531:function(e,t,n){var o=n(2705),i=n(9932),r=n(1469),a=n(3448),s=o?o.prototype:void 0,u=s?s.toString:void 0;e.exports=function e(t){if("string"==typeof t)return t;if(r(t))return i(t,e)+"";if(a(t))return u?u.call(t):"";var n=t+"";return"0"==n&&1/t==-1/0?"-0":n}},7561:function(e,t,n){var o=n(7990),i=/^\s+/;e.exports=function(e){return e?e.slice(0,o(e)+1).replace(i,""):e}},1811:function(e,t,n){var o=n(1469),i=n(5403),r=n(5514),a=n(9833);e.exports=function(e,t){return o(e)?e:i(e,t)?[e]:r(a(e))}},4429:function(e,t,n){var o=n(5639)["__core-js_shared__"];e.exports=o},8777:function(e,t,n){var o=n(852),i=function(){try{var e=o(Object,"defineProperty");return e({},"",{}),e}catch(e){}}();e.exports=i},9021:function(e,t,n){var o=n(5564),i=n(5357),r=n(61);e.exports=function(e){return r(i(e,void 0,o),e+"")}},1957:function(e,t,n){var o="object"==typeof n.g&&n.g&&n.g.Object===Object&&n.g;e.exports=o},5050:function(e,t,n){var o=n(7019);e.exports=function(e,t){var n=e.__data__;return o(t)?n["string"==typeof t?"string":"hash"]:n.map}},852:function(e,t,n){var o=n(8458),i=n(7801);e.exports=function(e,t){var n=i(e,t);return o(n)?n:void 0}},9607:function(e,t,n){var o=n(2705),i=Object.prototype,r=i.hasOwnProperty,a=i.toString,s=o?o.toStringTag:void 0;e.exports=function(e){var t=r.call(e,s),n=e[s];try{e[s]=void 0;var o=!0}catch(e){}var i=a.call(e);return o&&(t?e[s]=n:delete e[s]),i}},7801:function(e){e.exports=function(e,t){return null==e?void 0:e[t]}},222:function(e,t,n){var o=n(1811),i=n(5694),r=n(1469),a=n(5776),s=n(1780),u=n(327);e.exports=function(e,t,n){for(var c=-1,l=(t=o(t,e)).length,d=!1;++c<l;){var p=u(t[c]);if(!(d=null!=e&&n(e,p)))break;e=e[p]}return d||++c!=l?d:!!(l=null==e?0:e.length)&&s(l)&&a(p,l)&&(r(e)||i(e))}},1789:function(e,t,n){var o=n(4536);e.exports=function(){this.__data__=o?o(null):{},this.size=0}},401:function(e){e.exports=function(e){var t=this.has(e)&&delete this.__data__[e];return this.size-=t?1:0,t}},7667:function(e,t,n){var o=n(4536),i=Object.prototype.hasOwnProperty;e.exports=function(e){var t=this.__data__;if(o){var n=t[e];return"__lodash_hash_undefined__"===n?void 0:n}return i.call(t,e)?t[e]:void 0}},1327:function(e,t,n){var o=n(4536),i=Object.prototype.hasOwnProperty;e.exports=function(e){var t=this.__data__;return o?void 0!==t[e]:i.call(t,e)}},1866:function(e,t,n){var o=n(4536);e.exports=function(e,t){var n=this.__data__;return this.size+=this.has(e)?0:1,n[e]=o&&void 0===t?"__lodash_hash_undefined__":t,this}},7285:function(e,t,n){var o=n(2705),i=n(5694),r=n(1469),a=o?o.isConcatSpreadable:void 0;e.exports=function(e){return r(e)||i(e)||!!(a&&e&&e[a])}},5776:function(e){var t=/^(?:0|[1-9]\d*)$/;e.exports=function(e,n){var o=typeof e;return!!(n=null==n?9007199254740991:n)&&("number"==o||"symbol"!=o&&t.test(e))&&e>-1&&e%1==0&&e<n}},5403:function(e,t,n){var o=n(1469),i=n(3448),r=/\.|\[(?:[^[\]]*|(["'])(?:(?!\1)[^\\]|\\.)*?\1)\]/,a=/^\w*$/;e.exports=function(e,t){if(o(e))return!1;var n=typeof e;return!("number"!=n&&"symbol"!=n&&"boolean"!=n&&null!=e&&!i(e))||a.test(e)||!r.test(e)||null!=t&&e in Object(t)}},7019:function(e){e.exports=function(e){var t=typeof e;return"string"==t||"number"==t||"symbol"==t||"boolean"==t?"__proto__"!==e:null===e}},5346:function(e,t,n){var o,i=n(4429),r=(o=/[^.]+$/.exec(i&&i.keys&&i.keys.IE_PROTO||""))?"Symbol(src)_1."+o:"";e.exports=function(e){return!!r&&r in e}},7040:function(e){e.exports=function(){this.__data__=[],this.size=0}},4125:function(e,t,n){var o=n(8470),i=Array.prototype.splice;e.exports=function(e){var t=this.__data__,n=o(t,e);return!(n<0||(n==t.length-1?t.pop():i.call(t,n,1),--this.size,0))}},2117:function(e,t,n){var o=n(8470);e.exports=function(e){var t=this.__data__,n=o(t,e);return n<0?void 0:t[n][1]}},7518:function(e,t,n){var o=n(8470);e.exports=function(e){return o(this.__data__,e)>-1}},4705:function(e,t,n){var o=n(8470);e.exports=function(e,t){var n=this.__data__,i=o(n,e);return i<0?(++this.size,n.push([e,t])):n[i][1]=t,this}},4785:function(e,t,n){var o=n(1989),i=n(8407),r=n(7071);e.exports=function(){this.size=0,this.__data__={hash:new o,map:new(r||i),string:new o}}},1285:function(e,t,n){var o=n(5050);e.exports=function(e){var t=o(this,e).delete(e);return this.size-=t?1:0,t}},6e3:function(e,t,n){var o=n(5050);e.exports=function(e){return o(this,e).get(e)}},9916:function(e,t,n){var o=n(5050);e.exports=function(e){return o(this,e).has(e)}},5265:function(e,t,n){var o=n(5050);e.exports=function(e,t){var n=o(this,e),i=n.size;return n.set(e,t),this.size+=n.size==i?0:1,this}},4523:function(e,t,n){var o=n(8306);e.exports=function(e){var t=o(e,(function(e){return 500===n.size&&n.clear(),e})),n=t.cache;return t}},4536:function(e,t,n){var o=n(852)(Object,"create");e.exports=o},2333:function(e){var t=Object.prototype.toString;e.exports=function(e){return t.call(e)}},5357:function(e,t,n){var o=n(6874),i=Math.max;e.exports=function(e,t,n){return t=i(void 0===t?e.length-1:t,0),function(){for(var r=arguments,a=-1,s=i(r.length-t,0),u=Array(s);++a<s;)u[a]=r[t+a];a=-1;for(var c=Array(t+1);++a<t;)c[a]=r[a];return c[t]=n(u),o(e,this,c)}}},5639:function(e,t,n){var o=n(1957),i="object"==typeof self&&self&&self.Object===Object&&self,r=o||i||Function("return this")();e.exports=r},61:function(e,t,n){var o=n(6560),i=n(1275)(o);e.exports=i},1275:function(e){var t=Date.now;e.exports=function(e){var n=0,o=0;return function(){var i=t(),r=16-(i-o);if(o=i,r>0){if(++n>=800)return arguments[0]}else n=0;return e.apply(void 0,arguments)}}},5514:function(e,t,n){var o=n(4523),i=/[^.[\]]+|\[(?:(-?\d+(?:\.\d+)?)|(["'])((?:(?!\2)[^\\]|\\.)*?)\2)\]|(?=(?:\.|\[\])(?:\.|\[\]|$))/g,r=/\\(\\)?/g,a=o((function(e){var t=[];return 46===e.charCodeAt(0)&&t.push(""),e.replace(i,(function(e,n,o,i){t.push(o?i.replace(r,"$1"):n||e)})),t}));e.exports=a},327:function(e,t,n){var o=n(3448);e.exports=function(e){if("string"==typeof e||o(e))return e;var t=e+"";return"0"==t&&1/e==-1/0?"-0":t}},346:function(e){var t=Function.prototype.toString;e.exports=function(e){if(null!=e){try{return t.call(e)}catch(e){}try{return e+""}catch(e){}}return""}},7990:function(e){var t=/\s/;e.exports=function(e){for(var n=e.length;n--&&t.test(e.charAt(n)););return n}},5703:function(e){e.exports=function(e){return function(){return e}}},3279:function(e,t,n){var o=n(3218),i=n(7771),r=n(4841),a=Math.max,s=Math.min;e.exports=function(e,t,n){var u,c,l,d,p,v,f=0,h=!1,w=!1,m=!0;if("function"!=typeof e)throw new TypeError("Expected a function");function y(t){var n=u,o=c;return u=c=void 0,f=t,d=e.apply(o,n)}function g(e){return f=e,p=setTimeout(k,t),h?y(e):d}function b(e){var n=e-v;return void 0===v||n>=t||n<0||w&&e-f>=l}function k(){var e=i();if(b(e))return _(e);p=setTimeout(k,function(e){var n=t-(e-v);return w?s(n,l-(e-f)):n}(e))}function _(e){return p=void 0,m&&u?y(e):(u=c=void 0,d)}function T(){var e=i(),n=b(e);if(u=arguments,c=this,v=e,n){if(void 0===p)return g(v);if(w)return clearTimeout(p),p=setTimeout(k,t),y(v)}return void 0===p&&(p=setTimeout(k,t)),d}return t=r(t)||0,o(n)&&(h=!!n.leading,l=(w="maxWait"in n)?a(r(n.maxWait)||0,t):l,m="trailing"in n?!!n.trailing:m),T.cancel=function(){void 0!==p&&clearTimeout(p),f=0,u=v=c=p=void 0},T.flush=function(){return void 0===p?d:_(i())},T}},7813:function(e){e.exports=function(e,t){return e===t||e!=e&&t!=t}},5564:function(e,t,n){var o=n(1078);e.exports=function(e){return null!=e&&e.length?o(e,1):[]}},7361:function(e,t,n){var o=n(7786);e.exports=function(e,t,n){var i=null==e?void 0:o(e,t);return void 0===i?n:i}},8721:function(e,t,n){var o=n(8565),i=n(222);e.exports=function(e,t){return null!=e&&i(e,t,o)}},9095:function(e,t,n){var o=n(13),i=n(222);e.exports=function(e,t){return null!=e&&i(e,t,o)}},6557:function(e){e.exports=function(e){return e}},5694:function(e,t,n){var o=n(9454),i=n(7005),r=Object.prototype,a=r.hasOwnProperty,s=r.propertyIsEnumerable,u=o(function(){return arguments}())?o:function(e){return i(e)&&a.call(e,"callee")&&!s.call(e,"callee")};e.exports=u},1469:function(e){var t=Array.isArray;e.exports=t},3560:function(e,t,n){var o=n(4239),i=n(3218);e.exports=function(e){if(!i(e))return!1;var t=o(e);return"[object Function]"==t||"[object GeneratorFunction]"==t||"[object AsyncFunction]"==t||"[object Proxy]"==t}},1780:function(e){e.exports=function(e){return"number"==typeof e&&e>-1&&e%1==0&&e<=9007199254740991}},3218:function(e){e.exports=function(e){var t=typeof e;return null!=e&&("object"==t||"function"==t)}},7005:function(e){e.exports=function(e){return null!=e&&"object"==typeof e}},3448:function(e,t,n){var o=n(4239),i=n(7005);e.exports=function(e){return"symbol"==typeof e||i(e)&&"[object Symbol]"==o(e)}},8306:function(e,t,n){var o=n(3369);function i(e,t){if("function"!=typeof e||null!=t&&"function"!=typeof t)throw new TypeError("Expected a function");var n=function(){var o=arguments,i=t?t.apply(this,o):o[0],r=n.cache;if(r.has(i))return r.get(i);var a=e.apply(this,o);return n.cache=r.set(i,a)||r,a};return n.cache=new(i.Cache||o),n}i.Cache=o,e.exports=i},308:function(e){e.exports=function(){}},7771:function(e,t,n){var o=n(5639);e.exports=function(){return o.Date.now()}},8718:function(e,t,n){var o=n(5970),i=n(9021)((function(e,t){return null==e?{}:o(e,t)}));e.exports=i},4841:function(e,t,n){var o=n(7561),i=n(3218),r=n(3448),a=/^[-+]0x[0-9a-f]+$/i,s=/^0b[01]+$/i,u=/^0o[0-7]+$/i,c=parseInt;e.exports=function(e){if("number"==typeof e)return e;if(r(e))return NaN;if(i(e)){var t="function"==typeof e.valueOf?e.valueOf():e;e=i(t)?t+"":t}if("string"!=typeof e)return 0===e?e:+e;e=o(e);var n=s.test(e);return n||u.test(e)?c(e.slice(2),n?2:8):a.test(e)?NaN:+e}},9833:function(e,t,n){var o=n(531);e.exports=function(e){return null==e?"":o(e)}}},t={};function n(o){var i=t[o];if(void 0!==i)return i.exports;var r=t[o]={exports:{}};return e[o](r,r.exports,n),r.exports}n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,{a:t}),t},n.d=function(e,t){for(var o in t)n.o(t,o)&&!n.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:t[o]})},n.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"==typeof window)return window}}(),n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},function(){"use strict";var e=n(308),t=n.n(e),o=n(7361),i=n.n(o);function r(e){return(r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function a(e){var t=e||{};return{vpaid:"object"===r(t.vpaid)||t.vpaid,numberOfRedirects:t.adWrapperIds?t.adWrapperIds.length:null,adId:t.adId||null,adQueryId:t.adQueryId||null,creativeId:function(e){var t=e.adWrapperCreativeIds||[],n=e.creativeId||"";return t.push(n),t.filter((function(e){return!!e})).join(",")}(t),title:t.title||null,description:t.description||null,mediaUrl:t.mediaUrl,adSystem:t.adSystem||null,adMeta:function(e){var t=Object.assign({},e);"object"===r(t.vpaid)&&(t.vpaid=!!t.vpaid);try{return JSON.stringify(t)}catch(e){return console.debug(e),""}}(t),isPreloadingAd:t.isPreloading,adWrapperSystems:(t.adWrapperSystems||[]).join(",")}}function s(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=["715998959","138210079292","716945960","138228291976"];return e&&"string"==typeof e.creativeId?t.includes(e.creativeId):null}var u=n(8718),c=n.n(u);function l(e){var t=document.cookie.match("(^|;) ?"+e+"=([^;]*)(;|$)");return t?t[2]:null}function d(e){return new Date(e).getTime()}function p(e){return e.charAt(0).toUpperCase()+e.slice(1)}function v(){try{return window.self!==window.top}catch(e){return!0}}function f(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:window.self!==window.top?document.referrer:window.location.href;try{if(!I(e))return"";e=(e=e.split("/")[2]).split(":")[0]}catch(e){console.debug(e)}return e}function h(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:1,n=arguments.length>2&&void 0!==arguments[2]&&arguments[2];if(e instanceof HTMLElement){var o=e.getBoundingClientRect();return o.top+e.offsetHeight*t>=0&&o.bottom-e.offsetHeight*t<=(window.innerHeight||document.documentElement.clientHeight)&&(!n||o.left>=0)&&(!n||o.right<=(window.innerWidth||document.documentElement.clientWidth))}return null}function w(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},n=t.prop,o=void 0===n?"name":n,i=t.begin,r=void 0===i?0:i;if(!Array.isArray(e)||e.length<=r)return null;var a=e.slice(r).map((function(e){return e[o]})).join(";");return a.includes(";")&&(a+=";"),a}function m(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],t=[];for(var n in e)t.push(e[n].text);return t}function y(e){return e?e.join(";"):""}function g(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:(new Date).getTime();return window.performance.timing.navigationStart>0?e-window.performance.timing.navigationStart:null}function b(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:(new Date).getTime();return window.performance.timing.domContentLoadedEventStart>0?e-window.performance.timing.domContentLoadedEventStart:null}function k(){return i()(window,"wp_pb.pageName")||i()(window,"Fusion.template")||""}function _(){return!!i()(window,"pageName","").startsWith("video-leaf-page")||k().startsWith("video")}function T(){return!0===i()(window,"wp_meta_data.isHomepage")||"homepage"===i()(window,"Fusion.metas.contentType.value")?"homepage":_()?"leaf":(e=k()).startsWith("article")||e.startsWith("template/article")?"article page":window.location.href.indexOf("/graphics/")>-1||"interactive graphics"===i()(window,"wp_content_type","")?"graphics":"wpvIframe"===window.pageType||/washingtonpost\.com\/(video|posttv)\/c\/embed/.test(window.location.href)?"iframe":"other";var e}function S(e){var t=e.powa,n=e.powaId,o=e.powaTrack,r=e.event;return o||(t&&!n&&(n=t.getID()),o=i()(window,"powas[".concat(n,"].powaTrack"),[])),o.filter((function(e){return e.event===r}))[0]||null}function P(e){var t=e.powa,n=e.powaId,o=e.powaTrack,i=e.event,r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:(new Date).getTime(),a=S({powa:t,powaId:n,powaTrack:o,event:i});if(a){var s=a.timestamp;return r-s}return null}var x,A,I=function(e){return/^https?:\/\//.test(e)},O=(x=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:document.location.search,t={};return e&&(window.URLSearchParams?new URLSearchParams(e).forEach((function(e,n){t[n]=e})):e.replace(/(^\?)/,"").split("&").forEach((function(e){e=e.split("="),t[e[0]]=e[1]}))),t}().embedContext,window.wp_meta_data&&!0===window.wp_meta_data.isPWA||"pwa"===window.wp_site?"pwa":/^(fbInstant|amp|pwa)$/.test(x)?x.toLowerCase():"");function E(){var e,t={url:(e=window.location.origin,e||(e=window.location.protocol+"//"+window.location.hostname+(window.location.port?":"+window.location.port:"")),"".concat(e).concat(window.location.pathname)),urlQueryString:window.location.search,urlHash:window.location.hash,HTTP_REFERER:document.referrer,isSignedIn:!!l("wapo_secure_login_id"),isIframe:window.top!==window.self,embedContext:O,site:"amp"===O&&/freshcontent=1/.test(document.referrer)?"ampfresh":"amp"===O?"amphtml":O||(window.self===window.top&&document.domain.indexOf("washingtonpost.com")>-1||window.self!==window.top&&"document.domain"==document.domain&&document.domain===window.top.document.domain?"www.washingtonpost.com":void 0),templateName:k(),powaVersion:i()(window,"PoWa.VERSION"),powaBuild:i()(window,"PoWa.BUILD"),pageType:T(),pageSection:window.wp_section||"",_pageSubSection:window.wp_subsection||""},n=l("wapo_actmgmt")||"";t.isSubscriber=-1!==n.indexOf("isub:1");try{t.page=window.s.pageName,t.channel=window.s.channel,t.type=window.s.prop3}catch(e){}var o=function(){if(window.wp_pb&&window.wp_pb.BrowserInfo){var e=window.wp_pb.BrowserInfo;return{browser:e.browser&&e.browser.toLowerCase(),os:e.OS&&e.OS.toLowerCase(),version:e.version&&e.version.split(".")[0]}}}();return o&&(t.browser=o.browser,t.os=o.os,t.version=o.version),_()&&(t.medleyHash=i()(window,"__NEXT_DATA__.props.pageProps.buildHash")),t}function C(){var e=i()(window,"PoWaSettings.splitTests.irisTest");return{visibilityState:document.visibilityState,persisted:A,imaVersion:i()(window,"google.ima.VERSION"),irisTest:"function"==typeof i()(e,"in")?e.in():null}}function j(e){if(!e)return{};var t,n=e.getElement(),o=e.getDataset(),r=e.getStatus(),a=i()(r,"stream"),s=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"powaBoot.js";return document.querySelector('script[src*="'+e+'"]')}(),u={playerType:L(o),streamType:D(a),streamDomain:V(a),cdn:M(V(a))||null,ptvenv:B(s),powaLoadedVia:(t=s,t?t.dataset.loadedBy||t.dataset.loadedVia:null),nthVideoOnPage:o.powaIndex,_isPrerollPlugin:o.prerollOnly,_isAdDisabledOnPlayer:!1===o.ads,articleAutoplay:o.articleAutoplay,isLooping:o.continuousPlay||o.loop,offsetTop:W(n),promoType:R(e)};u.loadedBy=o.loadedBy||null,u.loadedByReason=o.loadedByReason||null,u.adTimeoutLength=o.adTimeouts.adStart,u.initOnScroll=!0===o.initOnScroll||!0===o.noVideoOnLivebarStart||!0===o.curtainNonInitialState;var c=function(){var e=window.PoWaSettings&&window.PoWaSettings.client||{};return{browser:e.browserName,os:e.isAndroid?"android":e.isKindle?"kindle":e.isMac?"mac":e.isLinux?"linux":e.isIOS?"ios":e.isWindows?"windows":e.isChromeOs?"chromeOS":"",version:e.version,isWebView:e.isWebView}}();return c&&(u.browser=c.browser,u.os=c.os,u.version=c.version,c.isWebView&&(u.isWebView=c.isWebView)),!0===o.loopingVideo&&(!1===o.ads&&(u._adNotSupported=!0),u.player="powa-loopingVideo"),u}function D(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"";try{var t=e.split("/").pop(),n=t.split(".")[1].split("?")[0];return n}catch(e){return null}}function V(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"";return e?e.split("/")[2]:null}function M(e){if(e){if(/akamai/.test(e))return"akamai";if(/posttv\.com|cloudfront.net/.test(e))return"cloudfront"}}function L(e){var t="posttv-embed".concat(O?"-"+O:"");return e.playerType?t=e.playerType:!0===e.discovery?t="posttv-embed-playlist":window.wp_meta_data&&!0===window.wp_meta_data.isHomepage?t="posttv-embed-hp":window.self!==window.top?t="posttv-embed-iframe":window.wp_pb&&/video-leaf-page/.test(window.wp_pb.pageName)&&(t="posttv-leaf"),t}function B(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"powaBoot.js",n=e&&e.src?e.src.toLowerCase():null,o=n?n.split("//")[1].split("/").slice(1):[],i=o.reduce((function(e,n,o){return n.indexOf(t.toLowerCase())>-1?o:e}),0);return 0===i?"prod":"js"===o[i-1]?"local":o[i-1]}function N(e){return e&&e.closest?null!==e.closest(".powa-sticky-stick.powa-sticky"):null}function W(e){var t;try{var n=window!=window.parent?window.parent:window,o=e.getBoundingClientRect(),i=n.pageYOffset||document.documentElement.scrollTop;t=Math.floor(o.top+i)}catch(e){}return t}function R(e){var t=e.getElement();if(t.querySelector("video.powa-shot-promo-video"))return"mp4";var n=t.querySelector(".powa-shot-image.powa-click-promo-play, .powa-shot-image.powa-click-promo-play-debounced");if(n){var o=getComputedStyle(n).backgroundImage;return o&&"none"!==o?(o=o.slice(5,-2)).endsWith(".gif")?"gif":"image":null}return null}window.addEventListener("pageshow",(function(e){e.persisted&&(A="persisted")}));var F=n(8721),H=n.n(F);function U(e){var t=e.find((function(e){return"promoPlay"===e.event||"start"===e.event}));if(t){if(i()(t,"data.videoStarts")>1)return"continuous";if("promoPlay"===t.event)return"manual";if("start"===t.event)return"autoplay"}}function q(e){if(!e)return{};var t=e.getID(),n=window.powas[t].powaTrack,o={startReason:U(n)},r=n.filter((function(e){return"adRequest"===e.event}))[0],a=n.filter((function(e){return"adImpression"===e.event}))[0],u=n.filter((function(e){return"adStart"===e.event}))[0],c=n.filter((function(e){return"adComplete"===e.event}))[0],l=n.filter((function(e){return"adBarSkip"===e.event}))[0],d=u||a||r,p=n.filter((function(e){return"adStartTimeout"===e.event}))[0],v=n.filter((function(e){return"adError"===e.event}))[0];if(d){o._isAdEventAvailable=!0;var f=d.data.adStatus,h=f.adMeta;o._isBlankAd=s(h),o._isPreloadAd=f.adPreload,o._isAdTimeout=!!p,o._isAdRequest=!!r,o._isAdStarted=!!u,o._isAdCompleted=!!c,o._isAdBarSkipped=!!l,o._isAdError=!!v}else o._isAdEventAvailable=!1;var w=n.filter((function(e){return"mtSession"===e.event}))[0];w?(o.mt=!1===H()(w,"data.error"),o.mtError=H()(w,"data.error")):(o.mt=!1,o.mtError=!1);var m=n.filter((function(e){return"mtAvails"===e.event}))[0];m?(o.mtAvails=!0,o.mtCreativeId=i()(m,"data.avails[0].ads[0].creativeId"),o.mtVastAdId=i()(m,"data.avails[0].ads[0].vastAdId"),o.mtAdTitle=i()(m,"data.avails[0].ads[0].adTitle")):o.mtAvails=!1,n.filter((function(e){return"preview2-autoplay"===e.event}))[0]&&(o.isPreview2=!0),n.filter((function(e){return"onceplay-autoplay"===e.event}))[0]&&(o.isOnceplay=!0);var y=n.filter((function(e){return"adHeaderBidding"===e.event}))[0];y&&(o.adHeaderBidding=!0,o.adHeaderBiddingProvider=i()(y,"data.provider"));var g=n.filter((function(e){return"irisStart"===e.event}))[0];if(g){var b=n.filter((function(e){return"irisBidRequest"===e.event}))[0],k=n.filter((function(e){return"irisBidFetched"===e.event}))[0];k&&(o.irisRunTime=k.timestamp-g.timestamp,o.irisBidTime=k.timestamp-b.timestamp),n.filter((function(e){return"irisTimeout"===e.event}))[0]&&(o.irisTimeout=!0)}return n.filter((function(e){return"WapoUpUpcoming_notUpcoming"===e.event}))[0]&&(o.wasUpcoming=!0),o}function $(e){return($="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function z(e){if("object"!==$(e))return{};var t,n,o,r,a,s={videoId:e._id||null,videoName:i()(e,"headlines.basic",null),videoType:"live"===e.video_type?"livestream":"video",videoSource:i()(e,"source.name",null),videoCMS:i()(e,"source.system"),videoHost:i()(e,"credits.host_talent",null),subsection:i()(e,"additional_properties.subsection",null),secondarySections:i()(e,"taxonomy.sections",null),durationInSeconds:e.duration?e.duration/1e3:0,editors:Y(e),streamName:i()(e,"additional_properties.streamName",""),contributors:i()(e,"credits.contributors"),videoCategory:i()(e,"additional_properties.videoCategory"),provider:i()(e,"streams[0].provider"),keywords:i()(e,"taxonomy.seo_keywords",null),tags:i()(e,"taxonomy.tags",null),canonicalUrl:i()(e,"canonical_url"),displayDate:(t=i()(e,"display_date"),n=new Date(t),o=n.getDate().toString(),r=(n.getMonth()+1).toString(),a=n.getFullYear().toString(),1==r.length&&(r="0"+r),1==o.length&&(o="0"+o),a+"-"+r+"-"+o),_dateLastPublished:d(e.last_updated_date),_adAllowed:J(e)};return J(e)&&(G(e)&&(s.missingAdSetUrl=!0),Q(e)&&(s.missingAdZone=!0),K(e)&&(s.invalidAdZone=!0),s.videoAdZone=i()(e,"additional_properties.advertising.videoAdZone")),s}function Y(e){var t=i()(e,"credits.by",[]).filter((function(e){return e.name}));if(0==t.length){var n=i()(e,"credits.host_talent"),o=i()(e,"credits.contributors");if(n&&0!==n.length||o&&0!==o.length)t=null;else{var r=i()(e,"additional_properties.firstPublishedBy.name",""),a=i()(e,"additional_properties.firstPublishedBy.lastname","");t=r||a?[{name:"".concat(r," ").concat(a)}]:null}}return t}var J=function(e){var t=i()(e,"additional_properties.playVideoAds"),n=Z(e);return t&&n},Z=function(e){var t=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:window.self!==window.top?document.referrer:window.location.href;try{if(e=f(e)){var t=e.split("."),n=t.length,o="co"===t[n-2]?3:2;if(n>=o){for(var i=[];o;)i.push(t[n-o]),o--;e=i.join(".")}}}catch(e){console.debug(e)}return e}();if(/washingtonpost\.com|localhost|thelily\.com|arcpublishing\.com|wpprivate\.com/.test(t))return!0;var n=f();return!!/www-washingtonpost-com\.cdn\.ampproject\.org|wpit\.nile\.works/.test(n)||i()(e,"additional_properties.advertising.allowPrerollOnDomain")},G=function(e){return!i()(e,"additional_properties.advertising.adSetUrls.apps","")},Q=function(e){return!i()(e,"additional_properties.advertising.videoAdZone","")},K=function(e){var t=i()(e,"additional_properties.advertising.videoAdZone","");return!1===/wpni.video/.test(t)};function X(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:(new Date).getTime();if(!e)return{};var n={},o=Object.keys(e);o.forEach((function(o){n["timeSince".concat(p(o))]=t-e[o]}));var i=b(t);return i&&(n.timeSinceDomContentLoaded=i),n}function ee(){var e;try{e=this.powa.getStatus().yt}catch(e){}return{videoAnalyticsVersion:"1.16.3",playCounter:this.playCounter,vendor:e?"YouTube":this.powa?"PoWa":void 0,adEndVisibilityState:this.adEndVisibilityState}}function te(e){return(te="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function ne(e){return e.map((function(e){return e.name})).join(", ")}function oe(e){var t=e.subsection||"",n=e._dateLastPublished,o=e.videoName,i=new Date(n).toLocaleDateString("en-US"),r=t?t.toLowerCase()+":":"";return"".concat(r,"video - ").concat(i," - ").concat(o)}var ie="wp - ";function re(e,t){return t.indexOf(e)>=0?t:"".concat(e).concat(t)}function ae(e){return"object"!==te(e)?{}:{eVar2:e.pageSection?re(ie,e.pageSection):"",prop2:e._pageSubSection?re(ie,e._pageSubSection):"",eVar8:e.editors?ne(e.editors):"",eVar12:e.videoId,eVar13:oe(e),eVar17:e.videoType,eVar36:e.hostTalent?ne(e.hostTalent):"",eVar37:e.contributors?ne(e.contributors):"",eVar41:e.videoCategory,eVar42:e.videoSource,eVar44:se(e),eVar47:e.subsection,eVar48:ue(e),eVar49:e.playerType,eVar50:e.pageType,eVar58:"washingtonpost.com",rolledUpAdStatus:ce(e)}}function se(e){return"".concat(e.os," ").concat(e.browser," ").concat(e.version)}function ue(e){var t,n;return t=e._isAdEventAvailable?e._isPreloadAd?"prefetched":"notfetched":"undefined",e._isAdEventAvailable?e._isBlankAd?n="reqblank":e._isAdError?n="error":e._isAdStarted?n="reqshow":e._isAdTimeout&&(n="reqTimeout"):n=!1===e._adAllowed?"noreq":"undefined","".concat(t,":").concat(n)}function ce(e){var t;return e._isAdEventAvailable?e._isBlankAd?t="adBlank":e._isAdError?t="adError":e._isAdCompleted?t="adCompleted":e._isAdStarted?t="adStarted":e._isAdTimeout&&(t="adTimeout"):t=e._adNotSupported?"adNotSupported":!1===e._adAllowed?"adNotAllowed":e._isAdDisabledOnPlayer?"adDisabled":"undefined",t}function le(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}var de=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e)}var n,o;return n=e,o=[{key:"send",value:function(){t()()}},{key:"load",value:function(){var e;window.TWP&&window.TWP.Analytics||(e="https://www.washingtonpost.com/wp-stat/analytics/latest/main.js",new Promise((function(n,o){return function(e){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:t(),o=arguments.length>2&&void 0!==arguments[2]?arguments[2]:t(),i=document.querySelector('script[src="'.concat(e,'"]'));if(i&&i.hasAttribute("data-powa-script"))i.hasAttribute("data-load")?n():i.hasAttribute("data-error")?o():(i.addEventListener("load",n),i.addEventListener("error",o));else{i=document.createElement("script");var r=document.getElementsByTagName("script")[0];r.parentNode.insertBefore(i,r),i.addEventListener("error",(function(){i.setAttribute("data-error",!0),o()})),i.addEventListener("load",(function(){i.setAttribute("data-load",!0),n()})),i.setAttribute("data-powa-script",!0),i.type="text/javascript",i.async=!0,i.src=e}}(e,n,o)}))).then((function(){console.log("analytics main.js loaded from videoAnalytics"),window.TWP.Analytics.init({suppressTrackPageLoad:!0})})).catch((function(e){return console.log("could not load main.js",e)}))}}],null&&le(n.prototype,null),o&&le(n,o),e}(),pe=n(3279);function ve(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}var fe=["_ga","evtType","evtTime","streamName","ytState","ytState2","browser","version","os","videoId","url","ptvenv","powaBuild","powaVersion","videoAnalyticsVersion","HTTP_REFERER","playerType","vendor","visibilityState","persisted","rolledUpAdStatus","initOnScroll","nthVideoOnPage","playCounter","videoType","pageType","event501","errorText","startReason","articleAutoplay","templateName","isSubscriber","offsetTop","embedContext","promoType","medleyHash","wasUpcoming","timeSinceDomContentLoaded","timeSincePowaRender","timeSincePromoClick","adHeaderBiddingProvider","irisRunTime","irisBidTime","irisTimeout"],he=[];function we(e){he.push(e)}var me=n.n(pe)()((function(){for(var e=[],t=0;he.length>0&&t<10;t++){var n=he.pop(),o=n.name,i=n.data;e.push({name:o,data:i})}var r;r={postBody:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],t="";return e.forEach((function(e){var n=e.name,o=e.data,i={sourcetype:"httpevent",event:{name:n,data:o}};o.evtTime&&(i.time=Math.floor(o.evtTime/1e3)),t+=JSON.stringify(i)})),t}(e)},fetch("https://d1get58iwmjrxx.cloudfront.net/collector",{method:"POST",body:r.postBody}).then((function(e){})).catch((function(e){console.error(e)})),he.length&&me()}),6e4,{maxWait:6e4}),ye=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e)}var t,n;return t=e,n=[{key:"send",value:function(e,t,n){var o=arguments.length>3&&void 0!==arguments[3]?arguments[3]:{};n.timeSinceDomContentLoaded||(n.timeSinceDomContentLoaded=b()),n.pageType||(n.pageType=T()),void 0===n.timeSincePowaRender&&o.powaId&&(n.timeSincePowaRender=P({powaId:o.powaId,event:"powaRender"})),void 0===n._ga&&(n._ga=l("_ga")),!0===o.harvest&&(Object.assign(n,E()),o.videoJSON&&Object.assign(n,z(o.videoJSON)));var i=Object.assign({evtName:e,evtType:"string"==typeof t?t:t[0]||"",evtTime:Date.now()},c()(n,fe));we({name:e,data:i}),me()}}],null&&ve(t.prototype,null),n&&ve(t,n),e}();function ge(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}var be=function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e)}var t,n;return t=e,n=[{key:"send",value:function(e,t,n){var o=arguments.length>3&&void 0!==arguments[3]?arguments[3]:{};n.pageType||(n.pageType=T()),!0===o.harvest&&(Object.assign(n,E()),o.videoJSON&&Object.assign(n,z(o.videoJSON))),window.dataLayer=window.dataLayer||[];var i={event:e,action:e,category:"video",label:Se(n)},r=ke(n),a=Object.assign({},i,r);window.dataLayer.push(a)}}],null&&ge(t.prototype,null),n&&ge(t,n),e}();function ke(e){var t={avName:i()(e,"videoName"),avProducer:w(i()(e,"editors",null)),avCMS:i()(e,"videoCMS"),avHost:w(i()(e,"videoHost")),avSection:i()(e,"subsection"),avSecondarySections:w(i()(e,"secondarySections",null),{begin:1}),avSource:i()(e,"videoSource"),avPlayer:i()(e,"player","powa"),avPlayerType:i()(e,"playerType"),avLength:i()(e,"durationInSeconds"),avArcID:i()(e,"videoId"),avType:i()(e,"videoCategory"),avContributors:w(i()(e,"contributors",null)),avHostID:w(i()(e,"videoHost"),{prop:"slug"}),avContributorID:w(i()(e,"contributors",null),{prop:"slug"}),avTags:y(m(i()(e,"tags"),!0)),avDesk:null,avPublishDate:i()(e,"displayDate"),avKeywords:y(i()(e,"keywords")),adAttribute:i()(e,"rolledUpAdStatus"),avHeaderBidding:i()(e,"adHeaderBidding",!1),avTestGroup:Pe(e),avPromoType:i()(e,"promoType")};return e.avLiveProgress&&(t.avLiveProgress=e.avLiveProgress),t}var _e={continuous:"rollthrough",manual:"click",autoplay:"autoplay"},Te={homepage:"homepage",leaf:"leaf","article page":"embed",graphics:"graphics",other:"embed",iframe:"iframe"};function Se(e){var t=i()(e,"startReason",null),n=i()(e,"pageType",null);return i()(e,"isPreview2",null)?"autoplay-"+i()(Te,n)+"-preroll":t&&n?i()(_e,t)+"-"+i()(Te,n):i()(Te,n)}function Pe(e){var t=["irisTest:".concat(i()(e,"irisTest")?1:0)],n="";return t.forEach((function(e){return n+=e+";"})),n}var xe={event125:{name:"video-promo-click",google:!0,timeMarker:"promoClick"},event6:{name:"video-social-share",google:!0},event9:{name:"video-start",google:!0,splunk:!0,timeMarker:"videoStart"},event10:{name:"video-25-complete",google:!0},event11:{name:"video-50-complete",google:!0},event12:{name:"video-75-complete",google:!0},event13:{name:"video-complete",google:!0},event34:{name:"ad-video-skip",google:!0,timeMarker:"adSkip"},event73:{name:"video-unmute",google:!0},event128:{name:"video-mute",google:!0},event136:{name:"video-pause",google:!0},event137:{name:"video-unpause",google:!0},event140:{name:"ad-video-pause",google:!0},event141:{name:"ad-video-unpause",google:!0},event166:{name:"fullscreen-engaged",google:!0},event75:{name:"video-autoplay",splunk:!0,google:!0}},Ae={event7:{name:"video-ad-start",google:!0,splunk:!0,timeMarker:"adStart"},event8:{name:"video-ad-complete",google:!0,timeMarker:"adEnd"},irisError:{name:"Iris Error",splunk:!0},irisBidError:{name:"Iris Bid Error",splunk:!0},irisTimeout:{name:"Iris Timeout",splunk:!0}};function Ie(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}var Oe={name:"player-video-ready",splunk:!0,timeMarker:"powaRender"},Ee=function(){function e(t){var n=this;if(function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),!t.powa||!t.va)throw"Invalid settings to setup event5_2";this.powa=t.powa,this.va=t.va;var o=S({powa:this.powa,event:"powaRender"});o?this.send(o.timestamp):this.powa.once("powaRender",(function(e){n.send()}))}var t,n;return t=e,(n=[{key:"send",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:(new Date).getTime();this.va.send("event5_2",{config:Oe,time:e,trackerData:{timeSinceNavigationStart:g()}})}}])&&Ie(t.prototype,n),e}();function Ce(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}var je={name:"YT State",splunk:!0},De=function(){function e(t){var n=this;if(function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),!t.powa||!t.va)throw"Invalid settings to setup event400";this.powa=t.powa,this.el=this.powa.getElement(),this.va=t.va;var o=this.powa.getDataset(),r=this.powa.getVideoData();if(this.videoData=r,"live-bar"!==o.playerType){var a=!0===i()(window,"wp_meta_data.isHomepage")||"homepage"===i()(window,"Fusion.metas.contentType.value"),s=i()(window,"wpMetaData.subType")||i()(window,"Fusion.globalContent.subtype",""),u="live-all"===s||"highlights"===s,c="live"===r.video_type;(o.event400||(a||u)&&c)&&(this.intervalEndDate=Ve(r),this.interval=6e4,this.timePlayingBuffer=500,this.powa.on("previewClicked",(function(){return n.onInteraction()})),this.powa.on("promoPlay",(function(){return n.onInteraction()})),this.powa.on("time",(function(){return n.onTime()})),this.powa.on("destroyed",(function(){return n.teardown()})),this.powa.on("WapoYouTube_playerStateChange",(function(e){return n.onYtPlayerStateChange(e)})),"LiveBar"===o.playerType&&this.powa.on("muted",(function(e){return n.onMuted(e)})))}}var t,n;return t=e,(n=[{key:"onInteraction",value:function(){this.interacted=!0}},{key:"onMuted",value:function(e){!1===e.muted&&this.onInteraction()}},{key:"onTime",value:function(){var e=this;this.lastTimeUpdate=(new Date).getTime(),!this.pingInterval&&this.interacted&&(this.send(),this.pingInterval=window.setInterval((function(){if(document.getElementById(e.powa.getID())){var t=i()(window,"PoWaSettings.LiveConfig.videoData[".concat(e.uuid,"]"))||e.videoData;if("ended"!==i()(t,"status")){var n=Ve(t),o=new Date;n&&o>n?window.clearInterval(e.pingInterval):e.send()}else window.clearInterval(e.pingInterval)}else window.clearInterval(e.pingInterval)}),this.interval))}},{key:"send",value:function(){var e=this.powa.getStatus().state;this.va.send("event400",{config:je,trackerData:{ytState:e,ytState2:this._getYTState2(e)}})}},{key:"_getYTState2",value:function(e){var t=(new Date).getTime();return"buffering"===e&&t-this.lastTimeUpdate<this.timePlayingBuffer?"playing":e}},{key:"teardown",value:function(){window.clearInterval(this.pingInterval),delete this.pingInterval}},{key:"onYtPlayerStateChange",value:function(e){"playing"===e.playerState&&(this.onInteraction(),this.onTime())}}])&&Ce(t.prototype,n),e}();function Ve(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=i()(e,"additional_properties.publicationEndDate");if(t){var n=new Date(t);if(i()(e,"additional_properties.streamName","").startsWith("washpostlive"))try{n.setMinutes(n.getMinutes()-30)}catch(e){}return n}return null}function Me(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}var Le={event500:{name:"Player Waiting"},event501:{name:"Player Waiting End",splunk:!0,timeMarker:!0},event9999_01:{name:"Video Timeout",splunk:!0}},Be=function(){function e(t){var n=this;if(function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),!t.powa||!t.va)throw"Invalid settings to setup event500";this.powa=t.powa,this.va=t.va,this.debug=t.va.debug,this.interval=2e3,this.maxRuns=8,this.sentOnPlayback=!1,this.sentOnTimeout=!1,this.powa.on("start",(function(e){return n.onStart(e)})),this.powa.on("adStart",(function(e){return n.onAdStart(e)})),this.powa.on("firstFrame",(function(e){return n.onFirstFrame(e)})),this.powa.on("time",(function(e){return n.onTime(e)})),this.powa.on("end",(function(e){return n.onEnd(e)})),this.powa.on("destroyed",(function(e){return n.onEnd(e)})),this.onTimeout=t.onTimeout||function(){}}var t,n;return t=e,(n=[{key:"onStart",value:function(){var e=this;this.pingInterval&&window.clearInterval(this.pingInterval),this.pingCount=0,this.sentOnPlayback=!1,this.sentOnTimeout=!1,this.pingInterval=window.setInterval((function(){e.pingCount++,e.send("event500"),e.pingCount>=e.maxRuns&&e._onTimeout()}),this.interval)}},{key:"onAdStart",value:function(e){this._onPlayback(e)}},{key:"onFirstFrame",value:function(e){this._onPlayback(e)}},{key:"onTime",value:function(e){this._onPlayback(e)}},{key:"onEnd",value:function(e){window.clearInterval(this.pingInterval)}},{key:"_onPlayback",value:function(e){this.sentOnPlayback||(window.clearInterval(this.pingInterval),this.send("event501",{event501:"firstPicture",firstPictureReason:i()(e,"type","")}),this.sentOnPlayback=!0)}},{key:"_onTimeout",value:function(){this.sentOnTimeout||(window.clearInterval(this.pingInterval),this.send("event501",{event501:"timeout"}),this.sentOnTimeout=!0,this.send("event9999_01"))}},{key:"send",value:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},n=Le[e];t.pingCount=this.pingCount,!0===n.timeMarker&&(n.timeMarker=t.event501),this.va.send(e,{config:n,trackerData:t})}}])&&Me(t.prototype,n),e}();function Ne(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}var We={name:"Setup error",splunk:!0},Re=function(){function e(t){var n=this;if(function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),!t.powa||!t.va)throw"Invalid settings to setup event9994";this.powa=t.powa,this.va=t.va,this.powa.on("powaError",(function(e){n.send(e)}))}var t,n;return t=e,(n=[{key:"send",value:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=i()(e,"error.error")||i()(e,"error.message")||i()(e,"message");this.va.send("event9994",{config:We,trackerData:{errorText:t}})}}])&&Ne(t.prototype,n),e}();function Fe(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}var He={event9996:{name:"Video Ad Error",splunk:!0}},Ue=function(){function e(t){var n=this;if(function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),!t.powa||!t.va)throw"Invalid settings to setup event9996";this.powa=t.powa,this.va=t.va,this.powa.on("adError",(function(e){n.send("event9996",e)}))}var t,n;return t=e,(n=[{key:"send",value:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};if(!s(t.adMeta)){var n=He[e];this.va.send(e,{config:n,trackerData:{errorText:t.error,prerollAdError:t.error}})}}}])&&Fe(t.prototype,n),e}();function qe(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}var $e={event9991_04:{name:"Non-blocking error"},event9999:{name:"Video Error",splunk:!0},event9999_preload:{name:"Video Error before start"},event9999_deluge:{name:"Video Error deluge"}},ze=["details","code","mediaError","fatal","type","stream","time"],Ye=function(){function e(t){if(function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),!t.powa||!t.va)throw"Invalid settings to setup event400";this.powa=t.powa,this.va=t.va;var n=this.powa.getID();this.powaTrack=window.powas[n].powaTrack,this.deluge=50,this.errorCount=0,this.powa.on("start",this.onStart.bind(this)),this.powa.on("error",this.onError.bind(this))}var t,n;return t=e,(n=[{key:"onStart",value:function(e){this.started=!0}},{key:"onError",value:function(e){e.nonBlocking?this.send("event9991_04",e):this.started?(this.errorCount++,this.errorCount>this.deluge?this.send("event9999_deluge",e):this.send("event9999",e)):this.send("event9999_preload",e)}},{key:"send",value:function(e){var t,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},o=c()(n,ze);try{t=this.powa.getElement().querySelector("video.powa-video").error.message}catch(e){}var i=$e[e];this.va.send(e,{config:i,trackerData:{errorText:JSON.stringify(o),errorMessage:t,errorType:o.type,errorDetails:o.type}})}}])&&qe(t.prototype,n),e}();function Je(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}var Ze={name:"powa-impression",google:!0},Ge=function(){function e(t){var n=this,o=t.powa,i=t.va;if(function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),!o||!i)throw"Invalid settings to setup event5_3";this.powa=o,this.va=i,this.isSent=!1;var r=this.powa.getDataset();!0===r.autoplay?(this.powa.once("start",(function(e){return n.send()})),this.powa.once("powaReady",(function(e){"autoplayBlocked"===n.powa.getStatus().autoplayStatus&&n.send("manual")}))):!0===r.viewportAutoplay?(this.powa.once("start",(function(e){return n.send()})),this.powa.once("ViewportAutoplay-blocked",(function(e){return n.send("manual")}))):!0===r.preview2?(this.powa.once("preview2-autoplay",(function(e){return n.send()})),this.powa.once("preview2-autoplay-blocked",(function(e){return n.send("manual")}))):this.send("manual")}var t,n;return t=e,(n=[{key:"send",value:function(e){this.isSent||(this.va.send("event5_3",{config:Ze,trackerData:e?{startReason:e}:{},time:(new Date).getTime()}),this.isSent=!0)}}])&&Je(t.prototype,n),e}();function Qe(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}var Ke={name:"live-video-threshold",google:!0},Xe=3e5,et=function(e){var t=e.getStatus(),n=e.getVideoData();return!!document.getElementById(e.getID())&&!function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},t=i()(e,"additional_properties.publicationEndDate");if(t)try{var n=new Date,o=new Date(t);if(o.setHours(o.getHours()+1),n>o)return!0}catch(e){console.debug(e)}}(n)&&("playing"===t.state&&!1===t.muted||"adPlaying"===t.state&&!1===t.muted)},tt=function(){function e(t){if(function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),!t.powa||!t.va)throw"Invalid settings to setup liveVideoThreshold";this.powa=t.powa,this.el=this.powa.getElement(),this.va=t.va,"live"===this.powa.getVideoData().video_type&&(this.interval=Xe,this.onTime=this.onTime.bind(this),this.powa.on("time",this.onTime))}var t,n;return t=e,(n=[{key:"onInteraction",value:function(){this.interacted=!0}},{key:"onTime",value:function(){var e=this,t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};if(!this.pingInterval&&"playing"===t.state&&!1===t.muted){var n=t.powa;this.startTime=new Date,this.powa.off("time",this.onTime),this.pingInterval=setInterval((function(){if(et(n)){var t=new Date-e.startTime,o=Math.floor(t/6e4);e.send({avLiveProgress:o})}}),this.interval)}}},{key:"send",value:function(e){var t=e.avLiveProgress;this.va.send("live-video-threshold",{config:Ke,trackerData:{avLiveProgress:t}})}},{key:"teardown",value:function(){window.clearInterval(this.pingInterval),delete this.pingInterval}}])&&Qe(t.prototype,n),e}();function nt(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function ot(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}var it={},rt=[0,25,50,75,100],at=function(){function e(t){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};if(nt(this,e),!t||!n.data&&!n.powaId)throw"missing required stuff";this.events=Object.assign({},xe,Ae),this.data=n.data,this.options=Object.assign({},it,n),this.userClickedToPlay=!1,this.debug=window.location.search.includes("vaDebug=true"),this.initTimeIntervals(),this.playCounter=0,this.firstPlay=!0,this.timeMarkers={},this.trackLiveTime=this.trackLiveTime.bind(this),n.powa?this.powa=n.powa:n.powaId&&window.powas&&window.powas[n.powaId]&&(this.powa=window.powas[n.powaId].powa),this.powa&&(this.data=this.powa.getVideoData(),this.powaVersionCheck()),v()&&this.loadTrackingScripts(),this.harvest=Object.assign(E(),z(this.data),j(this.powa),(this.powa,{})),this.powa&&this.initListeners()}var t,n;return t=e,(n=[{key:"loadTrackingScripts",value:function(){de.load()}},{key:"registerPoWa",value:function(e){this.powa?console.warn("Calling registerPoWa() but you already have a powa"):(this.powaVersionCheck(),this.powa=window.powas[e].powa,this.data=this.powa.getVideoData(),Object.assign(this.harvest,z(this.data),j(this.powa),(this.powa,{})),this.initListeners())}},{key:"scanPowa",value:function(){this.data=this.powa.getVideoData(),Object.assign(this.harvest,z(this.data),j(this.powa))}},{key:"scanPerformance",value:function(){Object.assign(this.harvest,(this.powa,{}))}},{key:"send",value:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};if(this.debug&&console.debug("VA send()",e),!e)throw"no event";var n=e.split(",")[0],o=t.config||this.events[n];if(!o)return!1;var i=t.time?X(this.timeMarkers,t.time):X(this.timeMarkers),r=q(this.powa),s=C(),u=ee.call(this),c=Object.assign({},this.harvest,i,u,r,s,t.trackerData,a(t.adMeta)||{}),l=ae(c);c=Object.assign({},c,l),o.timeMarker&&(t.time?this.setTimeMarker(o.timeMarker,t.time):this.setTimeMarker(o.timeMarker)),Object.keys(c).forEach((function(e,t){e.startsWith("_")&&delete c[e]})),o.splunk&&ye.send(o.name,n,c),o.google&&be.send(o.name,e,c)}},{key:"sendAdEvent",value:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};if(!s(t.adMeta)){var n=this.powa.getElement();t=Object.assign(t,{trackerData:{isInViewport:h(n),isSticky:N(n)}}),this.send(e,t)}}},{key:"initFlags",value:function(){this.userPaused=!1,this.userPausedAd=!1,delete this.adEndVisibilityState}},{key:"initTimeIntervals",value:function(){this.timeIntervals=rt.slice()}},{key:"setTimeMarker",value:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:(new Date).getTime();if(!e)throw"name required for time marker";this.debug&&console.debug("VA setTimeMarker()",e),this.timeMarkers[e]=t}},{key:"unsetTimeMarkers",value:function(){this.timeMarkers={}}},{key:"trackLiveTime",value:function(e){"live-bar"!==this.powa.getDataset().playerType&&(!this.userClickedToPlay&&this.powa.getStatus().muted&&!0!==e.fullscreen||(this.send("event9"),this.powa.off("time",this.trackLiveTime)))}},{key:"trackFullscreen",value:function(e){e.fullscreen&&this.send("event166")}},{key:"trackPause",value:function(e){var t=this.powa.getStatus().time,n=this.powa.getStatus().duration;!this.userPaused&&t&&t>0&&n&&n!=t&&(this.send("event136"),this.userPaused=!0)}},{key:"trackAdPause",value:function(e){this.userPausedAd||(this.send("event140"),this.userPausedAd=!0)}},{key:"trackUnpause",value:function(e){this.userPaused&&(this.send("event137"),this.userPaused=!1)}},{key:"trackAdUnpause",value:function(e){this.userPausedAd&&(this.send("event141"),this.userPausedAd=!1)}},{key:"trackMute",value:function(e){e.muted?this.send("event128"):this.send("event73")}},{key:"trackAutoplay",value:function(e){var t=this.powa.getDataset();"live-bar"!==t.playerType&&(!t.autoplay||this.userClickedToPlay||this.firedAutoplay||(this.firedAutoplay=!0,this.send("event75")),"preview2-autoplay"!==e.type||this.firedAutoplay||(this.firedAutoplay=!0,this.send("event75")))}},{key:"initListeners",value:function(){if(!this.listenersDone){this.listenersDone=!0;var e=this.powa.getDataset();1==e.prerollOnly?this.prerollPluginListeners():(this.powaListeners(),"inline-player-playlist"===e.playerType&&this.inlinePlayerPlaylistListeners())}}},{key:"prerollPluginListeners",value:function(){var e=this;this.powa.on("adStart",(function(t){return e.sendAdEvent("event7",{adMeta:t.adMeta})})),this.powa.on("adComplete",(function(t){return e.sendAdEvent("event8",{adMeta:t.adMeta})})),this.powa.on("adSkip",(function(t){return e.send("event34",{adMeta:t.adMeta})}))}},{key:"powaListeners",value:function(){var e=this,t=this.powa,n=this.powa.getDataset(),o=this;new Ee({powa:t,va:o}),new Ge({powa:t,va:o}),this.powa.on("promoPlay",(function(t){e.userClickedToPlay=!0,e.send("event125")})),this.powa.on("fullscreen",this.trackFullscreen.bind(this)),this.powa.on("nextClick",(function(t){return e.nextClick=!0})),this.powa.on("prevClick",(function(t){return e.prevClick=!0})),this.powa.on("adStart",(function(t){return e.sendAdEvent("event7",{adMeta:t.adMeta})})),this.powa.on("adComplete",(function(t){return e.sendAdEvent("event8",{adMeta:t.adMeta})})),this.powa.on("adSkip",(function(t){return e.send("event34",{adMeta:t.adMeta})})),this.powa.on("adEnd",(function(t){return e.adEndVisibilityState=document.visibilityState})),this.powa.on("complete",this.initTimeIntervals.bind(this)),this.powa.on("muted",this.trackMute.bind(this)),this.powa.on("pause",this.trackPause.bind(this)),this.powa.on("play",this.trackUnpause.bind(this)),this.powa.on("adPause",this.trackAdPause.bind(this)),this.powa.on("adPlay",this.trackAdUnpause.bind(this)),this.powa.on("shareFacebook",(function(t){return e.send("event6")})),this.powa.on("shareTwitter",(function(t){return e.send("event6")})),this.powa.on("shareEmail",(function(t){return e.send("event6")})),this.powa.on("upNextDismissed",(function(t){return e.send("event168")})),this.powa.on("start",(function(t){e.scanPowa(),e.initFlags.bind(e),e.trackAutoplay.call(e,t),e.playCounter=!0===e.firstPlay?0:e.playCounter+1,e.firstPlay=!1,e.setTimeMarker("playerStart")})),this.powa.on("preview2-autoplay",(function(t){e.trackAutoplay.call(e,t)})),this.powa.on("loaded",(function(){e.scanPowa()})),this.powa.on("playlistLoaded",(function(t){e.scanPerformance()})),"live"===this.powa.getVideoData().video_type?this.powa.on("time",this.trackLiveTime):n.loopingVideo?this.powa.once("firstFrame",(function(t){return e.send("event9")})):n.continuousPlay||n.loop?(this.powa.once("firstFrame",(function(t){return e.send("event9")})),this.powa.once("playback25",(function(t){return e.send("event10")})),this.powa.once("playback50",(function(t){return e.send("event11")})),this.powa.once("playback75",(function(t){return e.send("event12")})),this.powa.once("playback100",(function(t){return e.send("event13")}))):(this.powa.on("firstFrame",(function(t){return e.send("event9")})),this.powa.on("playback25",(function(t){return e.send("event10")})),this.powa.on("playback50",(function(t){return e.send("event11")})),this.powa.on("playback75",(function(t){return e.send("event12")})),this.powa.on("playback100",(function(t){return e.send("event13")}))),this.powa.on("irisError",(function(){return e.send("irisError")})),this.powa.on("irisBidError",(function(){return e.send("irisBidError")})),this.powa.on("irisTimeout",(function(){return e.send("irisTimeout")})),new De({powa:t,va:o}),new Be({powa:t,va:o}),new Ye({powa:t,va:o}),new Ue({powa:t,va:o}),new Re({powa:t,va:o}),new tt({powa:t,va:o})}},{key:"inlinePlayerPlaylistListeners",value:function(){var e=this;window.wp_pb.register("video","pagePlaylistItemClicked",(function(t){e.scanPowa(),e.userClickedToPlay=!0,e.send("event125")}))}},{key:"powaVersionCheck",value:function(){var e=i()(window,"PoWa.VERSION",""),t=parseInt(e.split(".")[0]);(!t||t<3)&&console.warn("VA Minimum of PoWa3 required")}}])&&ot(t.prototype,n),e}(),st={};window.VideoAnalytics=window.VideoAnalytics||{version:"1.16.3",build:"e048ba1",init:function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};return st[e]?t.powaId&&st[e].registerPoWa(t.powaId):st[e]=new at(e,t),st[e]},static:{sendToNewRelic:t(),sendToOmniture:t(),sendToGoogle:be.send,sendToSplunk:ye.send}}}()}();