<script type="text/javascript" src="<?php echo BASE_URL;?>js/bootstrap-table.js"></script>
<script>
    <!--
    window.onload = function() {
        //Check File API support
        if (window.File && window.FileList && window.FileReader) {
            $('#Productimages').live("change", function(event) {
                var files = event.target.files; //FileList object
                var output = document.getElementById("resultimages");
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    //Only pics
                    // if(!file.type.match('image'))
                    if (file.type.match('image.*')) {
                        if (this.files[0].size < 2097152) {
                            // continue;
                            var picReader = new FileReader();
                            picReader.addEventListener("load", function(event) {
                                var picFile = event.target;
                                var div = document.createElement("div");
                                div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                                    "title='preview image'/>";
                                output.insertBefore(div, null);
                            });
                            //Read the image
                            $('#clear, #resultimages').show();
                            picReader.readAsDataURL(file);
                        } else {
                            alert("Image Size is too big. Minimum size is 2MB.");
                            $(this).val("");
                        }
                    } else {
                        alert("You can only upload image file.");
                        $(this).val("");
                    }
                }

            });
        } else {
            console.log("Your browser does not support File API");
        }
    }

    $('#Productimages').live("click", function() {
        $('.thumbnail').parent().remove();
        $('resultimages').hide();
        $(this).val("");
    });

    $('#clear').live("click", function() {
        $('.thumbnail').parent().remove();
        $('#resultimages').hide();
        $('#files').val("");
        $(this).hide();
    });

    -->
