function loadWorkerPositionsCombo(callBack) {
    getWorkerPositions(function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, value) {
            combo += '<option selected data-row="' + encodeURIComponent(JSON.stringify(value)) + '" value="' + value.id + '" selected>' + value.name + '</option>';
        });
        $('#workerPositioncombo').html(combo);
   
        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}



function getWorkerPositions(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/worker/positions",
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


function loadEducationalQulificationCombo(callBack) {
    getEducationalQulification(function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, value) {
            combo += '<option selected data-row="' + encodeURIComponent(JSON.stringify(value)) + '" value="' + index + '" selected>' + value + '</option>';
        });
        $('#educationQualification').html(combo);

        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}



function getEducationalQulification(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/worker/educational_qualifications",
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


function loadProfessionalQulificationCombo(callBack) {
    getProfessionalQulification(function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, value) {
            combo += '<option selected data-row="' + encodeURIComponent(JSON.stringify(value)) + '" value="' + index + '" selected>' + value + '</option>';
        });
        $('#professionalQualification').html(combo);

        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}



function getProfessionalQulification(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/worker/professional_qualifications",
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

function loadworkerStatusCombo(callBack) {
    getworkerStatus(function (result) {
        var combo = "";
        var id = 1;
        $.each(result, function (index, value) {
            combo += '<option selected data-row="' + encodeURIComponent(JSON.stringify(value)) + '" value="' + index + '" selected>' + value + '</option>';
        });
        $('#workerStatus').html(combo);

        if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
            callBack(result);
        }
    });
}



function getworkerStatus(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/worker/status",
        data: null,
        dataType: "json",
        cache: false,
        processDaate: false,
        success: function (result) {

            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack(result);
            }
        }
    });}

function loadWorkerTabel() {
    GetWorkerTabel(function (result) {
        var table = "";
        var id = 1;
        $.each(result, function (index, tbl) {
            table += "<tr>";
            table += "<td>" + id++ + "</td>";
            table += "<td>" + tbl.name + "</td>";
            table += "<td>" + tbl.nic + "</td>";
            table += "<td>" + tbl.contact_no + "</td>"; 
             //   table += "<td>" + tbl.institute_type + "</td>"; 
             // table += "<td>" + tbl.status + "</td>"; 

             //      table += "<td>" + tbl.edu_qualification + "</td>"; 
             //       table += "<td>" + tbl.pro_qualification + "</td>"; 

            table += '<td><button type="button" data-row="' + encodeURIComponent(JSON.stringify(tbl)) + '"  value="' + tbl.id + '" class="btn btn-success btn-sm val_sel">Select</button></td></tr>'; table += "</tr>";
        



        });
        $('#tblWorkers tbody').html(table);
        $("#tblWorkers").DataTable();
    });
}

function GetWorkerTabel(callBack) {
    $.ajax({
        type: "GET",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/workers",
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
