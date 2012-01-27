(function($) {
    $.desktop = {
        getWH: function() {
            this.WH = {
                w: $(window).width(),h: $(window).height()
            };
        },
        init: function() {
            var self = this;
            var percent = 0, timer = setInterval(function() {
                $('#startingTips').html(percent + '%');
                if (percent == 100) {
                    window.clearInterval(timer);
                }
                percent++;
            }, 30);
            //	setTimeout(function(){
            $('#startingCover').hide();
            //	},3500);
            this.resize();
            this.appButtonOrder();
            this.appSortable();
            $(window).resize(function() {
                self.resize();
            });
        },
        resize: function() {
            this.getWH();
            $('#desktopWrapper,#desktopsContainer,.desktopContainer,#zoomWallpaperGrid,#zoomWallpaper').css({width: this.WH.w,height: this.WH.h});
            $('.appListContainer').css({width: this.WH.w - 28,height: this.WH.h - 46});
            this.appButtonOrder();
        },
        log: function(e) {
            console.log(e);
        },
        appSortable: function() {
            var self = this;
            $(".appListContainer").sortable({
                items: ".appButton",
                appendTo: 'body',
                helper: "clone",
                start: function(event, ui) {
                    $(ui.item).show().css({'opacity': 0.5});
                },
                stop: function(event, ui) {
                    $(ui.item).css({'opacity': 1});
                    self.appButtonOrder();
                }
            }).disableSelection();
        },
        appButtonOrder: function() {
            var c = Math.floor(this.WH.h / 136), ri = -1;
            if (c < 1) {
                c = 1;
            }
            $(".appListContainer > .appButton").each(function(i) {
                var ci = i % c;
                if (ci == 0) {
                    ri++;
                }
                var _top = 112 * ci + 12;
                var _left = 142 * ri + 27;
                $(this).css({left: _left,top: _top});
            });
        }
    }
})(jQuery);

