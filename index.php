<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="DataTables/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
</head>

<body>
    <div class="container">
        <h1 class="display-5 mt-4 mb-4">LISTAR USUÁRIOS</h1>
        <div class="d-md-flex justify-content-md-end">
            <a href="javascript:void(0)" class="btn btn-success btn-sm mb-4" onclick="addData()">Novo Cadastro</a>
        </div>
        <table id="userDataList" class="table table-striped table-hover display" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Salário</th>
                    <th>Idade</th>
                    <th>Dt Registro</th>
                    <th>Dt Exclusão</th>
                    <th>Dt Diff</th>
                    <th>Ações</th>
                </tr>
            </thead>
        </table>
    </div>

    <!-- MODAL NOVO CADASTRO -->
    <div class="modal fade" id="novoCadastro" tabindex="-1" aria-labelledby="novoCadastroLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="novoCadastroLabel">Novo Cadastro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form name="userDataFrm" id="userDataFrm">
                    <div class="modal-body">
                        <div class="frm-status"></div>

                        <div class="mb-3">
                            <label for="nome" class="form-label"> Nome </label>
                            <input type="text" class="form-control" id="nome" placeholder="digite o nome do usuário">
                        </div>
                        <div class="mb-3">
                            <label for="salario" class="form-label"> Salário </label>
                            <input type="text" class="form-control" id="salario" placeholder="digite o salário">
                        </div>
                        <div class="mb-3">
                            <label for="idade" class="form-label"> Idade </label>
                            <input type="text" class="form-control" id="idade" placeholder="digite a idade">
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <input type="hidden" id="userId" value="0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" onclick="submitUserData()">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="DataTables/dataTables.min.js"></script>
    <script src="DataTables/dataTables.bootstrap.min.js"></script>
    <script src="DataTables/custom.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>

</body>

</html>