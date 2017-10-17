
$(document).ready(function(){

    $('#errors').addClass('e-message').fadeOut(10000);
    $('#success').fadeOut(10000);
    $('thead').addClass('thead');
    $('th').addClass('th');
    
    $('.opt').text('please choose a category');
    $('select').css('width','100%').css('border-radius','2px').css('height','30px');

   $('#file').change(function(){
   		var file = $(this).val();
   		if(file != "")
   		{
   			$('#imgmessage').text('You are about to replace current image.').css('color','#FF0808');
   		}
   		else if(file == "")
   		{
   			$('#imgmessage').text('Current image.').css('color','#020D43');
   		}


   		
   	 

   		
   });
});

$(document).ready(function(){
                $('#confirm, #password').keyup(function(){
                    var pass = $('#password');
                    var con = $('#confirm');
                    
                    if((pass.val().length > 0) && (con.val().length > 0))
                    {
                       
                        if(pass.val() !== con.val())
                        {
                            $('.div').text('Password does not match').css('color','red');
                            $('#update').hide().addClass('basic');
                        }
                        else
                        {
                             $('.div').text('');
                             $('#update').show().addClass('basic');
                        }
                    }
                });

        });

$(document).ready(function(){
  $('#profileform').hide();
  $('#controlprofile').click(function(){
      $('#profileform').toggle();
      var cancelupdate = $('#controlprofile').val();
      

      if(cancelupdate === 'Update Profile'){
        $('#controlprofile').attr('value','Cancel Profile Update').css('background','red');
      }
      else  if(cancelupdate === 'Cancel Profile Update'){
        $('#controlprofile').attr('value','Update Profile').css('background','orange');
      }
    
      
        
      
  });



});