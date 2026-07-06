<div class="team-one-container">
    <div class="section-title text-center">
        <span class="section-title__tagline">Time de experts</span>
        <h2 class="section-title__title">A equipe do Credenciamento Sem Fila</h2>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="team-one__carousel owl-theme owl-carousel">
                <?php if (!empty($teamItems)): ?>
                    <?php foreach ($teamItems as $member): ?>
                        <!--Team One Single-->
                        <div class="team-one__single">
                            <div class="team-one__img">
                                <img src="<?= base_url('assets/images/team/' . $member['photo']) ?>" alt="<?= $member['name'] ?>">
                            </div>
                            <div class="team-one__content">
                                <h4 class="team-one__name"><?= $member['name'] ?></h4>
                                <p class="team-one__title"><?= $member['position'] ?></p>
                            </div>
                            <div class="team-one__hover">
                                <h4 class="team-one__hover-name"><?= $member['name'] ?></h4>
                                <p class="team-one__hover-title"><?= $member['position'] ?></p>
                                <div class="team-one__social">
                                    <?php if (!empty($member['linkedin'])): ?>
                                        <a href="<?= $member['linkedin'] ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    <?php endif; ?>
                                    <!-- Adicionar outras redes sociais se necessário -->
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Não há membros da equipe para exibir.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>