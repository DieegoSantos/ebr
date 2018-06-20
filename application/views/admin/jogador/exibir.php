<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h3 class="page-header">Jogadores Cadastrados</h3>
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
                                            <th>Jogador</th>
                                            <th>PSN</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($objDados as $objResult):
                                    ?>
                                        <tr>
                                            <td><?php echo $objResult->nome ?></td>
                                            <td><?php echo $objResult->psn ?></td>
                                            <td><?php echo $objResult->status ?></td>
                                            <td>
                                                <a href="<?php echo base_url('Admin/editarJogador?id='.$objResult->id) ?>" class="btn btn-warning">Editar</a>
                                                 <a href="#" class="btn btn-danger" onclick="confirm_del('<?php echo $objResult->nome ?>', <?php echo $objResult->id ?>)">Remover</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="5"><a href="<?php echo base_url('Admin/addJogador') ?>" class="btn btn-primary">Cadastrar</a></td>
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
        var result = confirm("Tem certeza que deseja remover o Jogador " + nome + " ?");
        if (result) {
            window.location = '<?php echo base_url('Admin/deletaJogador?id=')?>'+id;
        }
    }
</script>