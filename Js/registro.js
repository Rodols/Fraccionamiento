function populate(s1, s2) {
    var s1 = document.getElementById(s1);
    var s2 = document.getElementById(s2);
    s2.innerHTML = "";
    var optionArray = ["nosabe|No sabe"];
    var numero_de_casas = 0;
    switch (s1.value) {
        case "Asturia":
            numero_de_casas = 50;
            for (var i = 1; i <= numero_de_casas; i++) {
                optionArray.push("".concat(i).concat("|").concat(i));
            }
            break;
        case "Avila":
            numero_de_casas = 50;
            for (var i = 1; i <= numero_de_casas; i++) {
                optionArray.push("".concat(i).concat("|").concat(i));
            }
            break;
        case "CadizDerecha":
            numero_de_casas = 50;
            for (var i = 1; i <= numero_de_casas; i++) {
                optionArray.push("".concat(i).concat("|").concat(i));
            }
            break;
        case "Cordoba":
            numero_de_casas = 50;
            for (var i = 1; i <= numero_de_casas; i++) {
                optionArray.push("".concat(i).concat("|").concat(i));
            }
            break;
        case "EspañaEntrada":
            numero_de_casas = 50;
            for (var i = 1; i <= numero_de_casas; i++) {
                optionArray.push("".concat(i).concat("|").concat(i));
            }
            break;
        case "EspañaSalida":
            numero_de_casas = 50;
            for (var i = 1; i <= numero_de_casas; i++) {
                optionArray.push("".concat(i).concat("|").concat(i));
            }
            break;
        case "Galicia":
            numero_de_casas = 50;
            for (var i = 1; i <= numero_de_casas; i++) {
                optionArray.push("".concat(i).concat("|").concat(i));
            }
            break;
        case "Granada":
            numero_de_casas = 50;
            for (var i = 1; i <= numero_de_casas; i++) {
                optionArray.push("".concat(i).concat("|").concat(i));
            }
            break;
        case "Ibiza":
            numero_de_casas = 50;
            for (var i = 1; i <= numero_de_casas; i++) {
                optionArray.push("".concat(i).concat("|").concat(i));
            }
            break;
        case "Jerez":
            numero_de_casas = 50;
            for (var i = 1; i <= numero_de_casas; i++) {
                optionArray.push("".concat(i).concat("|").concat(i));
            }
            break;
        case "Mallorca":
            numero_de_casas = 50;
            for (var i = 1; i <= numero_de_casas; i++) {
                optionArray.push("".concat(i).concat("|").concat(i));
            }
            break;
        case "Marbella":
            numero_de_casas = 50;
            for (var i = 1; i <= numero_de_casas; i++) {
                optionArray.push("".concat(i).concat("|").concat(i));
            }
            break;
        case "SantanderDerecha":
            numero_de_casas = 50;
            for (var i = 1; i <= numero_de_casas; i++) {
                optionArray.push("".concat(i).concat("|").concat(i));
            }
            break;
        case "SantanderIzquierda":
            numero_de_casas = 50;
            for (var i = 1; i <= numero_de_casas; i++) {
                optionArray.push("".concat(i).concat("|").concat(i));
            }
            break;
        case "EspañaSalida":
            numero_de_casas = 50;
            for (var i = 1; i <= numero_de_casas; i++) {
                optionArray.push("".concat(i).concat("|").concat(i));
            }
            break;
        case "Toledo":
            numero_de_casas = 50;
            for (var i = 1; i <= numero_de_casas; i++) {
                optionArray.push("".concat(i).concat("|").concat(i));
            }
            break;
        case "Valencia":
            numero_de_casas = 50;
            for (var i = 1; i <= numero_de_casas; i++) {
                optionArray.push("".concat(i).concat("|").concat(i));
            }
            break;
    }
    for (var option in optionArray) {
        var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];
        s2.options.add(newOption);
    }
}