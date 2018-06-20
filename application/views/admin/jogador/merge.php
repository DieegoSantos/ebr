<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div id="page-wrapper">
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-lg-8">
					<h3> Cadastrar Jogador</h3>
					<form method="post" action="<?php echo base_url('admin/saveJogador') ?>" enctype="multipart/form-data">
						<fieldset class="form-group">
					    	<label for="nome">Nome(*)</label>
					    	<input id="nome" required autofocus name="nome" type="text" class="form-control" value="<?php echo isset($nome)? $nome : '' ?>" />
						</fieldset>
						<fieldset class="form-group">
					    	<label for="psn">PSN(*)</label>
					    	<input id="psn" required autofocus name="psn" type="text" class="form-control"  value="<?php echo isset($psn)? $psn : '' ?>" />
						</fieldset>
						<fieldset class="form-group">
					    	<label for="tel">Status(*)</label>
                            <select class="form-control" name="status">
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                            <input type="hidden" name="id" value="<?php echo isset($id)? $id : '0' ?>">
					    </fieldset>
						<button type="submit" class="btn btn-primary">Salvar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>