<?php if(isset($page) && isset($bundle) && isset($content)): ?>
    <?php $bundle->start(); ?>
        <script type="text/javascript" src="assets/src/vendor/blz-fire/base.js"></script>
        <script type="text/javascript" src="assets/src/vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="assets/src/js/base.js"></script>
        <link media="screen" type="text/css" href="assets/src/css/blink-stop.css">
        <link media="screen" type="text/css" href="assets/src/css/custom-scrollbar.css">
        <link media="screen" type="text/css" href="assets/src/css/base.css">
    <?php $bundle->end(); ?>
    <!DOCTYPE HTML>
    <?php if(Layout_Site::enable_schema === true): ?>
        <html lang="<?php echo Layout_Site::site_lang; ?>" dir="<?php echo Layout_Site::site_dir; ?>" itemscope itemtype="https://schema.org/Organization">
    <?php else: ?>
        <html lang="<?php echo Layout_Site::site_lang; ?>" dir="<?php echo Layout_Site::site_dir; ?>">
    <?php endif; ?>
    <?php if(!empty($page)): ?>
            <head>
                <!-- Charset & Viewport -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
                <!-- // -->
                <!-- DNS Preload/Prefetch -->
                <?php foreach(Layout_Site::prefetch_list as $elem): ?>
                    <link rel="dns-prefetch" href="//<?php echo $elem; ?>/">
                    <link rel="preconnect" href="https://<?php echo $elem; ?>/">
                <?php endforeach; ?>
                <!-- // -->
                <!-- Organizational Schema -->
                <?php if(Layout_Site::enable_schema === true): ?>
                    <script type="application/ld+json">
                        {
                            "@context": "http://www.schema.org",
                            "@type": "Organization",
                            "name": "<?php echo Layout_Site::get_company(); ?>",
                            "url": "<?php echo Layout_Site::get_brand_site(); ?>",
                            "logo": "<?php echo Layout_Site::image(1); ?>",
                            "description": "<?php echo Layout_Site::motto; ?>"
                        }
                    </script>
                <?php endif; ?>
                <!-- // -->
                <!-- Tailwind CSS -->
                <link rel="stylesheet" href="<?php echo Uri::base() . 'assets/src/vendor/tailwind/tailwind.min.css'; ?>">
                <!-- // -->
                <!-- Material Design Icons -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css"
                    integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY=" crossorigin="anonymous" >
                <!-- // -->
                <!-- Publishing Info -->
                <link rel="author" href="<?php echo Layout_Site::get_company(); ?>">
                <link rel="publisher" href="<?php echo Layout_Site::get_company(); ?>">
                <!-- // -->
                <!-- Site-wide Config -->
                <meta name="theme-color" content="<?php echo Layout_Site::site_color; ?>">
                <meta name="msapplication-TileColor" content="<?php echo Layout_Site::site_color; ?>">
                <meta name="apple-mobile-web-app-title" content="<?php echo Layout_Site::site_name; ?>">
                <meta name="robots" content="index,follow">
                <meta name="googlebot" content="index,follow">
                <meta name="google" content="notranslate">
                <meta http-equiv="x-ua-compatible" content="ie=edge">
                <meta name="mobile-web-app-capable" content="yes">
                <meta name="format-detection" content="telephone=no">
                <meta name="apple-mobile-web-app-status-bar-style" content="black">
                <meta name="skype_toolbar" content="skype_toolbar_parser_compatible">
                <meta name="msapplication-TileImage" content="<?php echo Layout_Site::favicon; ?>?w=144&h=144">
                <meta name="msapplication-config" content="<?php echo Uri::base(); ?>assets/conf/browserconfig.xml">
                <link rel="manifest" href="<?php echo Uri::base(); ?>assets/conf/manifest.json">
                <!-- // -->
                <!-- Icons -->
                <link rel="icon" href="<?php echo Layout_Site::favicon; ?>">
                <link rel="apple-touch-icon" href="<?php echo Layout_Site::favicon; ?>?w=180&h=180">
                <link rel="apple-touch-startup-image" href="<?php echo Layout_Site::image(4); ?>">
                <link rel="apple-touch-startup-image" href="<?php echo Layout_Site::image(3); ?>?w=375&h=667" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)">
                <link rel="apple-touch-icon" sizes="57x57" href="<?php echo Layout_Site::favicon; ?>?w=57&h=57">
                <link rel="apple-touch-icon" sizes="60x60" href="<?php echo Layout_Site::favicon; ?>?w=60&h=60">
                <link rel="apple-touch-icon" sizes="72x72" href="<?php echo Layout_Site::favicon; ?>?w=72&h=72">
                <link rel="apple-touch-icon" sizes="76x76" href="<?php echo Layout_Site::favicon; ?>?w=76&h=76">
                <link rel="apple-touch-icon" sizes="114x114" href="<?php echo Layout_Site::favicon; ?>?w=114&h=114">
                <link rel="apple-touch-icon" sizes="120x120" href="<?php echo Layout_Site::favicon; ?>?w=120&h=120">
                <link rel="apple-touch-icon" sizes="144x144" href="<?php echo Layout_Site::favicon; ?>?w=144&h=144">
                <link rel="apple-touch-icon" sizes="152x152" href="<?php echo Layout_Site::favicon; ?>?w=152&h=152">
                <link rel="apple-touch-icon" sizes="180x180" href="<?php echo Layout_Site::favicon; ?>?w=180&h=180">
                <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo Layout_Site::favicon; ?>?w=192&h=192">
                <link rel="icon" type="image/png" sizes="32x32" href="<?php echo Layout_Site::favicon; ?>?w=32&h=32">
                <link rel="icon" type="image/png" sizes="96x96" href="<?php echo Layout_Site::favicon; ?>?w=96&h=96">
                <link rel="icon" type="image/png" sizes="16x16" href="<?php echo Layout_Site::favicon; ?>?w=16&h=16">
                <!-- // -->
                <!-- Bundled CSS File -->
                    <?php echo $bundle->renderCss(); ?>
                <!-- // -->
                <?php if(isset($t) && isset($d)): ?>
                <!-- Custom Page Meta -->
                <title><?php echo $t; ?></title>
                <meta name="description" content="<?php echo $d; ?>">
                <!-- // -->
                <!-- Twitter -->
                <meta name="twitter:card" content="summary">
                <meta name="twitter:site" content="@<?php echo Layout_Site::social['twitter']; ?>">
                <meta name="twitter:creator" content="@<?php echo Layout_Site::social['twitter']; ?>">
                <meta name="twitter:url" content="<?php echo Util_Url::get_url(); ?>">
                <meta name="twitter:title" content="<?php echo $t; ?>">
                <meta name="twitter:description" content="<?php echo $d; ?>">
                <meta name="twitter:image" content="<?php echo Layout_Site::image(3); ?>">
                <meta name="twitter:image:alt" content="<?php echo Layout_Site::motto; ?>">
                <!-- // -->
                <!-- Facebook -->
                <meta property="fb:app_id" content="<?php echo Layout_Site::fb_app_id; ?>">
                <meta property="og:url" content="<?php echo Util_Url::get_url(); ?>">
                <meta property="og:type" content="website">
                <meta property="og:title" content="<?php echo $t; ?>">
                <meta property="og:image" content="<?php echo Layout_Site::image(3); ?>">
                <meta property="og:image:alt" content="<?php echo Layout_Site::motto; ?>">
                <meta property="og:description" content="<?php echo $d; ?>">
                <meta property="og:site_name" content="<?php echo Layout_Site::site_name; ?>">
                <meta property="og:locale" content="en_US">
                <meta property="article:author" content="<?php echo Layout_Site::get_company(); ?>">
                <!-- // -->
                <?php endif; ?>
                <!-- IE Polyfill -->
                    <!--[if IE]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
                <!-- // -->
            </head>
        <?php endif; ?>
        <?php if(!empty($content)): ?>
            <body>
                <!-- // -->
                <?php if(isset($body)): echo $body; endif; ?>
                <!-- // -->
                <!-- JS Includes -->
                <section id="blz-js">
                    <!-- // -->
                    <!-- Bundled JS File -->
                    <?php echo $bundle->renderJs(); ?>
                    <!-- // -->
                    <!-- No Script Warning -->
                    <div id="blz-nojs">
                        <noscript>
                            <h1>Error!</h1>
                            <p>Please enable Javascript, for the best browsing experience.</p>
                        </noscript>
                    </div>
                    <!-- // -->
                    <!-- Instant Page (instant.page) [Only included in Production] -->
                    <?php if($e === true): ?>
                        <script src="//instant.page/5.1.0" type="module" 
                        integrity="sha384-by67kQnR+pyfy8yWP4kPO12fHKRLHZPfEsiSXR8u2IKcTdxD805MGUXBzVPnkLHw"></script>
                    <?php endif; ?>
                    <!-- // -->
                </section>
                <!-- // -->
            </body>
        <?php endif; ?>
    </html>
<?php endif; ?>