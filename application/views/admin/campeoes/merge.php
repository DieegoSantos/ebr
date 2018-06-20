<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div id="page-wrapper">
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-lg-8">
					<h3> Cadastrar Campeao</h3>
					<form method="post" action="<?php echo base_url('admin/saveCampeao') ?>" enctype="multipart/form-data">
                        <fieldset class="form-group">
                            <label for="tel">Jogador(*)</label>
                            <select class="form-control" required name="nome_jogador">
                                <option value=""><< Selecione>></option>
                                <?php foreach ($jogador as $dados): ?>
                                    <option value="<?php echo $dados->nome ?>"><?php echo $dados->nome ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="hidden" name="id" value="<?php echo isset($id)? $id : '0' ?>">
                        </fieldset>
                        <fieldset class="form-group">
					    	<label for="torneio">Nome do Torneio(*)</label>
					    	<input id="torneio" required autofocus name="torneio" type="text" class="form-control" value="<?php echo isset($nome)? $nome : '' ?>" />
						</fieldset>
						<fieldset class="form-group">
					    	<label for="temporada">Temporada (*)</label>
					    	<input id="temporada" required autofocus name="temporada" type="text" class="form-control" value="<?php echo isset($valor)? $valor : '' ?>" />
						</fieldset>

						<button type="submit" class="btn btn-primary">Salvar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $('#valor').mask('00.00')
    })
</script>