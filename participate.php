<?php
include './include/header.php';
//print_r($_SESSION);
$cid=$_GET['contest'];
if($_GET['contest']){
$id = $njEncryptionObj->safe_b64decode($cid);
}else{
   $id =''; 
}
 $id;
  $condition_opt = " id='".$id."' and is_delete='0' and status='1'";
 $result_opt = $dbComObj->viewData($conn, "contests", "*", $condition_opt);
 $num_opt = $dbComObj->num_rows($result_opt);
 $contest = $dbComObj->fetch_assoc($result_opt);
     if($contest['cover_image']){
                $image = BASE_URL . 'images/contest/' . $contest['cover_image']; 
            }else {
                 $image = BASE_URL .'frontend/img/default-product-image.png';
            }
//print_r($contest);
?>
<div class="mainsection">
<div class="container">
<div class="row">
<img src="<?php echo $image; ?>" class="img-responsive" style="height: 300px;">
</div>
</div>
</div>
 
<div class="join">
  <div class="container">
    <div class="row">
        <h4 class="hadding"><strong><?php echo $contest['title']; ?></strong></h4>
        <h5>Description</h5><p><?php  echo base64_decode($contest['description']);?> </p>
         <h5>Reward</h5> <p><?php  echo base64_decode($contest['reward']);?> </p>
     <hr>
          <a href="<?php echo BASE_URL ?>contest_votes.php?a=<?php echo $cid; ?>" class="btn btn-success pull-right">Vote Now</a>
    </div>
  </div>
</div>

   <div class="join">
        <div class="container">
              <div class="row">
                <h4 class="hadding"><strong>HOW TO APPLAY</strong></h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
               <hr>
              </div>
        </div>
      </div>


<div class="contest">
  <div class="container">
     <div class="row">
   
       <div class="how-to-apply">
						 <div class="container how-too">
						   <div class="col-md-12 col-sm-12">
                            <form id="contact_form" method="post" action="" enctype="multipart/form-data">
                                <div class="row">
                                    <div id="result_contact"></div>
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <h4>Title </h4>
                                        <input type="text" class="form-control" name="title" placeholder="Title" required="">
                                    </div>
                                    <div class="col-md-6 col-sm-6  form-group">
                                        <h4>Discripation </h4>
                                      <textarea class="form-control" cols="5"   name="description" required="" ></textarea>
                                    </div>
                                    <div class="col-md-6 col-sm-6 margintop10 form-group">
                                        <h4>Choose Product</h4>
                                          <div class="col-md-10">
                                          <input type="text"  id = "slr_product_name0" class="form-control slr_product_list"  data-id="0" placeholder="Select Your Proudct" required="" >
                                            <input type="hidden" id = "slr_product_id0" class="form-control"  data-id="0" name="product_id[]" required="">
                                         
                                        </div>
                                         <div class="col-md-2">
                                       <a class="btn3d btn btn-primary" id="add_laboratory">add more</a>
                                       </div>
                                     
                                </div>
                                     <div  id="add_labo_result"></div>     
                             <div class="col-md-12 col-sm-12 margintop20" style="padding-bottom:30px;">
                                <input type="hidden" name="mode" value="<?php echo base64_encode("add"); ?>" />
                                  <input type="hidden" name="contest_id" value="<?php echo $id; ?>" />
                               <button type="button" name="csubmit" onclick="formSubmit('contact_form', 'result_contact', '<?php echo BASE_URL; ?>controller/participate_opration.php')" class="btn btn-success">Submit </button>
                        </div>
                             
                        </div>
                            </form>
					 </div>
					</div>

           <style>/* highlight results */
.ui-autocomplete span.hl_results {
    background-color: #ffff66;
}
 
/* loading - the AJAX indicator */
.ui-autocomplete-loading {
    background: white url('../img/ui-anim_basic_16x16.gif') right center no-repeat;
}
 
/* scroll results */
.ui-autocomplete {
    max-height: 250px;
    overflow-y: auto;
    /* prevent horizontal scrollbar */
    overflow-x: hidden;
    /* add padding for vertical scrollbar */
    padding-right: 5px;
}
 
.ui-autocomplete li {
    font-size: 16px;
}
 
/* IE 6 doesn't support max-height
* we use height instead, but this forces the menu to always be this tall
*/
* html .ui-autocomplete {
    height: 250px;
}

</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php include 'include/footer.php'; ?>

<script>
      function productAutocomplete()
        {
         
    $( ".slr_product_list" ).autocomplete({
        
        source: 'http://www.fxpips.co.uk/marketplace/getData.php?mode=SuggestSellerProduct',
         select: function(event, ui) {
               var id = $(this).data('id');
                                event.preventDefault();
                                $("#slr_product_id"+id).val(ui.item.label);
                                $("#slr_product_id"+id).val(ui.item.value);
                            },
                            focus: function(event, ui) {
                                   var id = $(this).data('id');
                                event.preventDefault();
                                 $("#slr_product_name"+id).val(ui.item.label);
                            }     
    });
}

productAutocomplete();
</script>
<script>
$(document).ready(function() {
         
   var max_fields      = 5; //maximum input boxes allowed
   var wrapper_laboratory         = $("#add_labo_result"); //Fields wrapper
   var add_button_laboratory      = $("#add_laboratory"); //Add button ID
   var xx = 1; //initlal text box count
   $(add_button_laboratory).click(function(e){ //on add input button click
   //  alert(1);
       e.preventDefault();
       if(xx < max_fields){ //max input box allowed
           xx++; //text box increment           
           $(wrapper_laboratory).append('<div class="col-md-12 col-sm-12  form-group"><div class="col-md-5">\
                    <input type="text"  id = "slr_product_name'+xx+'"  class="slr_product_list form-control" data-id="'+xx+'"   placeholder="Select Proudct"  required>\
                    <input type="hidden"  class="form-control" id="slr_product_id'+xx+'"   name="product_id[]" required=""></div> \
                    <div clas="col-md-2" ><a href="javascript:void(0)" class="remove_field"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>\
                    </div></div>'); //add input box
       }
       productAutocomplete();
   });

   $(wrapper_laboratory).on("click",".remove_field", function(e){ //user click on remove text
     e.preventDefault(); $(this).parent().parent('div').remove(); xx--;
   })
    
})

</script>