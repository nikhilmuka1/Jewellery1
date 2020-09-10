function formSubmitCart(formid, rid, target) {
    $(".loading-overlay").show();
    $("#" + formid).validate({
        errorPlacement: function (error, element) {
            // Append error within linked label
            $(element).closest('.form-group').append(error);
            $(element).closest('.form-group-sm').append(error);
//                    .closest("form")
//                    .find("#"+element.attr("id")).closest('.form-group')
//                    .append(error);
        }
    });
    if ($("#" + formid).valid()) {
        var oOutput = document.getElementById(rid);
        oData = new FormData(document.forms.namedItem(formid));

        var resultid = rid;
        var oReq = new XMLHttpRequest();
        oReq.open("POST", target, true);
        oReq.onload = function (oEvent) {
            if (oReq.status == 200) {
                var result = oReq.responseText;
                
                    oOutput.innerHTML = result;
                    //oOutput.innerHTML = '<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>' + result + '</div>';
                    //setTimeout("$('#" + rid + "').html('')", 3000);
                
                $(".loading-overlay").hide();
            }
            else {
                return result;
               // oOutput.innerHTML = '<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>Error ' + oReq.status + ' occurred uploading your file.</div>';
               // $(".loading-overlay").hide();
            }
        };
        oReq.send(oData);

    }
    else {
        $(".loading-overlay").hide();
    }

}
function deleteRow(ths) {
    $(".loading-overlay").show();
    $(ths).closest("tr").remove();
    $(".loading-overlay").hide();
}
