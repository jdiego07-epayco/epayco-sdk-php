ePayco.setPublicKey('f5e798eff9513283e29ff45a870506da'); //Llave publica para realizar la conexión al metodo de tokenización

$('#customer-form').submit(function(event) { //Captura el evento submit del formulario con ID: customer-form
    event.preventDefault();
    var $form = $(this);
    $form.find("button").prop("disabled", true);
    ePayco.token.create($form, function(error, token) {
        $form.find("button").prop("disabled", false);
        if (!error) {
            // $form.append($('<input type="hidden" name="token_card">').val(token));
            $('#epaycoToken').val(token);
            $form.get(0).submit();
            console.log(token);
        } else {
            $('.customer-errors').text(error.data.description);
        }
    });
});