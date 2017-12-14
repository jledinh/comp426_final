var paraToArray = function(para) {
    var ar = para.split(" ");
    return ar;
}

var reverseString = function(str) {
    var split = str.split("");
    var revArray = split.reverse();
    var revString = revArray.join("");
    return revString;
}

var reverseSplitPara = function(para) {
    var a = paraToArray(para);
    var b = [];
    for (var i=0; i<a.length; i++) {
        var reverse = reverseString(a[i]);
        b.push(reverse);
    }
    return b;
}

function checkOnKeypress(event, array) {
   
}

var typeRacer = function(para) {
    var array = paraToArray(para);
    var revArray = reverseSplitPara(para);
    console.log(revArray);
    var count=0;
    for (var i=0; i<revArray.length; i++) {
        if (i%10==0 && i!=0){
            count=count+1;
        }
        if (i!=revArray.length) {
            $('.box').eq(count).append("<span>"+ revArray[i] +"</span>");
            $('.box').eq(count).append("&nbsp;");
        } else {
            $('.box').eq(count).append("<span>"+ revArray[i] +"</span>");
            $('.box').eq(count).append("&nbsp;");
        }
    }
    var wordindex=0;
    $('.box').eq(0).children().eq(wordindex).css("background-color","white");
    /*
    .each(function() {
        if (count==wordindex) {
            $(this).css("background-color",'white');
        }
        count=count+1;
    }); */
    var start = new Date();
    document.getElementById("input-box").addEventListener("click", function(e) {
        if (wordindex==0) {
            start = new Date();
        }
    });

    document.getElementById("input-box").addEventListener("keypress", function(e) {
        var keyCode = event.hasOwnProperty('which') ? event.which : event.keyCode;
        if (keyCode==32 && document.getElementById("input-box").value == array[wordindex]) {
                var elapsed = new Date() - start;
                var wpm = wordindex/(elapsed/1000)*60;
                $('#wpm').text("Words Per Minute: "+parseInt(wpm));
                document.getElementById("input-box").blur();
                document.getElementById("input-box").focus();
                event.preventDefault();
                wordindex = wordindex+1;
                boxindex = wordindex/10;
                boxindex = parseInt(boxindex);
                $('.box').eq(boxindex).children().eq(wordindex%10).css("background-color","white");
                $('.box').eq(boxindex).children().eq((wordindex-1)%10).css("background-color","transparent");
                if (wordindex%10==0) {
                    $('.box').eq(boxindex-1).children().eq(9).css("background-color","transparent");
                }
            //}
        }
        if (wordindex==array.length) {
            $('.box').each(function() {
                $(this).empty();
            });
            $("#first").append("<h1>Finished! Your words per minute are: "+ parseInt(wpm)+ "</h1>");
        }
    });
}