</script>
<script>
   $(document).ready(function(){
       ////// product type hide and show
        //$("#CustomOptions_section").hide();
        $('.deleteimage').click(function(){
             // alert(1);
              var id = $(this).data("id");
             var  productimg= '#productimg'+id;
                 var cr = confirm("Are you sure to delete this Product Image?");
                    if(cr){
                     $.post('<?php echo BASE_URL;?>common/products_operations.php',{a:id,mode:'<?php echo base64_encode('deleteProductImage');?>'},function(data){
                       $('#errorMsg').html(data);
                         // alert(data);
                       alert('Product images deleted successfully.');
                        $(productimg).remove();
                      // window.location.reload();
                       return false;
                     });

                     return false;
                   }
          })
       });       
         product_typeFunction();
         $("#attribute_section").hide();
         //
          // var attribute_set_id = $('.attribute_set_id').val();
           // get_attribute(attribute_set_id) ;
            function groupCheckFunction (){
            
           }
        function product_typeFunction() {
         //  alert(11);
               $("#attribute-list:input").attr("disabled", true);
              $("#associated_section").hide();
               var product_type = $('.product_type').val();
               if(product_type =='grouped'){
                    // alert(11);
               $("#group_section").show();
                  $(".group_check").attr('required',true);
                 $("#attribute-list:input").attr("disabled", true);
            } else {
                 $("#group_section").hide();
                     $(".group_check").attr('required',false);
            }
               if(product_type =='configurable'){
                   
               $("#products_submit").html('Save and Continue');
               $("#associated_section").hide();
                 $("#attribute_section").show();
                   $(".attribute_set_id").attr('required',true);
                 $("#attribute-list :input").attr("disabled", false);
               
            } else {
               $("#products_submit").html('<?php echo $bxt; ?>');
                 $("#associated_section").hide();
                   $("#attribute_section").hide();
                   $("#attribute-list :input").attr("disabled", true);
            }
   
            if(product_type =='grouped'){
               $("#CustomOptions_section").hide();
                $("#price").prop('disabled', true);
               $("#price_sec").hide();
            }else {
                $("#price_sec").show();
                  $("#price").prop('disabled', false);
                 $("#CustomOptions_section").show();
            }
    }
          //on change st
   
       $( ".product_type" ).change(function() {
            product_typeFunction();
       
           
   });
      ////***** page load call addmore row edit ***********///  
       window.onload = function() {
   
            //add_custom_row();
          //  option_select('field',1); //field  //drop_down
          //  add_option_field_row(0);
           //  add_custom_row();
           };
      
       var max_fields      = 10; //maximum input boxes allowed
       var wrapper         = $(".input_fields_wrap"); //Fields wrapper
       var add_button      = $(".add_field_button"); //Add button ID
        
       var x = 0;  //initlal text box count
       function add_custom_row() {
       //  e.preventDefault();
      
           if(x < max_fields){ //max input box allowed
               x++; //text box increment
             //  alert(x);
             //  $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
            $(wrapper).append('<div class="col-md-11 well well-sm well-primary">\
                                          <div class="col-md-5">\
                                       <div class="well well-sm well-primary">\
                                           <label for="grantpo">Title *</label>\
                                        <input type="text" class="required-entry form-control" required id="product_option_2_title" name="product_option_title[]" value="">\
                                       </div>\
                                   </div>\
                                      <!--<div class="col-md-3">\
                                       <div class="well well-sm well-primary">\
                                           <label for="grantpo"> Input Type *</label>\
                                       <select name="option_input_type[]"  onchange="option_select(this.value,'+x+')" id="product_option_2_type" class="select form-control required-option-select" title=""><option value="">-- Please select --</option><optgroup label="Text"><option value="field">Field</option></optgroup><optgroup label="Select"><option value="drop_down">Drop-down</option> </optgroup></select>\
                                       </div>\
                                   </div>-->\
                                     <div class="col-md-3">\
                                       <div class="well well-sm well-primary">\
                                           <label for="grantpo">Is Required</label>\
                                       <select name="option_is_requre[]" id="product_option_2_is_require" class="form-control" title=""><option value="1">Yes</option><option value="0">No</option></select>\
                                       </div>\
                                   </div>\
                                   <div class="col-md-2">\
                                       <div class="well well-sm well-primary">\
                                           <label for="grantpo">Sort Order </label>\
                                      <input type="number" min="0" class="validate-zero-or-greater form-control" name="product_opt_sort_order[]" value="'+x+'">\
                                       </div>\
                                   </div>\
                                   <div class="col-md-2"><label for="grantpo"> </label>\
                                   <a href="#" class="remove_field btn btn-danger">Remove</a>\
                                     </div>\
                                     <div id ="optiondiv' + x + '"></div>\
                                      </div>'); 
           }
            
               option_select('drop_down',x)
       }
      
       $(add_button).click(function(e){ //on add input button click
          //  e.preventDefault();
         var id = parseInt($(this).attr("data-id")) ;
                         
                add_custom_row(id) ;
                add_option_field_row(id-1);
              //   add_option_field_row(id-1);
              var newid = $(this). attr('data-id',id+1);
                  yf=0;
       });
       
       $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
           e.preventDefault(); $(this).parent().parent('div').remove(); x--;
       })
       
       
       ///////////////// 
  
   ///// ******************  on change start   ********************///////////////
   function myFunction() {
         //  alert(11);
       var x = document.getElementById("mySelect").value;
       document.getElementById("demo").innerHTML = "You selected: " + x;
      }
        function option_select(val,id) {
            var max_fields = 10; //maximum input boxes allowed
              var wrapper  = $("#optiondiv"+id); //Fields wrapper
                wrapper.empty();
                 id =  id-1;
            //  alert(wrapper.html());
         // alert(val); 
         // alert(id);
         //  e.preventDefault();
          var   x=1;
          var abv="";
           if(x < max_fields){ //max input box allowed
               x++; //text box increment
             //  $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
             if(val =='field') {
               abv ='<div class="col-md-12">\
                           <div class="col-md-2">\
                                       <div class="well well-sm well-primary">\
                                           <label for="grantpo">Price *</label>\
                                        <input type="number" min="0" class="required-entry form-control"  required id="product_option_2_title"  name="opt_price_field['+id+'][]" value="">\
                                       </div>\
                                   </div>\
                                     <div class="col-md-2">\
                                       <div class="well well-sm well-primary">\
                                           <label for="grantpo"> Price Type *</label>\
                                       <select name="price_type_opt['+id+'][]"  required  id="product_option_2_type" class="select form-control required-option-select" title=""><option value="fixed">Fixed</option><option value="percent">Percent</option></select>\
                                       </div>\
                                   </div>\
                                   <div class="col-md-2">\
                                       <div class="well well-sm well-primary">\
                                           <label for="grantpo">Max Characters </label>\
                                      <input type="number" min="0" class="validate-zero-or-greater form-control" name="opt_maxchar['+id+'][]" value="">\
                                       </div>\
                                   </div>\
                                   <div class="col-md-2"><label for="grantpo"> </label>\
                                   <a href="#" class="remove_field btn btn-danger">Remove</a>\
                                     </div></div>\
                                   </div>';
                    
                 } else if (val =='drop_down') {
                   abv='  <div class="option_select_row_val" id ="option_select_row_val' + id + '"></div>\
                   <div class="col-md-10"><a class="add_option_field_button btn btn-info pull-right" onclick="add_option_field_row('+id+')" >Add More Row</a> </div>';
   
                 }
               
                  $(wrapper).html(abv); 
           }
       }
       ///////********** add more option fields on click start******************//////
         var yf=0
       function add_option_field_row(id) {
         
          
       var max_fields1 = 10; //maximum input boxes allowed
            //  var wrapper  = $(".option_select_row_val"); //Fields wrapper
              var wrapper  = $("#option_select_row_val"+id); //Fields wrapper
           //   alert(2);
           
          var abv="";
           if(yf < max_fields1){ //max input box allowed
               yf++; //text box increment
               ///alert(yf);
          
               abv ='<div class="col-md-11">\
                <div class="col-md-2"><div class="well well-sm well-primary">\
               <label for="grantpo">Title *</label>\
               <input type="text" class="required-entry form-control" id="product_option_2_title"  required name="ddl_option_title['+id+'][]" value=""> </div></div>\
                                          <div class="col-md-2">\
                                       <div class="well well-sm well-primary">\
                                           <label for="grantpo">Price *</label>\
                                        <input type="number" min="0" class="required-entry form-control"  required id="product_option_2_title" name="opt_price_row['+id+'][]" value="">\
                                       </div>\
                                   </div>\
                                     <div class="col-md-2">\
                                       <div class="well well-sm well-primary">\
                                           <label for="grantpo"> Price Type *</label>\
                                       <select name="price_type_opt_row['+id+'][]"  id="product_option_2_type" required class="select form-control required-option-select" title=""><option value="fixed">Fixed</option><option value="percent">Percent</option></select>\
                                       </div>\
                                   </div>\
                                   <div class="col-md-2">\
                                       <div class="well well-sm well-primary">\
                                           <label for="grantpo">Sort Order </label>\
                                      <input type="number" min="0" class="validate-zero-or-greater form-control" name="opt_sort_order_row['+id+'][]"  value="">\
                                       </div>\
                                   </div>\
                                   <div class="col-md-2"><label for="grantpo"> </label>\
                                   <a href="#" class="remove_field btn btn-danger">Remove</a>\
                                     </div></div>\
                                   </div>';               
                  $(wrapper).append(abv); 
           }
       }
    ////*********** product submit *****************************************************************///   
         $("#products_submit11").click(function(){
            var checkgeneral =$('#GeneralOne').find('.form-control').hasClass("sr-msg-error");
           if(checkgeneral){
           $('#GeneralOne').collapse('show');  
            } else {
             alert(2)
            }
       });
   
   /// ***************image upload  and preivews***********************************
   $( "#Productimages11" ).change(function() {
      if(window.File && window.FileList && window.FileReader)
       {
           var filesInput = document.getElementById("Productimages");
           
          // filesInput.addEventListener("change", function(event){    
              
               var files = event.target.files; //FileList object
               var output = document.getElementById("resultimages");
               output.innerHTML = "";
                 //output.empty();
               for(var i = 0; i< files.length; i++)
               {
                   var file = files[i];
                   
                   //Only pics
                   if(!file.type.match('image'))
                     continue;
                   
                   var picReader = new FileReader();
                   
                   picReader.addEventListener("load",function(event){
                       
                       var picFile = event.target;
                       
                       var div = document.createElement("span");
                       
                       div.innerHTML = "<img class='thumbnailaj' src='" + picFile.result + "'" +
                               "title='" + picFile.name + "'/>";
                       
                       output.insertBefore(div,null);            
                   
                   });
                   
                    //Read the image
                   picReader.readAsDataURL(file);
               }                               
              
          // });
       }
       else
       {
           console.log("Your browser does not support File API");
       }
   });
   window.onload = function(){
           
       //Check File API support
       if(window.File && window.FileList && window.FileReader)
       {
           var filesInput = document.getElementById("Productimages");
           
           filesInput.addEventListener("change", function(event){    
              
               var files = event.target.files; //FileList object
               var output = document.getElementById("resultimages");
               output.innerHTML = "";
                 //output.empty();
               for(var i = 0; i< files.length; i++)
               {
                   var file = files[i];
                   
                   //Only pics
                   if(!file.type.match('image'))
                     continue;
                   
                   var picReader = new FileReader();
                   
                   picReader.addEventListener("load",function(event){
                       
                       var picFile = event.target;
                       
                       var div = document.createElement("span");
                       
                       div.innerHTML = "<img class='thumbnailaj' src='" + picFile.result + "'" +
                               "title='" + picFile.name + "'/>";
                       
                       output.insertBefore(div,null);            
                   
                   });
                   
                    //Read the image
                   picReader.readAsDataURL(file);
               }                               
              
           });
       }
       else
       {
           console.log("Your browser does not support File API");
       }
   }

