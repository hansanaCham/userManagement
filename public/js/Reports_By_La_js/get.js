function provinceCombo(callBack) {

    getProvince(function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, value) {
            combo += "<option selected value='" + value.id + "' selected>" + value.name + "</option>";
        });
        $('.provinceCombo').html(combo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
            
        }
    });
}



function getProvince(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/all_provincial_council",
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


function laByProvinceCombo(id,callBack) {

    get_La_By_Province(id,function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, value) {
            combo += "<option selected value='" + value.id + "' selected>" + value.name + "</option>";
        });
        $('.laByProvinceCombo').html(combo);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}

function get_La_By_Province(id,callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/localAuthority/province/id/"+id,
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