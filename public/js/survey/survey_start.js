function create_surveySession(obj, callBack) {
    if (!obj) {
        return false;
    }
    JSON.stringify(obj);
    if (confirm('Are you sure you want Start this Survey?\nIf yoou start this survey it will be appear to the all local authorities!')) {
        $.ajax({
            type: "POST",
            headers: {
                "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
                "Accept": "application/json"
            },
            url: "/api/survey/session/start",
            data: obj,
            cache: false,
            success: function (result) {
                if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                    callBack(result);
                }
            }
        });
    }
}
function add_suvey_names(obj, callBack) {
    if (!obj) {
        return false;
    }
    $.ajax({
        type: "POST",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/survey/name",
        data: obj,
        cache: false,
        success: function (result) {
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack(result);
            }
        }
    });
}
function restart_surv_session(ses_id, callBack) {
    if (!confirm("If You Start This Session Again It Will be Appear To All Local Authorities !\nPLEASE CONFIRM")) {
        return false;
    }
    if (isNaN(ses_id)) {
        msg_error('Please Add Survey Session First!');
        return false;
    }
    var url = '';
    url = "/api/survey/session/restart/id/" + ses_id;
    $.ajax({
        type: "PATCH",
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
function start_surv_session(ses_id, callBack) {
    if (isNaN(ses_id)) {
        msg_error('Please Add Survey Session First!');
        return false;
    }
    var url = '';
    url = "/api/survey/session/start/id/" + ses_id;
    $.ajax({
        type: "POST",
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
function send_title_order(surv_sess_id, array, callBack) {
    JSON.stringify(array);
    if (isNaN(surv_sess_id)) {
        alert('Please Enter Survey Sessions First!');
        return false;
    }
    if (array.lengt == 0) {
        alert('Please Enter Survey Titles First!');
        return false;
    }
    var send = {"name_id": surv_sess_id, "order": array};
    if (array.length == 0) {
        return false;
    }
    var url = '';
    url = "/api/survey/name/order";
    $.ajax({
        type: "PUT",
        data: send,
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
function end_surv_session(ses_id, callBack) {
    if (!confirm('Are you sure you want to End This Survey Session? \nIf you end this survey all institutes can\'t add survey data again')) {
        return false;
    }
    if (isNaN(ses_id)) {
        msg_error('Please Add Survey Session First!');
        return false;
    }
    var url = '';
    url = "/api/survey/session/end/id/" + ses_id;
    $.ajax({
        type: "PATCH",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: url,
        cache: false,
        success: function (result, textStatus, jqXHR) {
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack(result);
            }
            console.log(textStatus + ": " + jqXHR.status);
        }
        
    });
}


//
function survey_name_combo(callBack) {
    var cbo = '';
    $('.surveyCmb').html(cbo);
    //    alert('asdasd');
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/survey/name",
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
                cbo += '<option value="' + row.id + '" data-ses_status="' + row.session_status + '">' + row.name + '</option>';
            });
            $('.surveyNameCmb').html(cbo);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}
function survey_combo(callBack) {
    var cbo = '';
    $('.surveyCmb').html(cbo);
    //    alert('asdasd');
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/survey/sessions",
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
                cbo += '<option value="' + row.id + '" data-ses_status="' + row.session_status + '">' + row.name + '</option>';
            });
            $('.surveyCmb').html(cbo);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}
function load_allSurveysTbl(callBack) {
    $('#survey_names_tbl tbody').html('');
    var cbo = '';
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/survey/name",
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
                cbo += '<tr>';
                cbo += '<td>' + ++index + '</td><td>' + row.name + '</td>';
                if (parseInt(row.type) === 1) {
                    cbo += '<td>Yearly Repeat</td>';
                } else {
                    cbo += '<td>One Time</td>';
                }
                cbo += '<td><button type="button" class="btn btn-danger btn-xs del_nameBtn" value="' + row.id + '">Remove</button></td>';
                cbo += '</tr>';
            });
            $('#survey_names_tbl tbody').html(cbo);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}
function load_allSessionsTbl(callBack) {
    $('#sur_sessionTable tbody').html('');
    var cbo = '';
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/survey/sessions",
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
                var end_btn = '';
                var res_btn = '';
                var del_btn = '<button type="button" class="btn btn-danger del_sessionBtn" value="' + row.id + '">Remove</button></td>';
                cbo += '<tr>';
                cbo += '<td>' + ++index + '</td><td>' + row.survey_name.name + '</td>';
                switch (row.session_status) {
                    case 1:
                        end_btn = '<button type="button" class="btn btn-default sess_end" value="' + row.id + '">End Session</button>';
                        cbo += '<td>Survey Started</td>';
                        break;
                    case 2:
                        res_btn = '<button type="button" class="btn btn-default sess_rest" value="' + row.id + '">Re-Start Session</button>';
                        del_btn = '';
                        cbo += '<td>Survey Ended</td>';
                        break;
                    default:
                        cbo += '<td>N/A</td>';
                        break;
                }
                cbo += '<td>' + end_btn + ' ' + del_btn + ' ' + res_btn;
                cbo += '</tr>';
            });
            $('#sur_sessionTable tbody').html(cbo);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}
