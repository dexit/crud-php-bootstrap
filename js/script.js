// Adicionar
function addRecord() {
    var nome = $("#nome").val();
    var email = $("#email").val();
    var rg = $("#rg").val();
    var cpf = $("#cpf").val();
    var telefone = $("#telefone").val();
    var celular =  $("#celular").val();
    var sexo = $('.genero:checked').val();
    var observacao = $("#observacao").val();

    $.post("ajax/addRecord.php", {
        nome: nome,
        email: email,
        rg: rg,
        cpf: cpf,
        telefone: telefone,
        celular:  celular,
        sexo: sexo,
        observacao: observacao
    }, function (data, status) {
        // fechar popup
        $("#add_new_record_modal").modal("hide");

        readRecords();

        // limpar campos
        $("#nome").val("");
        $("#email").val("");
        $("#rg").val("");
        $("#cpf").val("");
        $("#telefone").val("");
        $("#celular").val("");
        document.getElementById("generoM").checked = true;
        $("#observacao").val("");
    });
}

// Ler registros
function readRecords() {
    $.get("ajax/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

// Deletar
function DeleteUser(id) {
  console.log(id);
    var conf = confirm("Você deseja mesmo excluir?");
    if (conf == true) {
        $.post("ajax/deleteUser.php", {
                id: id
            },
            function (data, status) {
                // recarregar
                readRecords();
            }
        );
    }
}

function GetUserDetails(id) {
    // Buscar id hidden
    $("#hidden_user_id").val(id);
    $.post("ajax/readUserDetails.php", {
            id: id
        },
        function (data, status) {

            var user = JSON.parse(data);
            
            $("#update_nome").val(user.nome);
            $("#update_email").val(user.email);
            $("#update_cpf").val(user.cpf);
            $("#update_rg").val(user.rg);
            $("#update_telefone").val(user.telefone);
            $("#update_celular").val(user.celular);
            var genero = user.sexo;
            if(genero.toUpperCase() == 'M'){
              document.getElementById("update_generoM").checked = true;
            } else {
              document.getElementById("update_generoF").checked = true;
            }
            $("#update_observacao").val(user.observacao);
        }
    );
    // Abrir modal
    $("#update_user_modal").modal("show");
}


// Atualizar cliente
function UpdateUserDetails() {
  var nome = $("#update_nome").val();
  var email = $("#update_email").val();
  var rg = $("#update_rg").val();
  var cpf = $("#update_cpf").val();
  var telefone = $("#update_telefone").val();
  var celular =  $("#update_celular").val();
  var sexo = $('.update_genero:checked').val();
  var observacao = $("#observacao").val();


    var id = $("#hidden_user_id").val();
console.log(id);

    $.post("ajax/updateUserDetails.php", {
      nome: nome,
      email: email,
      rg: rg,
      cpf: cpf,
      telefone: telefone,
      celular:  celular,
      sexo: sexo,
      observacao: observacao
        },
        function (data, status) {

            $("#update_user_modal").modal("hide");
            // recarregar
            readRecords();
        }
    );
}

$(document).ready(function () {
    // recarregar cliente no load da pag
    readRecords();
});
