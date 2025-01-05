$(document).ready(() => {
//validateForm()
 
 const submitMessage = () => {
    let valid = validateForm();
   
    if (valid) {
      const userInfo = {
      name: $('#name').val(),
      email: $('#email').val(),
      message: $('#message').val()
     };  
    //   console.log(valid)
    //   console.log(userInfo)
    $.ajax({
      method: 'POST',
      url: './getUserMessage.php',
      cache: false,
      datatype: 'json',
      data: userInfo
    }).done(function (result) {
      //console.log(typeof (result));
      const parsed = JSON.parse(result);
      
      $.each(parsed, (i, j) => {
        let message = j['message'];
        if (j['success'] == false) {
          console.log(j['message'])
//         const errors = result['data']['errors'];
//         $.each(errors, (i, error) => {
//           //console.log(error);
//           if (error) {
//             $(`<ul><li>${error}</li></ul>`).appendTo('#contactForm').addClass('text-danger');
           }
//         });
//       } else {
//         $(`<p>Message successfuly submitted!</p>`).appendTo('#contactForm').addClass('text-success');
    //   }
      }) 
        
      
    // console.log();
      
//       if (result['data']['success'] == false) {
//         let errors = result['data']['errors'];
//         $.each(errors, (i, error) => {
//           //console.log(error);
//           if (error) {
//             $(`<ul><li>${error}</li></ul>`).appendTo('#contactForm').addClass('text-danger');
//           }
//         });
//       } else {
//         $(`<p>Message successfuly submitted!</p>`).appendTo('#contactForm').addClass('text-success');
    //   }

    });
//     } else {
//       console.log('Required ')
   }   
         
    }
    //submitMessage();
    $('button#submit').on('click', (e) => {
        e.preventDefault();
    // //    // e.stopImmediatePropagation();
        submitMessage();
    // //     //e.stopImmediatePropagation();
   });



});

