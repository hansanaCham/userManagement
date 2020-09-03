function save_survey_val(obj, callBack) {
    if (!obj) {
        console.log('validation working');
        return false;
    }
    // alert(JSON.stringify(obj));
    var url = '';
    url = "/api/survey/result";
    $.ajax({
        type: "POST",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: url,
        data: {"data": obj},
        cache: false,
        // processData: false,
        success: function (result) {
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack(result);
            }
        }
    });
}
function delete_survey_val(del_id, callBack) {
    if (!confirm('Are You Sure You Want To Remoce This Record?')) {
        return false;
    }
    if (isNaN(del_id)) {
        alert('Invalid Selection for delete!');
        return false;
    }
    // alert(JSON.stringify(obj));
    var url = '';
    url = "/api/survey/result/id/" + del_id;
    $.ajax({
        type: "DELETE",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: url,
        cache: false,
        success: function (result) {
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack(result);
            }
        }
    });
}


function iterate_results_form(ses_id, attribute_id, callBack) {
    $('#add_resultTblLable').html('Add Results (' + $('#attr_combo :selected').text() + ')');
    var tbl = '';
    var ret_obj = {};
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/survey/attrpram_map/attr_option/attribute_id/" + attribute_id + "/session_id/" + ses_id,
        cache: false,
        success: function (result) {
            if (result.length == 0) {
                tbl += '<tr><td>No Data Available</td></tr>';
            }
            $.each(result, function (index, row) {
                ret_obj[row.id] = '';
                var input = '';
                if (row.type == 'SELECTED') {
                    input += '<select class="form-control in_val" data-row_id="' + row.id + '" data-nullable="' + row.is_null + '" id="v_' + row.id + '">';
                    $.each(row.survey_values, function (index, op) {
                        input += '<option value="' + op.id + '">' + op.name + '</option>';
                    });
                    input += '</select>';
                } else if (row.type == 'DATE') {
                    input = '<input type="date" class="form-control in_val" placeholder="" data-row_id="' + row.id + '"  id="v_' + row.id + '" value="" data-nullable="' + row.is_null + '" >';
                } else if (row.type == 'NUMERIC') {
                    input = '<input type="number" class="form-control in_val"  placeholder="enter number" data-row_id="' + row.id + '"  id="v_' + row.id + '" value="" data-nullable="' + row.is_null + '" >';
                } else if (row.type == 'FILE') {
                    input = '<input type="file" class="in_val" data-row_id="' + row.id + '"  id="v_' + row.id + '" data-nullable="' + row.is_null + '">';
                } else {
                    input = '<input type="text" class="form-control in_val" placeholder="enter text" data-row_id="' + row.id + '"  value="" id="v_' + row.id + '" data-nullable="' + row.is_null + '" >';
                }
                var tbl_rw = '<div class="form-group"><label>' + row.name + ': </label> ' + input + '</div>';
                tbl += '<tr><td>' + tbl_rw + '</td></tr>';
            });
            $('#sur_resTbl tbody').html(tbl);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack(ret_obj);
            }
        }
    });
}

function load_attrCombo(title_id, ttle_no, callBack) {
    var cbo = '';
    //    alert('asdasd');
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/survey/attribute/title/id/" + title_id,
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
                let title_n = ttle_no + '.' + row.title_no;
                cbo += '<option value="' + row.id + '">' + title_n + ' - ' + row.name + '</option>';
            });
            $('.attr_cbo').html(cbo);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}
function load_MainTitleCombo(ses_id, callBack) {
    var cbo = '';
    //    alert('asdasd');
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/survey/session/main/id/" + ses_id,
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
                cbo += '<option value="' + row.main_title_id + '" data-title_no="' + row.main_titile_number + '">' + row.main_titile_number + ' - ' + row.main_title_name + '</option>';
            });
            $('.main_title_cbo').html(cbo);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}
function load_titleCombo(ses_id, title_id, main_title_no, callBack) {
    var cbo = '';
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/survey/session/subTitle/session_id/" + ses_id + "/main_id/" + title_id,
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
                let title_no = main_title_no + '.' + row.titile_number;
                cbo += '<option value="' + row.id + '" data-title_no="' + title_no + '">' + title_no + ' - ' + row.name + '</option>';
                //                cbo += '<option value="' + row.id + '" data-title_no="">' + title_no + '-' + row.name + '</option>';
            });
            $('.title_cbo').html(cbo);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}

function load_ResultsTbl(ses_id, attr_id, callBack) {
    $('#resultTbl_label').html('(' + $('#attr_combo :selected').text() + ') Results');
    var cbo = '';
    $('#addeddres_tbl tbody').html(cbo);
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/survey/result/attribute_id/" + attr_id + "/session_id/" + ses_id,
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
                cbo += '<tr><td>' + ++index + '</td><td>' + row.parameter_name + '</td>';
                if (row.type === 'FILE') {
                    cbo += '<td><a href="../../' + row.value + '" download>Click to Download File</a></td>';
                } else {
                    cbo += '<td>' + row.value + '</td>';
                }

                cbo += '<td><button type="button" class="btn btn-danger del_res" value="' + row.id + '">Delete</button></td></tr>';
            });
            $('#addeddres_tbl tbody').html(cbo);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}
//function remove_survData(foc, del_id, callBack) {
//    var url = "";
//    switch (foc) {
//        case 'title_t':
//            url = "/api/survey/title/id/";
//            break;
//        case 'param_t':
//            url = "/api/survey/parameter/id/";
//            break;
//        case 'attr_t':
//            url = "/api/survey/attribute/id/";
//            break;
//        case 'custom-tabs-two-messages-tab':
//            url = "/api/survey/value/id/";
//            break;
//        case 'param_type_t':
//            url = "/api/survey/attrpram_map/id/";
//            break;
//    }
//    $.ajax({
//        type: "DELETE",
//        headers: {
//            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
//            "Accept": "application/json"
//        },
////        url: "/api/survey/title/id/" + title_id,
//        url: url + del_id,
////        data: {"survey_title_name": "dddd", "survey_title_status":1},
//        cache: false,
//        success: function (result) {
//            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
//                callBack(result);
//            }
//        }
//    });
//}
