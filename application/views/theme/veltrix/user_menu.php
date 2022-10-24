<?php
$primary_menu = $this->Blueprint_system->get_user_menu(1);
$uri_1 = $this->uri->segment(1);
?>
<div class="vertical-menu mm-active">

    <div data-simplebar="init" class="h-100 mm-show">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: -17px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">

                            <!--- Sidemenu -->
                            <div id="sidebar-menu" class="mm-active">
                                <!-- Left Menu Start -->
                                <ul class="metismenu list-unstyled mm-show" id="side-menu">
                                    <?php foreach ($primary_menu as $value) { ?>
                                        <li class="menu-title"><?= $value['group_title'] ?></li>
                                        <li <?= $title == $value['title'] ? 'class="mm-active"'  : '' ?>>
                                            <a href="<?= $value['url'] !== '' ? $value['url'] : 'javascript: void(0);' ?>" <?= $title == $value['title'] ? 'class="has-arrow waves-effect mm-active"'  : 'class="has-arrow waves-effect"' ?> class="has-arrow waves-effect" aria-expanded="true">
                                                <i class="ti-email"></i>
                                                <span><?= $value['title'] ?></span>
                                            </a>
                                            <ul class="sub-menu mm-collapse" aria-expanded="false" style="">
                                                <?php $sub_menu = $this->Blueprint_system->get_user_menu(1, $value['ID']) ?>
                                                <?php foreach ($sub_menu as $val) { ?>
                                                    <li><a href="<?= $val['url'] ?>"><?= $val['title'] ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!-- Sidebar -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 966px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar simplebar-visible" style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar simplebar-visible" style="height: 133px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
        </div>
    </div>
</div>