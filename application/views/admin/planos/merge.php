<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div id="page-wrapper">
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-lg-8">
					<h3> Cadastrar Planos</h3>
					<form method="post" action="<?php echo base_url('admin/savePlanos') ?>" enctype="multipart/form-data">
						<fieldset class="form-group">
					    	<label for="nome">Nome do Plano(*)</label>
					    	<input id="nome" required autofocus name="nome" type="text" class="form-control" value="<?php echo isset($nome)? $nome : '' ?>" />
						</fieldset>
						<fieldset class="form-group">
					    	<label for="valor">Valor do Plano (*)</label>
					    	<input id="valor" required autofocus name="valor" type="text" class="form-control" value="<?php echo isset($valor)? $valor : '' ?>" />
						</fieldset>
                        <fieldset class="form-group">
                            <label for="bonus">Bônus Pagamento Antecipado</label>
                            <input id="bonus"  autofocus name="bonus" type="text" class="form-control" value="<?php echo isset($bonus)? $bonus : '' ?>" />
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="link">Link PagSeguro (*)</label>
                            <input id="link" required autofocus name="link" type="text" class="form-control" value="<?php echo isset($link)? $link : '' ?>" />
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#valor').mask('00.00')
    })
</script>