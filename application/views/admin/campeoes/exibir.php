<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <h3 class="page-header">Visualizar Campeões</h3>
            <?php if($this->session->flashdata('sucesso')) : ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('sucesso');?>
                </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error');?>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-lg-13">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>JOGADOR</th>
                                    <th>TORNEIO</th>
                                    <th>TEMPORADA</th>
<!--                                    <th>AÇÕES</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($objDados as $objResult):
                                    ?>
                                    <tr>
                                        <td><?php echo $objResult->nome ?></td>
                                        <td><?php echo $objResult->torneio ?></td>
                                        <td><?php echo $objResult->temporada ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="5"><a href="<?php echo base_url('Admin/cadastrarCampeao') ?>" class="btn btn-primary">Cadastrar</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
</body>
</html>
<script type="text/javascript">
    function confirm_del(nome, id) {
        var result = confirm("Tem certeza que deseja remover o Campeao " + nome + " ?");
        if (result) {
            window.location = '<?php echo base_url('Admin/deletaCampeao?id=')?>'+id;
        }
    }
</script>