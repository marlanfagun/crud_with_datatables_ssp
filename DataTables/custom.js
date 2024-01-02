// new DataTable("#userDataList", {
//   ajax: "fetchData.php",
//   processing: true,
//   serverSide: true,
//   language: {
//     url: "./pt-BR.json",
//   },
//   "columnDefs": [
//     { "orderable": false, "targets": 7 }
// ]
// });

var table = $("#userDataList").DataTable({
  processing: true,
  serverSide: true,
  ajax: "fetchData.php",
  language: {
    url: "./pt-BR.json",
  },
  columnDefs: [{ orderable: false, targets: 7 }],
  order: [
    [0, "desc"]
  ],
});

$(document).ready(function () {
  table.draw();
});

//Modal para adicionar dados formulário
function addData() {
  $(".frm-status").html("");
  $("#novoCadastroLabel").html("Novo Cadastro");

  $("#nome").val("");
  $("#salario").val("");
  $("#idade").val("");
  $("#userId").val("0");

  $("#novoCadastro").modal("show");
}

//Modal para editar os dados
function editData(user_data) {
  $(".frm-status").html("");
  $("#novoCadastroLabel").html("Editar Usuário #" + user_data.id);

  $("#nome").val(user_data.nome);
  $("#salario").val(user_data.salario);
  $("#idade").val(user_data.idade);
  $("#userId").val(user_data.id);

  $("#novoCadastro").modal("show");
}

//Adicionar e editar requisição de submissão para server-side script
function submitUserData() {
  $(".frm-status").html("");
  let input_data_arr = [
    document.getElementById("nome").value,
    document.getElementById("salario").value,
    document.getElementById("idade").value,
    document.getElementById("userId").value,
  ];

  fetch("eventHandler.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      request_type: "addEditUser",
      user_data: input_data_arr,
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status == 1) {
        Swal.fire({
          title: data.msg,
          icon: "success",
        }).then((result) => {
          //Recarregar a tabela
          table.draw();

          $("#novoCadastro").modal("hide");
          $("#userDataFrm")[0].reset();
        });
      } else {
        $(".frm-status").html(
          '<div class="alert alert-danger" role="alert">' + data.error + '</div>'
        );
      }
    })
    .catch(console.error);
}

//Confirmar exclusão de registro
function deleteData(user_id) {
  Swal.fire({
    title: "Confirmar exclusão?",
    text: "Você não poderá recuperar o registro!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sim, excluir!",
  }).then((result) => {
    if (result.isConfirmed) {
      fetch("eventHandler.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ request_type: "deleteUser", user_id: user_id }),
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.status == 1) {
            Swal.fire({
              title: data.msg,
              icon: "success",
            }).then((result) => {
              table.draw();
            });
          } else {
            Swal.fire(data.error, "", "error");
          }
        })
        .catch(console.error);
    } else {
      Swal.close();
    }
  });
}
