<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= xss_clean($title) . ' | ' . xss_clean($this->settings['site_title']) . ' | ' . addslashes(xss_clean($description)); ?></title>
        <meta name="msapplication-TileColor" content="#206bc4"/>
        <meta name="theme-color" content="#206bc4"/>
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="mobile-web-app-capable" content="yes"/>
        <meta name="HandheldFriendly" content="True"/>
        <meta name="MobileOptimized" content="320"/>
        <meta http-equiv='content-language' content='en-gb'>
        <meta name="robots" content="index,follow,archive"/>
        <meta name="googlebot" content="index,follow" />
        <meta name="bingbot" content="index,follow" />
        <meta name="google-site-verification" content="UgjHb0QFIKOzEsSaZjNmJG7a3cUJN5OHN3ynMT2D4ZY">
        <link rel="icon" href="<?= base_url('img/'. $this->settings['favicon'])?>" type="image/x-icon"/>
        <link rel="shortcut icon" href="<?= base_url('img/'. $this->settings['favicon'])?>" type="image/x-icon"/>
        
        <meta name="author" content="<?= xss_clean($author) ?>"/>
        <meta property="og:title" content="<?= xss_clean($title) . ' | ' . xss_clean($this->settings['site_title']) ?>" />
        <meta name="description" content="<?php echo addslashes(xss_clean($description)); ?>"/>
        <meta name="tag" content="<?= xss_clean($keywords) ?>"/>
        <meta property="og:url" content="<?= ($url) ?>" />
        <meta property="og:site_name" content="<?= $this->settings['site_title'] ?>" />
        <link rel="alternate" type="application/rss+xml" title="<?= $this->settings['site_title'] ?> » Feed" href="<?= ($url) ?>feed/" />
        <link rel="alternate" type="application/rss+xml" title="<?= $this->settings['site_title'] ?> » <?= xss_clean($title) ?>" href="<?= ($url) ?>feed/" />
        
        <!-- Facebook -->
        <meta property="og:url"                content="<?= ($url) ?>" />
        <meta property="og:type"               content="article" />
        <meta property="og:title"              content="<?= $title ?>" />
        <meta property="og:description"        content="<?php echo addslashes(xss_clean($description)); ?>" />
        <meta property="og:image"              content="" />
        <!-- Facebook -->

        <!--DNS Prefetch for Google Adsense-->
        <link rel="dns-prefetch" href="//www.google-analytics.com">
        <link rel="dns-prefetch" href="//ssl.google-analytics.com">
        <link rel="dns-prefetch" href="//pagead2.googlesyndication.com">
        <link rel="dns-prefetch" href="//googleads.g.doubleclick.net">
        <link rel="dns-prefetch" href="//tpc.googlesyndication.com">
        <link rel="dns-prefetch" href="//stats.g.doubleclick.net">
        <link rel="dns-prefetch" href="//www.gstatic.com">
        <!--DNS Prefetch for Google Adsense-->
        <!--DNS Prefetch for Google facebook-->
        <link rel="dns-prefetch" href="//fbstatic-a.akamaihd.net">
        <link rel="dns-prefetch" href="//www.facebook.com">
        <link rel="dns-prefetch" href="//connect.facebook.net">
        <link rel="dns-prefetch" href="//static.ak.facebook.com">
        <link rel="dns-prefetch" href="//static.ak.fbcdn.net">
        <link rel="dns-prefetch" href="//s-static.ak.facebook.com">
        <!--DNS Prefetch for Google facebook-->
        
        
        <!--Font-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"> 

        <link rel="stylesheet" href="<?= base_url('dist/plugins/bootstrap/css/bootstrap.min_1.css') ?>">
        <link rel="stylesheet" href="<?= base_url('dist/plugins/overlayScrollbars/css/OverlayScrollbars.css') ?>">
        <link rel="stylesheet" href="<?= base_url('dist/plugins/fontawesome-free/css/all.min.css') ?>">
        <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
        <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
        <!-- <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script> -->
        
        <link rel="stylesheet" href="<?= base_url('dist/css/theme.css') ?>">
        
         <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url() ?>dist/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>dist/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>dist/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-46953878-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-46953878-1');
        </script>

        <!-- Google Tag Manager -->
        <script>(function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({'gtm.start':
                            new Date().getTime(), event: 'gtm.js'});
                var f = d.getElementsByTagName(s)[0],
                        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-T854QS7');</script>
        <!-- End Google Tag Manager -->

        <script data-ad-client="ca-pub-3794927430690735" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    </head>