<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h3> Cadastrar Conteudo</h3>
                <?php if($this->session->flashdata('sucesso')) : ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('sucesso');?>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?php echo base_url('admin/saveConteudo') ?>" enctype="multipart/form-data">
                    <fieldset class="form-group">
                        <label for="titulo">Titulo(*)</label>
                        <input id="titulo" required autofocus name="titulo" type="text" class="form-control"  value="<?php echo isset($titulo)? $titulo : '' ?>" />
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="texto">Texto(*)</label>
                        <textarea  cols="100" rows="10" name="texto"><?php echo $texto ?></textarea>
                    </fieldset>
                    <input type="hidden" name="id" value="<?php echo isset($id)? $id : '0' ?>">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>