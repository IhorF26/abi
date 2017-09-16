 $(document).ready(function(){
  

//----------------------------------------------------------------------
$('#selecteddepartment').on('change', function (e) {
	var department_id = $('option:selected', this).val();
	console.log(department_id);

	$.ajax({
       url: '/site/getzbioresbydepartment',
       type: 'post',
	   dataType: 'json',
//	   async:false,
       data: {
				department_id: department_id,
             },
       success: function (respond) {

           $('#selectedzbior >option').remove();

           var mynewselect= $('#selectedzbior');
           var defaultSelected = false;
           var nowSelected     = false;
           mynewselect.append( new Option('Select Zbior',0,defaultSelected,nowSelected) );
           $("#zbior_fields").hide();

		 if( typeof respond.error === 'undefined' ){
		  zbiores=respond.zbiores;
		  if (zbiores.length>0){
  		    console.log(zbiores.length);
		    for (var i = 0; i < zbiores.length; i++) {
	  	    id = zbiores[i].id;
			name = zbiores[i].name;
			mynewselect.append( new Option(name,id) );
			$("#zbior_fields").fadeTo(1000,1);
		    }
	      }
		 }
		}
	});
  });
//----------------------------------------------------------------------

 });
 
