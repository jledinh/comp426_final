$( document ).ready(function() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var myObj = JSON.parse(this.responseText);
          console.log(myObj);
          $(".center-align").text("Welcome, "+myObj["first"]+" "+myObj["last"]);
          if (myObj["max"]!= null) {
            $("#high").text("Highest Score: "+myObj["max"]);
          }
          if (myObj["max"]!= null) {
            $("#avg").text("Average Score: "+myObj["avg"]);
          }
          $("#tot").text("Total game played: "+myObj["count"]);
          if (myObj["games"][i]!= null) {
            for (var i=0; i <myObj["games"].length;i++) {
              $(".lastFive").append("<tr><th>"+ myObj["games"][i]["date"] +"</th><th>"+ myObj["games"][i]["wpm"] +"</th></tr>");
            }
          }
          else {
            $(".lastFive").append("<tr><th>"+ " " +"</th><th>"+ " " +"</th></tr>");
          }
        }
  };
  xmlhttp.open("GET", "profile.php", true);
  xmlhttp.send();
});
