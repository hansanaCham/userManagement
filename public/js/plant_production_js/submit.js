$('#btnSave').click(function () {
var txt = $('.forms_textInputs');
var data ={
    date:$('#txtProductionDate').val(),
    reading:[]

};

            $.each(txt, function (index, value) 
       {
        var Dta = JSON.parse(decodeURIComponent($(value).data('row')));

        var d = {id:Dta.id, value: $(value).val()}

        data.reading.push(d);
      //     alert("name "+Dta.name+" value "+$(value).val());        
       });


// alert(JSON.stringify(data));

            save_plant_production($('#btnSave').val(),data, function (result) {
               
                        if (result.id == 1) {
                            alertSuccessMessage('Successfull');
                   loadPendingBioCompostTabel();
                } else {
                    alertErrorMessage('Something went wrong')
                
                }
    
            });
});

function save_plant_production(id,obj, callBack) {
 

    if (!obj) {

        console.log('save function false');
        return false;


    }
    $.ajax({
        type: "POST",
        headers: {
            "Authorization": "Bearer " + $('meta[name=api-token]').attr("content"),
            "Accept": "application/json"
        },
        url: "/api/plant/plant_output/plant_input_id/"+id,
        data: obj,
        //        contentType: 'text/json',
        //        dataType: "json",
        cache: false,
        success: function (result) {
            if (typeof callBack !== 'undefined' && callBack != null && typeof callBack === "function") {
                
                callBack(result);
            }
        }
    });
}

  