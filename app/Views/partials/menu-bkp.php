<nav class="main-menu clearfix">
    <div class="main-menu-wrapper clearfix">
        <div class="main-menu-wrapper__left">
            <div class="main-menu-wrapper__logo">
                <a href="<?= base_url() ?>">
                    <object type="image/svg+xml" data="<?= base_url('assets/images/brand/logo-credenciamento-sem-fila.svg') ?>" class="logo" alt="Credenciamento Sem Fila - CSF - Logotipo">
                        Credenciamento Sem Fila - CSF
                    </object>
                </a>
            </div>
            <div class="main-menu-wrapper__main-menu">
                <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                <ul class="main-menu__list">
                    <?php if (!empty($menuTree)): ?>
                        <?php foreach ($menuTree as $menuItem): ?>
                            <li>
                                <a href="<?= base_url($menuItem['link']) ?>"><?= $menuItem['title'] ?></a>
                                <?php if (!empty($menuItem['children'])): ?>
                                    <ul>
                                        <?php foreach ($menuItem['children'] as $child): ?>
                                            <li><a href="<?= base_url($child['link']) ?>"><?= $child['title'] ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>Nenhum item de menu disponível</li>
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
                    <h5><a href="https://api.whatsapp.com/send?phone=5511983219854&text=">11 98321.9854</a></h5>
                </div>
            </div>
        </div>
    </div>
</nav>