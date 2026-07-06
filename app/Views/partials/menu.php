<nav class="main-menu clearfix">
    <div class="main-menu-wrapper clearfix">
        <div class="main-menu-wrapper__left">
            <div class="main-menu-wrapper__logo">
                <a href="<?= base_url('/') ?>">
                    <object type="image/svg+xml" data="<?= base_url('assets/images/brand/logo-credenciamento-sem-fila.svg') ?>" class="logo" style="pointer-events: none;">
                        <img src="<?= base_url('assets/images/brand/logo-credenciamento-sem-fila.svg') ?>" alt="Credenciamento Sem Fila - CSF - Logotipo">
                    </object>
                </a>
            </div>

            <div class="main-menu-wrapper__main-menu">
                <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                <ul class="main-menu__list">
                    <?php if (!empty($menuTree)): ?>
                        <?php foreach ($menuTree as $menuItem): ?>
                            <?php if ($menuItem['show_in_menu']): ?>
                                <?php
                                $isActive = (base_url($menuItem['link']) === current_url()) || (base_url('/') === current_url() && $menuItem['link'] === '/') ? 'active' : '';
                                ?>
                                <li class="<?= !empty($menuItem['children']) ? 'dropdown' : '' ?> <?= $isActive ?>">
                                    <a href="<?= !empty($menuItem['link']) && $menuItem['link'] !== '#' ? base_url($menuItem['link']) : '#' ?>">
                                        <?= esc($menuItem['title_menu']) ?>
                                    </a>

                                    <?php if (!empty($menuItem['children'])): ?>
                                        <ul class="dropdown-menu">
                                            <?php foreach ($menuItem['children'] as $child): ?>
                                                <?php if ($child['show_in_menu']): ?>
                                                    <?php
                                                    $isChildActive = (current_url() === base_url($child['link'])) ? 'active' : '';
                                                    ?>
                                                    <li class="<?= $isChildActive ?>"><a href="<?= base_url($child['link']) ?>"><?= esc($child['title_menu']) ?></a></li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <div class="main-menu-wrapper__right">
            <div class="main-menu-wrapper__call">
                <div class="main-menu-wrapper__call-icon">
                    <span class="icon-chatting"></span>
                </div>
                <div class="main-menu-wrapper__call-number">
                    <p>Fale conosco</p>
                    <h5><a href="https://api.whatsapp.com/send?phone=5511914974980" target="_blank">11 91497.4980</a></h5>
                </div>
            </div>
        </div>
    </div>
</nav>