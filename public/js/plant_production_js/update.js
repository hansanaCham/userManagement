 $('#btnUpdate').click(function () {
     var btnData = JSON.parse(decodeURIComponent($(this).data('row')));

var txt = $('.forms_textUpdateInputs');
var data ={
    date:$('#txtProductionDate').val(),
    reading:[]

};

            $.each(txt, function (index, value) 
       {
        var Dta = JSON.parse(decodeURIComponent($(value).data('row')));

        var d = {id:Dta.id, name:Dta.facility_output_type_id, value: $(value).val()}

        data.reading.push(d);
         // alert("id"+Dta.id+"name "+Dta.facility_output_type_id+" value "+$(value).val());        
       });




            update_plant_production($(this).val(),data, function (result) {
               
                        if (result.id == 1) {
                            alertSuccessMessage('Successfull');
                   //loadPendingBioCompostTabel();
                    refresh();
                } else {
                    alertErrorMessage('Something went wrong')
                
                }
    
            });


// alert(JSON.stringify(btnData));



        });



function update_plant_production(id,data,callBack)
   {

    $.ajax({
        type: "PUT",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "api/plant/plant_output/id/" + id,
        data: data,
        dataType: "json",
        cache: false,
        processDaate: false,
        success: function (result) {

            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                callBack(result);
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert(textStatus + ':' + errorThrown);
        }
    });
   }


