/* Theme Switcher
 /*
 * this plugin add theme switcher window
 * change layout color, fonts, background from parameters.
 * Use cookie
 *
 * author: bumbella
 * version:1.0
 * plugin page: https://github.com/bumbella/theme-switcher
 *
 */
/* Theme Switcher
 /*
 * this plugin add theme switcher window
 * change layout color, fonts, background from parameters.
 * Use cookie
 *
 * author: bumbella
 * version:1.0
 * plugin page: https://github.com/bumbella/theme-switcher
 *
 */
+function ($) {

    themeSwitcher = {
        window: null,
        opt: null,
        /*
         * Defaults options
         */
        defaults: {
            windowPos: 'left',
            layoutColors: {
                title: 'Colors',
                name: ['Default', 'Green', 'Purple', 'Blue', 'Cian', 'Orange', 'Yellow'],
                code: ['#ffffff', '#79B550', '#A4206B', '#13699A', '#59B2E5', '#D35400', '#F1C40F'],
                show: true
            },
            layoutBoxedWide: {
                title: 'Layout',
                show: true
            },
            layoutBackgrounds: {
                title: 'Backgrounds',
                show: true
            },
            layoutFonts: {
                title: 'Fonts',
                name: ['Bitter', 'PT Sans', 'Six Caps', 'Yanone Kaffeesatz', 'Syncopate'],
                code: ['bitter', 'ptsans', 'sixcaps', 'yanonekaffeesatz', 'syncopate'],
                show: true
            }
        },
        /*
         * Get theme window html
         * @returns {String}
         */
        getThemeWindow: function () {

            var _self = this;

            var html = '<div id="theme-switcher" class="theme-switcher ' + this.opt.windowPos + '">' +
                    '<a href="#" class="theme-switcher-toggle"></a>' +
                    '<div class="theme-switcher-inner">';

            /*Colors section*/

            if (this.opt.layoutColors.show) {
                html += '<h4>' + this.opt.layoutColors.title + '</h4>';

                html += '<ul class="layout-colors">';

                $.each(this.opt.layoutColors['code'], function (key, value) {

                    if (_self.opt.layoutColors['name'][key]) {
                        var closeIcon = '';
                        if (_self.opt.layoutColors['name'][key] == 'Default') {
                            closeIcon = '<i class="xsicon icon-cancel"></i>';
                        }
                        html += '<li><a href="#" data-toggle="tooltip" data-placement="top" title="' + _self.opt.layoutColors['name'][key] + ' color" data-name="' + _self.opt.layoutColors['name'][key].toLowerCase() + '" data-color="' + value + '" style="background:' + value + ';" class="setlayoutcolor tooltip">' + closeIcon + '</a></li>';
                    }
                });

                html += '</ul>';

            }

            /*Boxed or wide section*/

            if (this.opt.layoutBoxedWide.show) {
                html += '<h4>' + this.opt.layoutBoxedWide.title + '</h4>' +
                        '<div class="layout-style">' +
                        '<div class="img-radio-button"><input type="radio" name="layout-style-boxed" class="setlayoutstyle" data-name="boxed" value="boxed" id="layout-style-boxed"><label for="layout-style-boxed">Boxed</label></div>' +
                        '<div class="img-radio-button"><input type="radio" name="layout-style-wide" class="setlayoutstyle" data-name="wide" value="wide" id="layout-style-wide"><label for="layout-style-wide">Wide</label></div>' +
                        '</div>';
            }

            /*Backgrounds section*/

            if (this.opt.layoutBackgrounds.show) {

                html += '<h4>' + this.opt.layoutBackgrounds.title + '</h4>' +
                        '<ul class="layout-backgrounds">';

                html += '<li><a href="#" data-toggle="tooltip" data-placement="top" title="Default background" data-name="default" data-bg="transparent" style="background-image:none;" class="setlayoutbackground tooltip"><i class="fa fa-times"></i></a></li>' +
                        '<li><a href="#" data-toggle="tooltip" data-placement="top" title="Sand" data-name="sand" data-bg="#79b550" style="" class="setlayoutbackground tooltip"></a></li>' +
                        '<li><a href="#" data-toggle="tooltip" data-placement="top" title="Diamond" data-name="diamond" data-bg="#a4206b" style="" class="setlayoutbackground tooltip"></a></li>' +
                        '<li><a href="#" data-toggle="tooltip" data-placement="top" title="Diagonal narrow" data-name="diagonalnarrow" data-bg="#13699a" style="" class="setlayoutbackground tooltip"></a></li>' +
                        '<li><a href="#" data-toggle="tooltip" data-placement="top" title="Diamond wide" data-name="diamondwide" data-bg="#13699a" style="" class="setlayoutbackground tooltip"></a></li>' +
                        '<li><a href="#" data-toggle="tooltip" data-placement="top" title="Arabian" data-name="arabian" data-bg="#13699a" style="" class="setlayoutbackground tooltip"></a></li>' +
                        '<li><a href="#" data-toggle="tooltip" data-placement="top" title="Strange" data-name="strange" data-bg="#13699a" style="" class="setlayoutbackground tooltip"></a></li>' +
                        '<li><a href="#" data-toggle="tooltip" data-placement="top" title="Tile" data-name="tile" data-bg="#13699a" style="" class="setlayoutbackground tooltip"></a></li>' +
                        '<li><a href="#" data-toggle="tooltip" data-placement="top" title="Linen" data-name="linen" data-bg="#13699a" style="" class="setlayoutbackground tooltip"></a></li>' +
                        '<li><a href="#" data-toggle="tooltip" data-placement="top" title="Stripes" data-name="stripes" data-bg="#13699a" style="" class="setlayoutbackground tooltip"></a></li>' +
                        '<li><a href="#" data-toggle="tooltip" data-placement="top" title="Squares" data-name="squares" data-bg="#13699a" style="" class="setlayoutbackground tooltip"></a></li>' +
                        '<li><a href="#" data-toggle="tooltip" data-placement="top" title="Image" data-name="image" data-bg="#13699a" style="" class="setlayoutbackground tooltip"></a></li>';

                html += '</ul>';

            }

            /*Fonts section*/

            if (this.opt.layoutFonts.show) {

                html += '<h4>' + this.opt.layoutFonts.title + ':</h4>' +
                        '<select class="form-control setlayoutfont">';

                /* layout fonts append */

                $.each(_self.opt.layoutFonts['name'], function (key, value) {
                    if (_self.opt.layoutFonts['code'][key]) {
                        html += '<option value="' + _self.opt.layoutFonts['code'][key] + '">' + value + '</option>'
                    }
                });

                html += '</select>';

            }

            html += '</div>' +
                    '</div>';

            return html;

        },
        /*
         * Initialize application
         * @returns {boolean}
         */
        init: function (attr) {

            this.opt = $.extend(this.defaults, attr);

            $('body').prepend(this.getThemeWindow());

            this.window = jQuery('#theme-switcher');

            $('.theme-switcher-toggle', this.window).on('click', function (e) {
                e.preventDefault();
                themeSwitcher.toggleWindow($(this));
            });

            $('.setlayoutcolor', this.window).on('click', function (e) {
                e.preventDefault();
                themeSwitcher.changeColorTo($(this).data('name'));
            });

            $('.setlayoutbackground', this.window).on('click', function (e) {
                e.preventDefault();
                themeSwitcher.changeBackgroundTo($(this).data('name'));
            });

            $('.setlayoutbackground', this.window).on('click', function (e) {
                e.preventDefault();
                themeSwitcher.changeBackgroundTo($(this).data('name'));
            });

            $('.setlayoutstyle', this.window).on('change', function (e) {
                e.preventDefault();
                themeSwitcher.changeStyleTo($(this).data('name'));
            });

            $('.setlayoutfont', this.window).on('change', function () {
                themeSwitcher.changeFontTo($(this).val());
            });

            return true;

        },
        /*
         * Run themeSwitcher
         *
         * @param {Array} $attr
         * @return {boolean}
         */
        run: function ($attr) {

            this.init($attr);

            if (jQuery.cookie('themeswitcher') == 'active') {
                this.window.addClass('active');
            } else {
                if (jQuery.cookie('themeswitcher') != undefined) {
                    this.window.removeClass('active');
                }
            }

            if (jQuery.cookie('layoutcolor') != undefined) {

                this.changeColorTo(jQuery.cookie('layoutcolor'))

            } else {

                if ($('body').attr('class') != undefined) {
                    var $match = $('body').attr('class').match(/layoutcolor-\w*(\b|$)/);
                    if ($match != null) {
                        var $colorname = $match[0].split('-');
                        this.changeColorTo($colorname[1]);
                    }
                }

            }

            if (jQuery.cookie('layoutbackground') != undefined) {

                this.changeBackgroundTo(jQuery.cookie('layoutbackground'))

            } else {

                if ($('body').attr('class') != undefined) {
                    var $match = $('body').attr('class').match(/layoutbackground-\w*(\b|$)/);
                    if ($match != null) {
                        var $bg = $match[0].split('-');
                        this.changeBackgroundTo($bg[1]);
                    }
                }

            }

            if (jQuery.cookie('layoutstyle') != undefined) {

                this.changeStyleTo(jQuery.cookie('layoutstyle'))

            } else {

                if ($('.xs-main-content').hasClass('boxed')) {
                    this.changeStyleTo('boxed');
                }

                if ($('.xs-main-content').hasClass('container-fluid')) {
                    this.changeStyleTo('wide');
                }

            }

            if (jQuery.cookie('layoutfont') != undefined) {

                this.changeFontTo(jQuery.cookie('layoutfont'))

            } else {

                if ($('body').attr('class') != undefined) {
                    var $match = $('body').attr('class').match(/layoutfont-\w*(\b|$)/);
                    if ($match != null) {
                        var $name = $match[0].split('-');
                        this.changeFontTo($name[1]);
                    }

                }

            }

            return true;

        },
        /*
         * Change boxed or wide layout style
         * Change .xs-main-content class container-fluid or container
         *
         * @param {String} $name
         * @returns {boolean}
         */
        changeStyleTo: function ($name) {

            if ($name == 'boxed') {
                $('.xs-main-content').removeClass('container-fluid');
                $('.xs-main-content').addClass('boxed');
            }

            if ($name == 'wide') {
                $('.xs-main-content').removeClass('boxed');
                $('.xs-main-content').addClass('container-fluid');
            }

            $('.layout-style input', this.window).each(function () {
                var $this = $(this);
                if ($this.data('name') == $name) {
                    $this.prop('checked', true);
                } else {
                    $this.prop('checked', false);
                }
            });

            jQuery.cookie('layoutstyle', $name, {path: '/'});

        },
        /*
         * Change layout color. Add or remove body class layoutcolor-*
         *
         * @param {String} $colorname
         * @returns {undefined}
         */
        changeColorTo: function ($colorname) {

            if ($('body').attr('class') != undefined) {
                var $match = $('body').attr('class').match(/layoutcolor-\w*(\b|$)/);
                if ($match != null) {
                    $('body').removeClass($match[0]);
                }
            }

            $('body').addClass('layoutcolor-' + $colorname);

            $('.setlayoutcolor', this.window).each(function () {
                var $this = $(this);
                if ($this.data('name') == $colorname) {
                    $this.addClass('active');
                } else {
                    $this.removeClass('active');
                }
            });

            jQuery.cookie('layoutcolor', $colorname, {path: '/'});

        },
        changeFontTo: function ($name) {

            if ($('body').attr('class') != undefined) {
                var $match = $('body').attr('class').match(/layoutfont-\w*(\b|$)/);

                if ($match != null) {
                    $('body').removeClass($match[0]);
                }
            }

            $('body').addClass('layoutfont-' + $name);

            $('.setlayoutfont option', this.window).each(function () {
                var $this = $(this);
                if ($this.val() == $name) {
                    $this.prop('selected', true);
                } else {
                    $this.prop('selected', false);
                }
            });

            jQuery.cookie('layoutfont', $name, {path: '/'});

        },
        changeBackgroundTo: function ($name) {

            if ($('body').attr('class') != undefined) {
                var $match = $('body').attr('class').match(/layoutbackground-\w*(\b|$)/);
                if ($match != null) {
                    $('body').removeClass($match[0]);
                }
            }

            $('body').addClass('layoutbackground-' + $name);

            $('.setlayoutbackground', this.window).each(function () {
                var $this = $(this);
                if ($this.data('name') == $name) {
                    $this.addClass('active');
                } else {
                    $this.removeClass('active');
                }
            });

            jQuery.cookie('layoutbackground', $name, {path: '/'});

        },
        toggleWindow: function ($this) {

            this.window.toggleClass('active');

            if (this.window.hasClass('active')) {
                jQuery.cookie('themeswitcher', 'active', {path: '/'});
            } else {
                jQuery.cookie('themeswitcher', 'noactive', {path: '/'});
            }
        }
    }

}(jQuery);