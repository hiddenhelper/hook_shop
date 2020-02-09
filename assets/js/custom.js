 $("#contact-us-form").submit(function(){
    var serializeData = $(this).serialize();
    $.ajax({
        type : "POST",
        url	 : "inc/formactions/contact-us.php",
        data : {data:serializeData},
        success: function(data) {			
            if (data == "true") {
                alert("Thanks for submitting!!");
                $("#cname,#cemail,#cmsg").val("");
            }else  {
                 alert("Please Try Again!! | Server Error Occurred ");
                 $("#cname,#cemail,#cmsg").val("");
            }
        }
    });
    return false;
});