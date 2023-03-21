<?php
/* @var Wcms $Wcms */
global $Wcms;
?>
<?php
$baseUrl =
    ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 'https://' : 'http://') .
    $_SERVER['SERVER_NAME'] .
    ((isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] !== '80') ? ':' . $_SERVER['SERVER_PORT'] : '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Encoding, browser compatibility, viewport -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Search Engine Optimization (SEO) -->
    <meta name="title" content="<?= $Wcms->get('config', 'siteTitle') ?> - <?= $Wcms->page('title') ?>"/>
    <meta name="description" content="<?= $Wcms->page('description') ?>">
    <meta name="keywords" content="<?= $Wcms->page('keywords') ?>">
    <meta property="og:url" content="<?= $this->url() ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="<?= $Wcms->get('config', 'siteTitle') ?>"/>
    <meta property="og:title" content="<?= $Wcms->page('title') ?>"/>
    <meta name="twitter:site" content="<?= $this->url() ?>"/>
    <meta name="twitter:title" content="<?= $Wcms->get('config', 'siteTitle') ?> - <?= $Wcms->page('title') ?>"/>
    <meta name="twitter:description" content="<?= $Wcms->page('description') ?>"/>

    <!-- Website and page title -->
    <title>
        <?= $Wcms->get('config', 'siteTitle') ?> - <?= $Wcms->page('title') ?>
    </title>

    <!-- Admin CSS -->
    <?= $Wcms->css() ?>

    <!-- Theme CSS -->
    <link rel="stylesheet" as="style" href="<?= $Wcms->asset('css/style_sunflower.css') ?>">
    <link rel="stylesheet" as="style" href="<?= $Wcms->asset('css/style.css') ?>">
</head>

<body>
<!-- Admin settings panel and alerts -->
<?= $Wcms->settings() ?>

<?= $Wcms->alerts() ?>
<div id="page" class="site">

    <section id="topMenu">
        <div class="container-fluid bloginfo bg-primary">
            <div class="container d-flex align-items-center">
                <a class="img-container" href="<?= $baseUrl ?>">
                    <img src="<?= $Wcms->asset('css/assets/img/sunflower.svg') ?>" class="" alt="Logo">
                </a>
                <div>
                    <a href="<?= $baseUrl ?>" class="d-block h5 text-white bloginfo-name no-link">
                        <?= $Wcms->get('config', 'siteTitle') ?>
                    </a>
                    <a href="<?= $baseUrl ?>" class="d-block text-white mb-0 bloginfo-description no-link">
                        Offener Frauenkreis der Grünen Gelsenkirchen
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div id="navbar-sticky-detector"></div>
    <nav class="navbar navbar-main navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="<?= $baseUrl ?>">
                <img src="<?= $Wcms->asset('css/assets/img/sunflower-dark.svg') ?>" alt="Sonnenblume - Logo">
            </a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mainmenu-container" aria-controls="mainmenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                <i class="fas fa-times close"></i>
                <i class="fas fa-bars open"></i>
            </button>

            <div class="collapse navbar-collapse" id="mainmenu-container">
                <ul id="mainmenu" class="navbar-nav mr-auto">
                    <?= $Wcms->menu() ?>
                </ul>
            </div>
        </div>
    </nav>


    <div id="content" class="container styled-layout mt-5">

        <div class="row">
            <div class="col-12">

                <!-- Main content for each page -->
                <?= $Wcms->page('content') ?>

            </div>

        </div>

    </div>


    <div class="container-fluid bg-darkgreen p-5 text-white mt-5">
        <aside id="secondary" class="widget-area container">
            <?= $Wcms->block('subside') ?>
        </aside>
    </div>
    <footer id="colophon" class="site-footer">
        <div class="container site-info">
            <div class="row">
                <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-start">
                </div>
                <div class="col-12 col-md-4 p-2 justify-content-center d-flex">
                </div>
                <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-end">
                    <nav class="navbar navbar-top navbar-expand-md">
                        <div class="text-center">
                            <ul id="footer2" class="navbar-nav small">
                                <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"
                                    id="menu-item-2074"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2074 nav-item">
                                    <a title="Impressum" href="/impressum/" class="nav-link">Impressum</a>
                                </li>
                                <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"
                                    id="menu-item-2073"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-privacy-policy menu-item-2073 nav-item">
                                    <a title="Datenschutzerklärung"
                                       href="/datenschutz/" class="nav-link">Datenschutzerklärung</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-4 mb-4">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-8 col-md-10">
                    <p class="small">
                        <?= $Wcms->footer() ?>
                    </p>
                </div>
                <div class="col-4 col-md-2">

                    <img src="https://sunflower-theme.de/wp-content/themes/sunflower/assets/img/logo-diegruenen.svg"
                         class="img-fluid" alt="Logo Bündnis 90/Die Grünen">
                </div>
            </div>
        </div>
    </footer>

</div>

<!-- Admin JavaScript. More JS libraries can be added below -->
<script type="text/javascript" src="<?= $Wcms->asset('js/jquery-slim/dist/jquery.slim.min.js') ?>"></script>
<script type="text/javascript" src="<?= $Wcms->asset('js/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?= $Wcms->asset('js/@popperjs/core/dist/umd/popper.min.js') ?>"></script>
<script type="text/javascript" src="<?= $Wcms->asset('js/frontend.js') ?>"></script>
<?= $Wcms->js() ?>

</body>
</html>
