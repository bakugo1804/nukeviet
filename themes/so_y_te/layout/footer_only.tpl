        <!-- BEGIN: lt_ie9 --><p class="chromeframe">{LANG.chromeframe}</p><!-- END: lt_ie9 -->
        <!-- BEGIN: cookie_notice --><div class="cookie-notice"><div><button onclick="cookie_notice_hide();">&times;</button>{COOKIE_NOTICE}</div></div><!-- END: cookie_notice -->
        <div id="timeoutsess" class="chromeframe">
            {LANG.timeoutsess_nouser}, <a onclick="timeoutsesscancel();" href="#">{LANG.timeoutsess_click}</a>. {LANG.timeoutsess_timeout}: <span id="secField"> 60 </span> {LANG.sec}
        </div>
        <div id="openidResult" class="nv-alert" style="display:none"></div>
        <div id="openidBt" data-result="" data-redirect=""></div>
        <!-- BEGIN: crossdomain_listener -->
        <script type="text/javascript">
        function nvgSSOReciver(event) {
            if (event.origin !== '{SSO_REGISTER_ORIGIN}') {
                return false;
            }
            if (
                event.data !== null && typeof event.data == 'object' && event.data.code == 'oauthback' &&
                typeof event.data.redirect != 'undefined' && typeof event.data.status != 'undefined' && typeof event.data.mess != 'undefined'
            ) {
                $('#openidResult').data('redirect', event.data.redirect);
                $('#openidResult').data('result', event.data.status);
                $('#openidResult').html(event.data.mess + (event.data.status == 'success' ? ' <span class="load-bar"></span>' : ''));
                $('#openidResult').addClass('nv-info ' + event.data.status);
                $('#openidBt').trigger('click');
            }
        }
        window.addEventListener('message', nvgSSOReciver, false);
        </script>
        <!-- END: crossdomain_listener -->

        <script src="/assets/js/jquery/jquery.min.js"></script>
        <script>var nv_base_siteurl="/",nv_lang_data="vi",nv_lang_interface="vi",nv_name_variable="nv",nv_fc_variable="op",nv_lang_variable="language",nv_module_name="news",nv_func_name="main",nv_is_user=0, nv_my_ofs=7,nv_my_abbr="+07",nv_cookie_prefix="nv4",nv_check_pass_mstime=1738000,nv_area_admin=0,nv_safemode=0,theme_responsive=0,nv_recaptcha_ver=2,nv_recaptcha_sitekey="",nv_recaptcha_type="image",XSSsanitize=1;</script>
        <script src="/assets/js/language/vi.js"></script>
        <script src="/assets/js/DOMPurify/purify3.js"></script>
        <script src="/assets/js/global.js"></script>
        <script src="/assets/js/site.js"></script>
        <script src="/themes/default/js/news.js"></script>
        <script src="/themes/default/js/main.js"></script>
        <script src="/themes/default/js/custom.js"></script>
        <script src="/themes/default/images/videoclips/jwplayer/jwplayer.js"></script>
        <script>jwplayer.key="KzcW0VrDegOG/Vl8Wb9X3JLUql+72MdP1coaag==";</script>
        <script src="/assets/js/jquery/jquery.metisMenu.js"></script>
        <script src="/themes/default/images/videoclips/flexslider/jquery.flexslider.js" defer></script>
        <script src="/themes/default/js/contact.js"></script>
        <script src="/themes/default/js/bootstrap.min.js"></script>

        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "url": "{NV_MY_DOMAIN}",
            "logo": "{NV_MY_DOMAIN}/assets/images/logo.png"
        }
        </script>

        <script>
        function loginFormLoad() {
            $.ajax({
                type: 'POST',
                url: nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=users&' + nv_fc_variable + '=login',
                cache: !1,
                data: {
                    nv_ajax: 1,
                    nv_redirect: ''
                },
                dataType: "html"
            }).done(function(a) {
                $("#tip .log-area").html(a);
                change_captcha()
            });
        }
        </script>

        <script type="text/javascript" data-show="after">
            $(function() {
                checkWidthMenu();
                $(window).resize(checkWidthMenu);
            });
        </script>

        <script type="text/javascript">
        $(function () {
            $('#menu_7').metisMenu({
                toggle: false
            });
        });
        </script>

        <script type="text/javascript">
        $(document).ready(function() {$("[data-rel='block_tooltip'][data-content!='']").tooltip({
            placement: "bottom",
            html: true,
            title: function(){return ( $(this).data('img') == '' ? '' : '<img class="img-thumbnail pull-left margin_image" src="' + $(this).data('img') + '" width="90" />' ) + '<p class="text-justify">' + $(this).data('content') + '</p><div class="clearfix"></div>';} 
        });});
        </script>

        <!-- Flexslider init and sizing scripts can remain in custom JS files, include minimal init if needed -->

        <!-- BEGIN: crossdomain_listener already added above -->
    </body>
</html>
