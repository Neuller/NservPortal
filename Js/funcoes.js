const esconderCampos = function (nomeCampo) {
    campo = Array.isArray(nomeCampo) ? nomeCampo : nomeCampo.split(",");

    campo.forEach(function (valor) {
        $("#" + valor).hide();
    });
};

const mostrarCampos = function (nomeCampo) {
    campo = Array.isArray(nomeCampo) ? nomeCampo : nomeCampo.split(",");

    campo.forEach(function (valor) {
            $("#" + valor).show();
    });
};

const bloquearCampos = function (nomeCampo, show) {
    show = show !== undefined ? show : true;
    campo = Array.isArray(nomeCampo) ? nomeCampo : nomeCampo.split(",");

    campo.forEach(function (valor) {
        if (show == true) {
            $("#" + valor).prop("disabled", true);
        } else {

            $("#" + valor).prop("disabled", false);
        }
    });
};

const limparCampos = function (nomeCampo) {
    campo = Array.isArray(nomeCampo) ? nomeCampo : nomeCampo.split(",");

    campo.forEach(function (valor) {
        $("#" + valor).val("");
    });
};