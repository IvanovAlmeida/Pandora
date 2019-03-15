$( document ).ready(function() {
    $('body').on('click', 'table.tableItens TBODY TR TD .btnApagar', function () {
        let idItem = $(this).attr('data-id');
        swal({
            title: "Você tem certeza?",
            text: "Se você apagar o item não irá pode recupera-lo!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {

                $.ajax({
                    url: '/itens/apagar/' + idItem,
                    type: 'DELETE',
                    data: { id : idItem }
                }).done(function (data) {
                    if(data.msg === "sucesso"){
                        swal("Item apagado com sucesso!", {
                            icon: "success",
                        });

                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    } else {
                        swal("Ops! Não foi possivel apagar o item!", {
                            icon: "danger",
                        });
                    }
                });

            }
        });
    });
});