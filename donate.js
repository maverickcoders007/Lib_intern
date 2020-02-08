var url;

function createreq()
{
    var xhttp;
    if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } 
    else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    return xhttp;
}

function gotolink(url)
{
    /*alert(url);*/
    window.location.href=url;
}

function yeahsubmit()   
{  
    var rno=document.getElementById("rno").value;
    var title=document.getElementById("title").value;
    var author=document.getElementById("author").value;
    var rollnostatus=document.getElementById("rollnostatus").innerHTML;

    if(rno!=""&&title!=""&&author!=""&&rollnostatus==="")
    {
    /*document.getElementById("suggform").reset();
    window.location.href="thankyou.php";*/

    xhttp=createreq();
    
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if(this.responseText==="Done")
      {
          /*window.location.href="thankyou.php";*/
          window.scrollTo(0, 0); //Scroll to top
          document.getElementById("titleheadinside").style.visibility="hidden";
          document.getElementById("backicon").style.visibility="hidden";
          document.getElementById("thanks").style.visibility="visible";
          document.getElementById("donform").style.visibility="hidden";
      }

      else
      {
          window.location.href="error.php";
      }
    }
    };

    var parameters="rno="+rno+"&title="+title+"&author="+author;

    xhttp.open("POST", "doninsert.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //To tell the server that the parameters passed are name value pairs
    xhttp.send(parameters);
    }

    else
    {
        window.scrollTo(0, 0); //Scroll to top
    }
}

function checkrno()
{
    var rno=document.getElementById("rno").value;

    check=createreq();
    check.onreadystatechange=function()
    {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("rollnostatus").innerHTML=this.responseText;
        }
    };

    var url="checkrno.php"+"?rno="+rno;
    check.open("GET",url,true);
    check.send(null);
}