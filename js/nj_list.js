function unsetSearchDataTable(tableId, columnID) {
    $.each(columnID, function (key, value) {
        var txt = $('#' + tableId + ' thead th:nth-child(' + value + ') input[type="text"] ').attr('placeholder');
        $('#' + tableId + ' thead th:nth-child(' + value + ')').html(txt);
    });
}
function setDateTable(tableId, pageUrl) {
    $('#' + tableId).DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "processing": true,
        "serverSide": true,
        "fnDrawCallback": function( oSettings ) {
            $('.switch-ed').bootstrapToggle({ size:"small" , toggle:"toggle" , on: '<i class="fa fa-thumbs-up"></i>', onstyle:'success' , off: '<i class="fa fa-thumbs-down"></i>', offstyle:'danger'  });
            $('.switch-ed').change(function() { 
                //alert($(this).prop('checked'));
                //alert($(this).val());
                var purl = $('#admin_url').val();
                var idTbl = $(this).val();
                var ididTblArr = idTbl.split("-");
                var id = ididTblArr[0];
                var tables = ididTblArr[1];
                var cchk = $(this).prop('checked');
                var stts = "-1";
                if(cchk){
                    stts= "1";
                }
                //alert("URL="+purl+" & id="+id+" & table="+tables);
                $.post( purl+"status_operations.php", { pranali: "toggleStatus", id: id, status:stts, table: tables } , function( data ) {
                    alert(data);
                });
            });
        },
        "ajax": {
            "url": pageUrl,
            "dataType": "jsonp"
        }
    });
    //$('.switch-ed').bootstrapToggle({ on: 'Enabled', off: 'Disabled' });
}
function setDateTableDesc(tableId, pageUrl) {
   var table= $('#' + tableId).DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        order: [ [ $('th.defaultDESCSort').index(),  'desc' ] ],
        "processing": true,
        "serverSide": true,
        "fnDrawCallback": function( oSettings ) {
            $('.switch-ed').bootstrapToggle({ size:"small" , toggle:"toggle" , on: '<i class="fa fa-thumbs-up"></i>', onstyle:'success' , off: '<i class="fa fa-thumbs-down"></i>', offstyle:'danger'  });
            $('.switch-ed').change(function() { 
                //alert($(this).prop('checked'));
                //alert($(this).val());
                var purl = $('#admin_url').val();
                var idTbl = $(this).val();
                var ididTblArr = idTbl.split("-");
                var id = ididTblArr[0];
                var tables = ididTblArr[1];
                var cchk = $(this).prop('checked');
                var stts = "-1";
                if(cchk){
                    stts= "1";
                }
                //alert("URL="+purl+" & id="+id+" & table="+tables);
                $.post( purl+"status_operations.php", { pranali: "toggleStatus", id: id, status:stts, table: tables } , function( data ) {
                    alert(data);
                });
            });
        },
        "ajax": {
            "url": pageUrl,
            "dataType": "jsonp"
        }
    });
    return table;
    //$('.switch-ed').bootstrapToggle({ on: 'Enabled', off: 'Disabled' });
}
function setDateTableAsc(tableId, pageUrl) {
    $('#' + tableId).DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        order: [ [ $('th.defaultASCSort').index(),  'asc' ] ],
        "processing": true,
        "serverSide": true,
        "fnDrawCallback": function( oSettings ) {
            $('.switch-ed').bootstrapToggle({ size:"small" , toggle:"toggle" , on: '<i class="fa fa-thumbs-up"></i>', onstyle:'success' , off: '<i class="fa fa-thumbs-down"></i>', offstyle:'danger'  });
            $('.switch-ed').change(function() { 
                //alert($(this).prop('checked'));
                //alert($(this).val());
                var purl = $('#admin_url').val();
                var idTbl = $(this).val();
                var ididTblArr = idTbl.split("-");
                var id = ididTblArr[0];
                var tables = ididTblArr[1];
                var cchk = $(this).prop('checked');
                var stts = "-1";
                if(cchk){
                    stts= "1";
                }
                //alert("URL="+purl+" & id="+id+" & table="+tables);
                $.post( purl+"status_operations.php", { pranali: "toggleStatus", id: id, status:stts, table: tables } , function( data ) {
                    alert(data);
                });
            });
        },
        "ajax": {
            "url": pageUrl,
            "dataType": "jsonp"
        }
    });
    //$('.switch-ed').bootstrapToggle({ on: 'Enabled', off: 'Disabled' });
}
function setDateTable1(tableId, pageUrl) {
    //setup - dataTable
    var table = $('#' + tableId).DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        //"searching": false,
        //"ajax": pageUrl,
        "ajax": {
            "url": pageUrl,
            "dataType": "jsonp"
        },
        dom: 'T<"clear">lfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        //autoWidth: false
    });
    table.buttons().container()
            .appendTo($('.col-sm-6:eq(0)', table.table().container()));
}
function setSearchableDateTable(tableId, pageUrl) {
    // Setup - add a text input to each Header cell
    $('#' + tableId + ' thead th').each(function () {
        var title = $('#' + tableId + ' thead th').eq($(this).index()).text();
        $(this).html('<input type="text" placeholder="' + title + '" />');
    });
    //setup - dataTable
    var table = $('#' + tableId).DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "ajax": pageUrl,
        "dom": 'T<"clear">lfrtip',
        "buttons": ['copy', 'csv', 'excel', 'pdf', 'print'],
        'iDisplayLength': 12,
        "fnDrawCallback": function () {
            /*ready();*/
        }

    });
    // Apply the search
    table.columns().eq(0).each(function (colIdx) {
        $('input', table.column(colIdx).header()).on('keyup change', function () {
            table
                    .column(colIdx)
                    .search(this.value)
                    .draw();
        });
    });
}


function setDateTableDesc(tableId, pageUrl) {
    $('#' + tableId).DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        order: [ [ $('th.defaultDESCSort').index(),  'desc' ] ],
        "processing": true,
        "serverSide": true,
        "fnDrawCallback": function( oSettings ) {
            $('.switch-ed').bootstrapToggle({ size:"small" , toggle:"toggle" , on: '<i class="fa fa-thumbs-up"></i>', onstyle:'success' , off: '<i class="fa fa-thumbs-down"></i>', offstyle:'danger'  });
            $('.switch-ed').change(function() { 
                //alert($(this).prop('checked'));
                //alert($(this).val());
                var purl = $('#admin_url').val();
                var idTbl = $(this).val();
                var ididTblArr = idTbl.split("-");
                var id = ididTblArr[0];
                var tables = ididTblArr[1];
                var cchk = $(this).prop('checked');
                var stts = "-1";
                if(cchk){
                    stts= "1";
                }
                //alert("URL="+purl+" & id="+id+" & table="+tables);
                $.post( purl+"status_operations.php", { pranali: "toggleStatus", id: id, status:stts, table: tables } , function( data ) {
                    alert(data);
                });
            });
        },
        "ajax": {
            "url": pageUrl,
            "dataType": "jsonp"
        }
    });
    //$('.switch-ed').bootstrapToggle({ on: 'Enabled', off: 'Disabled' });
}

function toggleStatus(cChkBx,pId,tName){
    var chkCheckBox = $(cChkBx).prop('checked');
    alert(chkCheckBox);
//    $.post( "url", "data" , function( data ) {
//        $( ".result" ).html( data );
//    });
}