</script>
<script>
   function get_attribute(val) {
    
     $.ajax({
     type: "POST",
     url: "<?php echo BASE_URL; ?>common/products_operations.php?mode=<?php echo base64_encode('get_attribute'); ?>",
     data:'id='+val,
     success: function(data){
          var product_type = $('.product_type').val();
             $("#attribute-list:input").attr("disabled", true);
               if(product_type =='configurable') {
                 $("#attribute-list").html(data);
           }
   
     }
     });
   }
</script>
<?php if($id) {?>
<script>
   function associatedCheckFunction(element){
       var  $value = $(element).val();
      //  alert($value);
       $checked = $(element).is(':checked');
         if($checked){ 
           
               var attributeArray = JSON.parse('<?php if(isset($attributeName))echo json_encode($attributeName); ?>');  
               var attrid_arr = JSON.parse('<?php if(isset($attrid_arr)) echo json_encode($attrid_arr); ?>');  
                var i,option,option_value;
              for (i = 0; i < attributeArray.length; i++) { 
                         var attributeName = attributeArray[i].replace(/\s+/g, '');   
                     option = '#'+attributeName+'_'+$value;
                     // alert(option);
                   var  option_value = $(option).text();
               abv ='<div class="optionaj_'+$value+'"><div class="col-md-11">\
              <div class="col-md-2">\
             <label for="grantpo">Attribute: </label> <b class="option_value">\
                 '+attributeArray[i]+' </b> <br>option: '+option_value+'  <input type="hidden" class="form-control"   name="associated_product_id[]" value="'+$value+'"><input type="hidden" class="form-control"   name="configure_option[]" value="'+option_value+'"> <input type="hidden" class="form-control"   name="configure_attribute_id[]" value="'+attrid_arr[i]+'">\
                 <input type="hidden" class="form-control"   name="configure_attribute_name[]" value="'+attributeArray[i]+'">\
            </div>\
                                        <div class="col-md-2">\
                                         <label for="grantpo">Price *</label>\
                                      <input type="text" class="required-entry form-control"   id="product_option_2_title" name="configure_option_price[]" value="">\
                                 </div>\
                                   <div class="col-md-2">\
                                   \
                                         <label for="grantpo"> Price Type *</label>\
                                     <select name="configure_price_type[]"  id="product_option_2_type" required class="select form-control required-option-select" title=""><option value="fixed">Fixed</option><option value="percent">Percent</option></select>\
                                     \
                                 </div>\
                                </div>\
                                 </div></div>';               
                $("#attribue_value_list").append(abv); 
              }
         }else {
                  var  optionremove = '.optionaj_'+$value;     
                  $(optionremove).remove(); 
             //  alert(optionremove);
         }
     }
   
</script>

<?php }  ?>