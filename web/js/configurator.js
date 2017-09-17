 $(document).ready(function(){
  

//----------------------------------------------------------------------
$('#selecteddepartment').on('change', function (e) {
	var department_id = $('option:selected', this).val();
	console.log(department_id);

	$.ajax({
       url: '/site/getzboresbydepartment',
       type: 'post',
	   dataType: 'json',
//	   async:false,
       data: {
				department_id: department_id,
             },
       success: function (respond) {


           $('#selectedzbir >option').remove();

           var mynewselect= $('#selectedzbir');
           var defaultSelected = false;
           var nowSelected     = false;
           mynewselect.append( new Option('Select Zbir',0,defaultSelected,nowSelected) );
           $("#zbir").hide();
           $("#no_zbir, #zbir_fields, #other_fields").hide();

		 if( typeof respond.error === 'undefined' ){
		  zbores=respond.zbores;
		  if (zbores.length>0){
  		    console.log(zbores.length);
		    for (var i = 0; i < zbores.length; i++) {
	  	    id = zbores[i].id;
			name = zbores[i].name;
			mynewselect.append( new Option(name,id) );
		    }
              $("#zbir").fadeTo(1000,1);
	      }
		 }
		 else
           {
               content = respond.error;
               content+='<a class="btn btn-success" href="/zbir/create">Utwórz</a>';
               $("#zbir").fadeTo(1000,1);
               $('#no_zbir').html(content);
               $("#no_zbir").fadeTo(1000,1);

           }
		}
	});
  });
//----------------------------------------------------------------------

//----------------------------------------------------------------------
     $('#selectedzbir').on('change', function (e) {
         var zbir_id = $('option:selected', this).val();
         console.log(zbir_id);

         $.ajax({
             url: '/site/getzbirfields',
             type: 'post',
             dataType: 'json',
//	   async:false,
             data: {
                 zbir_id: zbir_id,
             },
             success: function (respond) {

             	content='';

                 $("#zbir_fields").hide();

                 if( typeof respond.error === 'undefined' ){
                     zbirfields = respond.zbirfields;
                     if (zbirfields.length>0){
                         console.log(zbirfields.length);
                         for (var i = 0; i < zbirfields.length; i++) {
                             id = zbirfields[i].id;
                             name = zbirfields[i].name;
                             checkflag = zbirfields[i].status;
                             if (checkflag == 1 ) {
                                 checked='checked'
                             }
                             else
                             {
                                 checked='';
                             }
					console.log(content);
                             content+='<input type="checkbox"'+ checked+' value="'+id+'" name="checkboxes_zbir_fields" id="zbirfield'+id+'" /> '+name+'</br>';
                         }
                         $("#other_fields").fadeTo(1000,1);
                     }
                 }
                 else
				 {
                     $("#other_fields").hide();
				 	content = respond.error;
                    content+='<a class="btn btn-success" href="/zbirpol/create">Utwórz</a>';
				 }
                 $('#zbir_fields').html(content);
                 $("#zbir_fields").fadeTo(1000,1);

             }
         });
     });
//----------------------------------------------------------------------



 });
 
