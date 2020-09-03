function localAuthorityCombo() {
    let option_data = "";
    ajaxRequest("GET", "api/report/localauth_report", null, function (resp) {
        if (resp.length == 0) {
            option_data = "<option value='0'>No Data Found</option>";
        } else {
            $.each(resp, function (index, row) {
                option_data += "<option value='" + row.id + "'>" + row.name + "</option>";
            });
        }
        $("#laCombo").html(option_data);
    });
}
function zonesCombo() {
    let option_data = "";
    ajaxRequest("GET", "api/report/zone_report", null, function (resp) {
        if (resp.length == 0) {
            option_data = "<option value='0'>No Data Found</option>";
        } else {
            $.each(resp, function (index, row) {
                option_data += "<option value='" + row.id + "'>" + row.district + "-" + row.name + "</option>";
            });
        }
        $("#zonesCombo").html(option_data);
    });
}
function districtCombo() {
    let option_data = "";
    ajaxRequest("GET", "api/report/district_report", null, function (resp) {
        if (resp.length == 0) {
            option_data = "<option value='0'>No Data Found</option>";
        } else {
            $.each(resp, function (index, row) {
                option_data += "<option value='" + row.id + "'>" + row.district + "-" + row.name + "</option>";
            });
        }
        $("#districtCombo").html(option_data);
    });
}

var FILTER_REF = '';
function showDivByReport() {
    FILTER_REF = "";
    let filt = $('#repFilterBy').val();
    let filt_type = $('#filt_type').val();
    $("#LaComboDev").addClass("d-none");
    $("#zoneComboDev").addClass("d-none");
    $("#DistrictComboDev").addClass("d-none");
    if (filt_type == 1) {
        switch (filt) {
            case "la":
                $("#LaComboDev").removeClass("d-none");
                FILTER_REF = $("#laCombo").val();
                break;
            case "zone":
                $("#zoneComboDev").removeClass("d-none");
                FILTER_REF = $("#zonesCombo").val();
                break;
            case "district":
                $("#DistrictComboDev").removeClass("d-none");
                FILTER_REF = $("#districtCombo").val();
                break;
            default:

                break;
        }
    }
}

function report_data() {
    var data = {
        "report_id": $('#report_id').val(),
        "group_type": $('#repFilterBy').val(),
        "filter_type": $('#filt_type').val()
    };
    if (!isNaN(parseInt(FILTER_REF))) {
        data.filter_id = FILTER_REF;
    }
    return data;
}

function gen_report(data, callBack) {
    console.log(data);
    let table = '';
    let t_body = '';
    let t_head = '';
    let thead = {};
    ajaxRequest("GET", "api/report/generate_new", data, function (resp) {

        if (resp.length == 0) {
            t_body += '<tr clas=""><td> - no data found - </td></tr>';
        } else {
            if (data.report_id == 1) {
                thead.name = 'Name';
                thead.type = 'Type';
                thead.address = 'Address';
                thead.capacity = 'Capacity';
                thead.contactNo = 'Contact No';
                $.each(resp, function (index, row) {
                    t_body += '<tr class="group_row"><td colspan="' + Object.keys(thead).length + '">- ' + row.group + ' -</td></tr>';
                    $.each(row.list_dta, function (index, row2) {
                        t_body += '<tr>';
                        t_body += '<td class="name">' + row2.name + '</td>';
                        t_body += '<td class="type">' + row2.type + '</td>';
                        t_body += '<td class="address">' + row2.address + '</td>';
                        t_body += '<td class="capacity">' + row2.capacity + '</td>';
                        t_body += '<td class="contactNo">' + row2.contactNo + '</td>';
                        t_body += '</tr>';
                    });
                });
            } else if (data.report_id == 2) {
                thead.name = 'Name';
                thead.type = 'Type';
                thead.address = 'Address';
                thead.capacity = 'Capacity';
                thead.contactNo = 'Contact No';
                $.each(resp, function (index, row) {
                    t_body += '<tr class="group_row"><td colspan="' + Object.keys(thead).length + '">- ' + row.group + ' -</td></tr>';
                    $.each(row.list_dta, function (index, row2) {

                        t_body += '<tr>';
                        t_body += '<td class="name">' + row2.name + '</td>';
                        t_body += '<td class="type">' + row2.type + '</td>';
                        t_body += '<td class="address">' + row2.address + '</td>';
                        t_body += '<td class="capacity">' + row2.capacity + '</td>';
                        t_body += '<td class="contactNo">' + row2.contactNo + '</td>';
                        t_body += '</tr>';
                    });
                });
            } else if (data.report_id == 3) {
                thead.name = 'Name';
                thead.type = 'Type';
                thead.address = 'Address';
                thead.capacity = 'Capacity';
                thead.contactNo = 'Contact No';
                $.each(resp, function (index, row) {
                    t_body += '<tr class="group_row"><td colspan="' + Object.keys(thead).length + '">- ' + row.group + ' -</td></tr>';
                    $.each(row.list_dta, function (index, row2) {
                        t_body += '<tr>';
                        t_body += '<td class="name">' + row2.name + '</td>';
                        t_body += '<td class="type">' + row2.type + '</td>';
                        t_body += '<td class="address">' + row2.address + '</td>';
                        t_body += '<td class="capacity">' + row2.capacity + '</td>';
                        t_body += '<td class="contactNo">' + row2.contactNo + '</td>';
                        t_body += '</tr>';
                    });
                });
            } else if (data.report_id == 5) {
                thead.register_no = 'register no';
                thead.bland = 'Brand';
                thead.capacity = 'Capacity';
                thead.condition = 'condition';
                thead.dump_type = 'Type';
                thead.height = 'Height';
                thead.length = 'length';
                thead.production_year = 'production year';
                $.each(resp, function (index, row) {
                    t_body += '<tr class="group_row"><td colspan="' + Object.keys(thead).length + '">- ' + row.group + ' -</td></tr>';
                    $.each(row.list_dta, function (index, row2) {
                        t_body += '<tr>';
                        t_body += '<td class="register_no">' + row2.register_no + '</td>';
                        t_body += '<td class="bland">' + row2.bland + '</td>';
                        t_body += '<td class="capacity">' + row2.capacity + '</td>';
                        t_body += '<td class="condition">' + row2.condition + '</td>';
                        t_body += '<td class="dump_type">' + row2.dump_type + '</td>';
                        t_body += '<td class="height">' + row2.height + '</td>';
                        t_body += '<td class="length">' + row2.length + '</td>';
                        t_body += '<td class="production_year">' + row2.production_year + '</td>';
                        t_body += '</tr>';
                    });
                });
            }

        }
        $.each(thead, function (key, val) {
            t_head += '<td class="' + key + '">' + val + '</td>';
        });
        console.log(t_body);
        $("#report_table thead").html('<tr>' + t_head + '</tr>');
        $("#report_table tbody").html(t_body);
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack();
        }
    });
}