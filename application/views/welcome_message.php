<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Header -->
<header class="masthead bg-primary text-white text-center">
    <img width="100%" src="img/img-home.jpeg" alt="Liga E-Brasileirão" />
</header>

<!-- Inscricoes Section -->
<section class="bg-primary text-white mb-0" id="inscricoes">
    <div class="container">
        <h2 class="text-center text-uppercase text-white">Inscrições</h2>
        <hr class="star-light mb-5">
        <div class="row">
            <?php $cont = 0; ?>
            <?php foreach($planos as $plano): ?>
                <?php if($cont<=2): ?>
                    <div class="col-lg-4 ml-auto">
                        <div class="conteudoPagamento">
                            <p><strong><?php echo $plano->nome ?></strong></p>
                            <p>Valor do Plano: <strong>R$<?php echo str_replace('.', ',', $plano->valor) ?></strong></p>
                            <p>Bônus Pagamento Antecipado: <strong><?php echo $plano->bonus ?></strong></p>
                            <p><a href="<?php echo $plano->link ?>" target="_blank">Clique aqui para efetuar o pagamento</a></p>
                        </div>
                    </div>
                <?php endif;?>
            <?php $cont++; ?>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h3 style="margin-top: 50px; margin-bottom: -50px" class="text-center text-uppercase text-white"><a  style="color: #FFFFFF" href="<?php echo base_url()?>Inscricoes">Ver todos os planos</a></h3>
            </div>
        </div>
</section>

<!-- Campeoes Section -->
<section id="campeoes">
    <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Últmos Campeões</h2>
        <hr class="star-dark mb-5">
        <div class="row">
            <?php for($i=0; $i <=2; $i++): ?>
                <div class="col-lg-4 ml-auto">
                    <div class="conteudoCampeoes">
                        <div class="row">
                        <div class="col-md-4">
                            <img src="http://www.giftt.com.br/img/admin/usuarios.png" width="100%" />
                        </div>
                        <div class="col-md-8">
                            <p>Nome:<strong>Nome do Campeão</strong></p>
                            <p>PSN: <strong>psn_campeão</strong></p>
                            <p>Campeonato: <strong>Campeonato Vencido</strong></p>
                        </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h3 style="margin-top: 60px; margin-bottom: -50px" class="text-center text-uppercase text-white"><a href="<?php echo base_url()?>Campeoes" style="color:#0f3b97" href="#"> Ver todos os campeões</a></h3>
            </div>
        </div>
    </div>
</section>

</body>

</html>

