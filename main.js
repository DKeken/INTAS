$("#contactForm").submit(function(event){

    event.preventDefault();
    submitForm();
});
function submitForm(){
   
    var name = $("#name").val();
    var phone = $("#phone").val();
    var email = $("#email").val();
    var message = $("#message").val();
 
    $.ajax({
        type: "POST",
        url: "mail.php",
        data: "name=" + name + "&email=" + email + "&message=" + message + "&phone=" + phone,
        success : function(text){
            if (text == "success"){
                formSuccess();
            }
        }
    });
}
function formSuccess(){
    $( "#msgSubmit" ).removeClass( "d-none" );
}