function load_titlesTbl(callBack) {
    $('#sur_titleTable tbody').html('');
    var cbo = '';
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/survey/titles",
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
                cbo += '<tr><td><input type="checkbox" name="selttl" value="' + row.id + '" class=""/></td><td>' + row.name + '</td></tr>';
            });
            $('#sur_titleTable tbody').html(cbo);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}
function load_titlesByNameTbl(session_id, callBack) {
    var cbo = '';
    $('#avl_sur_titleTable tbody').html(cbo);
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/survey/name/id/" + session_id,
        cache: false,
        success: function (result) {
            $.each(result, function (index, row) {
                cbo += '<tr data-ttl_id="' + row.title_id + '"><td>' + ++index + '</td><td>' + row.title_name + '</td><td><button type="button" class="btn btn-sm btn-default up"><i class="fa fa-arrow-up"></i></button> <button type="button" class="btn btn-sm btn-default down"><i class="fa fa-arrow-down"></i></button></td></tr>';
            });
            $('#avl_sur_titleTable tbody').html(cbo);
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack();
            }
        }
    });
}

function Delete_survey_session(del_id, callBack) {
    if (isNaN(del_id)) {
        alert('invalid Selection !');
        return false;
    }
    if (confirm('Are you sure you want to remove this Recod?')) {
        $.ajax({
            type: "DELETE",
            headers: {
                "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
                "Accept": "application/json"
            },
            url: "/api/survey/session/id/" + del_id,
            cache: false,
            success: function (result) {
                if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                    callBack(result);
                }
            }
        });
    }
}
function Delete_survey_name(del_id, callBack) {
    if (isNaN(del_id)) {
        alert('invalid Selection !');
        return false;
    }
    if (confirm('Are you sure you want to remove this Recod?')) {
        $.ajax({
            type: "DELETE",
            headers: {
                "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
                "Accept": "application/json"
            },
            url: "/api/survey/name/id/" + del_id,
            cache: false,
            success: function (result) {
                if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                    callBack(result);
                }
            }
        });
    }
}
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 4000

});
function AlertMEssege(type) {
    if (type == 'true') {
        Toast.fire({
            type: 'success',
            title: '<h4>Success</h4>'
        });
    } else {
        Toast.fire({
            type: 'error',
            title: '<h4>Error !</h4>'
        });
    }
}
function msg_error(msg) {
    Toast.fire({
        type: 'error',
        title: '<h4>Error !</h4><p>' + msg + '</p>'
    });
}
//function display_ses_btn(st) {
//    $('#survey_sessTbltitle').html($('#survey_combo :selected').text() + ' Titles');
//    console.log(st);
//    if (st === 0) {
//        $('#sess_strt').prop("disabled", false);
//        $('#sess_end').prop("disabled", true);
//    } else if (st === 1) {
//        $('#sess_strt').prop("disabled", true);
//        $('#sess_end').prop("disabled", false);
//    } else {
////            $('#survey_sessTbltitle').html('Survey Titles');
//        $('#sess_strt').prop("disabled", true);
//        $('#sess_end').prop("disabled", true);
//    }
//}
function get_title_order() {
    var tbl_ordr = {};
    $('#avl_sur_titleTable tbody').each(function () {
        var num = 1;
        $(this).find('tr').each(function () {
            tbl_ordr[$(this).data("ttl_id")] = num++;
//                tbl_ordr[$(this).data("ttl_id")] = $(this).find('td:eq(0)').text();
//                            console.log($(this).data("ttl_id") + ' - ' + $(this).find('td:eq(0)').text());
            //do your stuff, you can use $(this) to get current cell
        });
    });
    return tbl_ordr;
}
function get_surv_sesion_f_val() {
    var data = {
        'survey_name_id': parseInt($('#survey_combo').val()),
        'start_date': $('#surv_create_dt').val(),
        'end_date': $('#surv_end_dt').val(),
        'year': parseInt($('#surv_year').val())
    };
    if ((data.start_date.length == 0) || (data.end_date.length === 0)) {
        alert('Please Add dates First !');
        return false;
    }
    if (isNaN(data.survey_name_id)) {
        alert('You Must add survey names first!');
        return false;
    }
    if (isNaN(data.year)) {
        alert('Please Add Survey Year!');
        return false;
    }
    return data;
}
function get_surv_name_f_val() {
    var data = {
        'name': $('#surv_name').val().trim(),
        'type': $('#update_type').val()
    };
    var array = $.map($('input[name="selttl"]:checked'), function (c) {
        return c.value;
    });
    if (data.name.length == 0) {
        alert('Please enter survey name!');
        return false;
    }
    if (array.length == 0) {
        alert('Please Select Survey Titles !');
        return false;
    }
    data.titles = array;
    return data;
}
function reset_sur_createFrm() {
    load_titlesTbl();
    $('#surv_name').val('');
    $('#surv_create_dt').val('');
    $('#surv_end_dt').val('');
    $('#surv_year').val('');
}