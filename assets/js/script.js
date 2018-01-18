// create new users page validation
$("#change_pass").validate({
    rules: {
       new : {
                 minlength : 8
              },
      new_confirm: {
        minlength : 8,
        equalTo: "#new"
      }
    },
})