(function($) {
    $.widget("ui.iWindow", {
        options: {
            maxHeight: false,
            maxWidth: false,
            minHeight: 300,
            minWidth: 300,
            height: 520,
            autoOpen: false,
            modal: false,
            draggable: true,
            resizable: true,
            show: null,
            stack: true,
            title: '',
            appSrc: 'about:blank',
            taskIcon: 'about:blank',
            appendTo: null,
            one: false,
            modal: false,
            position: {
                my: 'center',
                at: 'center',
                collision: 'fit',
                // ensure that the titlebar is never outside the document
                using: function(pos) {
                    var topOffset = $(this).css(pos).offset().top;
                    if (topOffset < 0) {
                        $(this).css('top', pos.top - topOffset);
                    }
                }
            },
            width: 620,
            zIndex: 200
        },
        _create: function() {
            var self = this, options = self.options;
            
            self.appID = $(".window").length + 1;
            self.element.data('app', self.appID);
            self.element.data('close', false);
            var uiWindow = (self.uiWindow = $('<div></div>'))
            .attr('id', "appWindow_" + self.appID)
            .addClass('window')
            .css({display: 'none',visibility: 'visible',width: options.width,height: options.height})
            .appendTo(options.appendTo == null ? document.body : options.appendTo)
            .mousedown(function() {
                self.open();
            });
            var uiDivs = {
                'titleBar': null,
                'titleButtonBar': 'titleBar',
                'title': 'titleBar',
                'body': null
            };
            
            $.each(uiDivs, function(i, e) {
                var pobj = eval("self.uiWindow" + (e == null ? '' : ('_' + e)));
                self.createEel(i, "uiWindow", "div", "window", "window", pobj);
            });
            var appSrc = self.element.attr("href") || options.appSrc;
            var uiFrame = (self.uiFrame = $('<iframe id="iframeApp_' + self.appID + '" name="iframeApp_' + self.appID + '" class="iframeApp" frameborder="no" allowtransparency="true" scrolling="auto" hidefocus="" src="' + appSrc + '"></iframe>'))
            	.appendTo(self.uiWindow_body);
            var uiFrameFix = (self.uiFrameFix =$('<div id="window-iframeFix_' + self.appID + '" class="window-iframeFix"></div>'))
            	.appendTo(self.uiWindow_body);


            //'close','max','restore','min','fullscreen','restore_full'
            $.each(['close', 'max', 'min'], function(i, e) {
                self.createEel(e, "uiButton", "a", "ui_button", "ui_button window_action_button window", self.uiWindow_titleButtonBar).css({display: "block"});
            });
            
            $("#taskContainer,#taskContainerInner").width(114*self.appID);
            $(".taskGroup").removeClass('taskCurrent');
            
            self.taskGroup=$('<div class="taskGroup taskGroupAnaWidth"><div class="taskItemBox"><a class="taskItem fistTaskItem" href="#" onselectstart="return false"><div class="taskItemIcon"><img src=""><div class="taskItemIconState"></div></div><div class="taskItemTxt"></div></a></div></div>');
            var taskGroupImg= self.taskGroup.find("img"),
				taskItemTxt	= self.taskGroup.find(".taskItemTxt");

            self.taskGroup.click(function() {
            	self.open();
            }).attr("id","taskGroup_"+self.appID)
            .addClass("taskCurrent")
            .appendTo("#taskContainerInner");
            
            var taskIcon = self.element.attr("icon") || options.taskIcon;
            
            taskGroupImg.attr("src",taskIcon);
            taskItemTxt.text(options.title);

            self.uiButton_min.click(function() {
                self.uiWindow.hide();
            });
            
            self.uiButton_max.toggle(
            function() {
                self.max();
            }, function() {
                self.restore();
            });
            
            self.uiButton_close.click(function() {
                self.remove();
            });
            self.uiWindow_titleBar.dblclick(function() {
            	if(self.element.data('max')){
                	self.restore();
            	}else{
            		self.max();
            	}
            });
            self.uiWindow_title.text(options.title).addClass('titleText');
            self._makeDraggable();
            self._makeResizable();
            self._position(options.position);
            self._isOpen = false;
            return self;
        },
        test: function(e) {
            console.log(e);
        },
        createEel: function(n, o, e, i, c, p) {
            var obj = eval("this." + o + "_" + n + " = $('<" + e + "></" + e + ">')");
            obj.attr('id', i + "_" + n + "_" + this.appID).addClass(c + "_" + n).appendTo(p);
            return obj;
        },
        _init: function() {
            if (this.element.data('close')) {
                this._create();
            }
            
            if (this.options.autoOpen) {
                this.open();
            }
            return self;
        },
        isOpen: function() {
            return this._isOpen;
        },
        
        open: function() {
            var self = this, 
            options = self.options, 
            uiWindow = self.uiWindow;
            
            $("body").find(".window-iframeFix").show();
            this.uiFrameFix.hide();
            
            var zIndex = parseInt($('.window_current').css("z-index")) || this.options.zIndex;
            $('.window').removeClass('window_current');
            this.uiWindow.addClass('window_current').show().css({zIndex: zIndex + 1});
            
            $(".taskGroup").removeClass('taskCurrent');
            this.taskGroup.addClass("taskCurrent");

            if (options.one) {
                $('.window').remove();
            }
            this._isOpen = true;
            return self;
        },
        max: function() {
        	this.element.data('max', true);
        	this.element.data('offset', this.uiWindow.offset());
            this.uiWindow.css({width: this._width(),height: this._height(),left: "-73px",top:0});
            this.uiFrame.css({width:"100%",height:"100%"});
            this.uiButton_max.addClass("window_restore").removeClass("window_max");
        },
        restore: function() {
        	this.element.data('max', false);
            var offset = this.element.data('offset');
            this.uiWindow.css({width: this.options.width,height: this.options.height}).css(offset);
            this.uiFrame.css({width:"99%",height:"100%"});
            this.uiButton_max.addClass("window_max").removeClass("window_restore");
        },
        
        remove: function() {
            this.element.data('close', true);
            this.taskGroup.remove();
            this.uiWindow.remove();
        },
        destroy: function() {
            this.remove();
            this.element.removeData('close,app');
            return this;
        },
        _makeResizable: function(handles) {
            var self = this, 
            options = self.options;
            // .ui-resizable has position: relative defined in the stylesheet
            // but dialogs have to use absolute or fixed positioning
            //position = self.uiWindow.css('position');
            
            function filteredUi(ui) {
                return {
                    originalPosition: ui.originalPosition,
                    originalSize: ui.originalSize,
                    position: ui.position,
                    size: ui.size
                };
            }
            
            self.uiWindow.resizable({
                //cancel: '.ui-dialog-content',
                containment: 'document',
                iframeFix: true,
                alsoResize: self.uiFrame,
                maxWidth: options.maxWidth,
                maxHeight: options.maxHeight,
                minWidth: options.minWidth,
                minHeight: self._minHeight(),
                start: function(event, ui) {
                	//$("body").find("iframe").hide();
                	//self.uiFrame.hide();
                    $(this).addClass("ui-dialog-resizing");
                    self._trigger('resizeStart', event, filteredUi(ui));
                },
                resize: function(event, ui) {
                    self._trigger('resize', event, filteredUi(ui));
                },
                stop: function(event, ui) {
                	//$("body").find("iframe").show();
                	//self.uiFrame.show();
                    $(this).removeClass("ui-dialog-resizing");
                    options.height = $(this).height();
                    options.width = $(this).width();
                    self._trigger('resizeStop', event, filteredUi(ui));
                }
            })
            //.css('position', position)
            .find('.ui-resizable-se').addClass('ui-icon ui-icon-grip-diagonal-se');
        },
        _makeDraggable: function() {
            var self = this, 
            options = self.options, 
            doc = $(document), 
            heightBeforeDrag;
            
            function filteredUi(ui) {
                return {
                    position: ui.position,
                    offset: ui.offset
                };
            }
            
            self.uiWindow.draggable({
                cancel: '.window_titleButtonBar',
                handle: '.window_titleBar',
                iframeFix: true,
                start: function(event, ui) {
                    heightBeforeDrag = options.height === "auto" ? "auto" : $(this).height();
                    $(this).height($(this).height()).addClass("window_dragging");
                    self._trigger('dragStart', event, filteredUi(ui));
                },
                drag: function(event, ui) {
                    self._trigger('drag', event, filteredUi(ui));
                },
                stop: function(event, ui) {
                    options.position = [ui.position.left - doc.scrollLeft(), 
                        ui.position.top - doc.scrollTop()];
                    $(this).removeClass("window_dragging").height(heightBeforeDrag);
                    self._trigger('dragStop', event, filteredUi(ui));
                }
            });
        },
        _minHeight: function() {
            var options = this.options;
            
            if (options.height === 'auto') {
                return options.minHeight;
            } else {
                return Math.min(options.minHeight, options.height);
            }
        },
        _position: function(position) {
            var myAt = [], 
            offset = [0, 0], 
            isVisible;
            
            if (position) {
                if (typeof position === 'string' || (typeof position === 'object' && '0' in position)) {
                    myAt = position.split ? position.split(' ') : [position[0], position[1]];
                    if (myAt.length === 1) {
                        myAt[1] = myAt[0];
                    }
                    
                    $.each(['left', 'top'], function(i, offsetPosition) {
                        if (+myAt[i] === myAt[i]) {
                            offset[i] = myAt[i];
                            myAt[i] = offsetPosition;
                        }
                    });
                    
                    position = {
                        my: myAt.join(" "),
                        at: myAt.join(" "),
                        offset: offset.join(" ")
                    };
                }
                
                position = $.extend({}, $.ui.iWindow.prototype.options.position, position);
            } else {
                position = $.ui.iWindow.prototype.options.position;
            }

            // need to show the dialog to get the actual offset in the position plugin
            isVisible = this.uiWindow.is(':visible');
            if (!isVisible) {
                this.uiWindow.show();
            }
            this.uiWindow
            // workaround for jQuery bug #5781 http://dev.jquery.com/ticket/5781
            .css({top: 0,left: 0})
            .position($.extend({of: window}, position));
            if (!isVisible) {
                this.uiWindow.hide();
            }
        },
        _height: function() {
            var scrollHeight, offsetHeight;
            // handle IE 6
            if ($.browser.msie && $.browser.version < 7) {
                scrollHeight = Math.max(document.documentElement.scrollHeight, document.body.scrollHeight);
                offsetHeight = Math.max(document.documentElement.offsetHeight, document.body.offsetHeight);
                
                if (scrollHeight < offsetHeight) {
                    return $(window).height();
                } else {
                    return scrollHeight;
                }
            // handle "good" browsers
            } else {
                return $(document).height();
            }
        },
        
        _width: function() {
            var scrollWidth, offsetWidth;
            // handle IE
            if ($.browser.msie) {
                scrollWidth = Math.max(document.documentElement.scrollWidth, document.body.scrollWidth);
                offsetWidth = Math.max(document.documentElement.offsetWidth, document.body.offsetWidth);
                
                if (scrollWidth < offsetWidth) {
                    return $(window).width();
                } else {
                    return scrollWidth;
                }
            // handle "good" browsers
            } else {
                return $(document).width();
            }
        }
    });
    $.extend($.ui.iWindow, {
        version: "0.1.0"
    });
})(jQuery);
