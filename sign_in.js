var login = function() {
  var username= $("#sign_user").val();
  var password= $("#sign_pass").val();
  console.log(username);
  console.log(password);
  $.ajax({
        type: "POST",
        url: '/Courses/comp426-f17/users/jledinh/final/login.php',
        data: {user: username, pass: password},
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: successFunc,
        error: errorFunc
    });
  function successFunc(data) {
    alert(data['type']);
    if (data["status"]==200) {
      location.replace("https://www.w3schools.com");
    }
    else if (data["status"]==401){
      alert(data["user"]);
      location.replace("sign_in.php");
    }
    else {
      location.replace("https://facebook.com");
    }
  }

  function errorFunc() {
    alert("error");
    console.log("ERRORS");
  }
}
