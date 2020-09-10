function formSubmit(formid, rid, target) {
    $(".loading-overlay").show();
    var category = $("#" + formid).find('.checkboxaj').hasClass("sr-msg-error");
    if(category){
     $( "#treecheckbox" ).addClass( "sr-msg-error" );
     }

    $(" #" + formid).validate({
            ignore: '',
            invalidHandler: function(e,validator) {
           //  $( "#treecheckbox" ).addClass( "sr-msg-error" );    
        for (var i=0;i<validator.errorList.length;i++){   
           var check_class =  $(" #" + formid).find('.collapse').length; 
           if(check_class  > 1) {
                $(validator.errorList[i].element).parents('.panel-collapse.collapse').collapse('show');
           }
        }
    },
            rules: {
            'category_id[]': {
                required: true
            },
              messages: {
                  'category_id[]': 'please  select Category'
              }
        },
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
                if (result.indexOf("Success :") != -1) {
                    oOutput.innerHTML = '<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>' + result + '</div>';
                    if (result.indexOf("update") < 0) {
                        $("#" + formid + " input[type=text]").val("");
                        $("#" + formid + " textarea").val("");
                        $("#" + formid + " input[type=email]").val("");
                        $("#" + formid + " input[type=password]").val("");
                        $('#' + formid).each(function () {
                            this.reset();
                        });
                    }
                    setTimeout("$('#" + rid + "').html('')", 3000);
                }
                else if (result.indexOf("Reload :") != -1) {
                    oOutput.innerHTML = '<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>' + result.replace('Reload :', 'Success :') + '</div>';
                    setTimeout('window.location.reload()', 2000);
                }
                else if (result.indexOf("Redirect :") != -1) {
                    var rs = result.replace('Redirect :', 'Success :');
                    var res = rs.split('URL')
                    var url = res[1];
                    oOutput.innerHTML = '<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>' + res[0] + '</div>';
                    window.location.href = url;
                }
                else if (result.indexOf("Print :") != -1) {
                    var rs = result.replace('Print :', 'Success :');
                    var res = rs.split('URL')
                    var url = res[1];
                    oOutput.innerHTML = '<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>' + res[0] + '</div>';
                    window.open(url);
                    window.location.reload();
                }
                else {
                    oOutput.innerHTML = '<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>' + result + '</div>';
                }
                $(".loading-overlay").hide();
            }
            else {
                oOutput.innerHTML = '<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button"><span aria-hidden="true">×</span></button>Error ' + oReq.status + ' occurred uploading your file.</div>';
                $(".loading-overlay").hide();
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
