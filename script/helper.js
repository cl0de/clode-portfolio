const validateForm = () => {
    let valid = true;
//     $(".form-control").css('background-color', '');
//     $(".info").html('');
    if (!$("#name").val()) {
        $("#name-validation").html(" (Name is required)");
        $("#name-validation").css("color", "red");
        $("#name.form-control").addClass('error');
        valid = false;
    } else {
        $('#name.form-control').removeClass('error');
        $("#name-validation").hide();
    }
    if (!$("#email").val()) {
        $("#email-validation").html(" (Email is required)");
        $("#email-validation").css("color", "red");
        $("#email.form-control").addClass('error');
        $("#name.form-control").addClass('error');
        valid = false;
    }
    const emailRegExp = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    // match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)
    if (!$("#email").val().match(emailRegExp)) {
        $("#email-validation").html("(Invalid email)");
        $("#email-validation").css("color", "red");
        $("#email.form-control").addClass('error');
        valid = false;
    }
//     // if (!$("#subject").val()) {
//     //     $("#subject-info").html("(required)");
//     //     $("#subject").css('background-color', '#FFFFDF');
//     //     valid = false;
//     // }
    if (!$("#message").val()) {
        $("#message-validation").html(" (Message is required)");
        $("#message-validation").css("color", "red");
        $("#message.form-control").addClass('error');
        valid = false;
    }
    return valid;
 }