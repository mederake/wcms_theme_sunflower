<?php
/* @var Wcms $Wcms */
global $Wcms;



$Wcms->addListener('menu', 'sunflowerMenu');


function sunflowerMenu() {
    /* @var Wcms $Wcms */
    global $Wcms;

    $output = '';
    foreach ($Wcms->get('config', 'menuItems') as $item) {
        if ($item->visibility === 'hide') {
            continue;
        }
        $output .= renderSunflowerMenuPageNavMenuItem($item);
    }

    return [
        '<ul id="mainmenu" class="navbar-nav mr-auto">' .
            $output .
        '</ul>'
    ];

}

function renderSunflowerMenuPageNavMenuItem(object $item, string $parentSlug = ''): string
{
    /* @var Wcms $Wcms */
    global $Wcms;

    $subpages = $visibleSubpage = false;
    if (property_exists($item, 'subpages') && !empty((array)$item->subpages)) {
        $subpages = $item->subpages;
        $visibleSubpage = $subpages && in_array('show', array_column((array)$subpages, 'visibility'));
    }

    $parentSlug .= $subpages ? $item->slug . '/' : $item->slug;
    $subpagesClass = $visibleSubpage ? 'menu-item-has-children dropdown' : '';
    $activeClass = ($Wcms->currentPage === $item->slug ? 'active' : '');

    $linkUrl = Wcms::url($parentSlug);

    $output = '<li class="nav-item ' . $activeClass . $subpagesClass . '">
						<a class="nav-link" href="' . Wcms::url($parentSlug) . '">' . $item->name . '</a>';

    $output = <<<menulitemplate

<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item menu-item-type-custom menu-item-object-custom nav-item $subpagesClass $activeClass">
    
menulitemplate;

    if ($visibleSubpage) {
        $output .=<<<submenutemplate

<a title="$item->name" href="$linkUrl" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link" >$item->name</a>

<div class="submenu-opener" data-bs-toggle="dropdown"><i class="fas fa-angle-down"></i></div>
    <div class="dropdown-menu dropdown-menu-level-0">
        <div class="dropdown-menu-spacer"></div>
        <ul role="menu">

submenutemplate;

        foreach ($subpages as $subpage) {
            if ($subpage->visibility === 'hide') {
                continue;
            }
            $output .= renderSunflowerMenuPageNavMenuItem($subpage, $parentSlug);
        }
        $output .= '</ul></div>';
    } else {
        $output .= '<a title="' . $item->name. '" href="'. $linkUrl .'" class="nav-link">'. $item->name .'</a>';
    }

    $output .= '</li>';

    return $output;
}