$( document ).ready(function() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var myObj = JSON.parse(this.responseText);
          for (x in myObj) {
            console.log(myObj[x][0]);
          }
        }
  };
  xmlhttp.open("GET", "leaderboard.php", true);
  xmlhttp.send();
});
