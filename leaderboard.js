$( document ).ready(function() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var myObj = JSON.parse(this.responseText);
          for (x in myObj) {
            $("#scores tr:last").after("<tr><th>"+ myObj[x]["userName"] +"</th> <th>"+ myObj[x]["wpm"] +"</th> <th>"+ myObj[x]["date"] +"</th></tr>");
          }
        }
  };
  xmlhttp.open("GET", "leaderboard.php", true);
  xmlhttp.send();
});
