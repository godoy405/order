<?php $this->extend('layout/principal');?>


<?php $this->section('titulo')?><?php echo $titulo; ?><?php $this->endSection()?>



<?php $this->section('estilos')?>

<!-- Aqui coloco os estilos da view -->

<link href="https://cdn.datatables.net/v/bs4/dt-2.1.8/r-3.0.3/datatables.min.css" rel="stylesheet">

<?php $this->endSection()?>



<?php $this->section('conteudo')?>

<!-- Aqui coloco o conteúdo da view -->

<div class="container-fluid">  

    <div class="row">

    <div class="col-lg-12">
                <div class="block">
                  <div class="table-responsive">
                    <table id="ajaxTable" class="table table-striped table-sm" style="width: 100%;">
                      <thead>
                        <tr>
                          <th>Imagem</th>
                          <th>Nome</th>
                          <th>E-mail</th>
                          <th>Situação</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>


    </div>


</div>

<?php $this->endSection()?>


<?php $this->section('scripts')?>

<!-- Aqui coloco os scripts da view -->

<script src="https://cdn.datatables.net/v/bs4/dt-2.1.8/r-3.0.3/datatables.min.js"></script>

<script>
    $(document).ready(function () {
        const DATATABLE_PTBR = {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
        };

        $('#ajaxTable').DataTable({
            "oLanguage": DATATABLE_PTBR,
            processing: true,
            serverSide: true,
            ajax: "<?php echo site_url('usuarios/recuperausuarios'); ?>",
            columns: [
                { data: 'imagem' },
                { data: 'nome' },
                { data: 'email' },
                { data: 'ativo' },
            ],
            "deferRender": true,
            "language": {
                "processing": "<span class='spinner-container'><i class='fa fa-spinner fa-spin fa-3x fa-fw'></i> Carregando...</span>",
            },
            "responsive": true,
            "paging": true,
            "pageLength": 10,
            "pagingType": $(window).width() < 768 ? "simple" : "simple_numbers",
        });
    });
</script>


<?php $this->endSection()?>