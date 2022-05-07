const mostrarCampo = function(nomeCampos, boolean) {
    campo = Array.isArray(nomeCampos) ? nomeCampos : nomeCampos.split(",");
    if (boolean == true) {
        campo.forEach(function(valor) {
            $("#" + valor).show();
        });
    } else if (boolean == false) {
        campo.forEach(function(valor) {
            $("#" + valor).hide();
        });
    }

};

const bloquearCampo = function(nomeCampos, show) {
    show = show !== undefined ? show : true;
    campo = Array.isArray(nomeCampos) ? nomeCampos : nomeCampos.split(",");
    campo.forEach(function(valor) {
        if (show == true) {
            $("#" + valor).prop("disabled", true);
        } else if (show == false) {
            $("#" + valor).prop("disabled", false);
        }
    });
};

const limparCampo = function(nomeCampos) {
    campo = Array.isArray(nomeCampos) ? nomeCampos : nomeCampos.split(",");
    campo.forEach(function(valor) {
        $("#" + valor).val("");
    });
};