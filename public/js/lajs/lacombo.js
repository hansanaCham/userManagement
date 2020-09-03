/**
 * load local authority combo filterdby province
 *  return local authorities by the province if  provinceCombo exist else return a error allert
 *
 */
function comboLocalAuthorityByProvince(callBack) {
    if ($('.provinceCombo').length > 0) {
        $('.laByProvinceCombo').empty();

        getPlantsByProvince($('.provinceCombo').val(), function (result) {
            if (result.length > 0) {
                $.each(result, function (key, value) {
                    $('.laByProvinceCombo').append(new Option(value.name, value.id));
                });
            } else {
                $('.laByProvinceCombo').append(new Option('None', 0));
            }
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack(result);
            }
        });

    } else {
        //  alert('Province Combo not found');
    }
}

function loadDumpCombo(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/dumpsite/types",
        data: null,
        dataType: "json",
        cache: false,
        processDaate: false,
        success: function (result) {

            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack(result);
            }
        }
    });
}

//function loadComboUI() {
//    loadDumpCombo(function (result) {
//        var comboui = "";
//        var id = 1;
//        $.each(result, function (index, combo) {
//            comboui += "<option value='" + combo.name + "'>" + combo.name + "</option>";
//        });
//        $('.dumpTypeCombo').html(comboui);
//    });
//}
