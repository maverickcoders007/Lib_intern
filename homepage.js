function opensb() {
  document.getElementById("sidebar").style.width = "30%";
  document.getElementById("overlay").style.visibility="visible";
  document.body.style.overflow="hidden";
}
/*function popup()
{
    document.getElementById("sideiconpopup").style.visibility="visible";
}

function popupclose()
{
    document.getElementById("sideiconpopup").style.visibility="hidden";
}*/

function bblink()
{
    window.location.href="booksborrowed.php";
}

function feedback()
{
    /*document.getElementById("sideiconpopup").style.visibility="hidden";
    document.getElementById("sideicon").style.visibility="hidden";*/
    document.getElementById("overlay").style.visibility="visible";
    document.getElementById("feedbackform").style.visibility="visible";
}

function closefeedback()
{
    /*document.getElementById("sideicon").style.visibility="visible";*/
    document.getElementById("sidebar").style.width = "0";
    document.body.style.overflow="visible";
    document.getElementById("overlay").style.visibility="hidden";
    document.getElementById("feedbackform").style.visibility="hidden";
    /*document.body.clientheight gives the total height of the page*/
}


var prevScrollpos = window.pageYOffset;

window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos >= currentScrollPos) {
    document.getElementById("header").style.top = "0";
  } else {
    document.getElementById("header").style.top = "-55px";
  }

  console.log(prevScrollpos);
  console.log(currentScrollPos);
  prevScrollpos = currentScrollPos;

  /*console.log("PYO="+window.pageYOffset);*/

  var remainingheight=document.documentElement.clientHeight-document.getElementById("footer").offsetHeight;
  /*console.log("RH="+remainingheight);*/

  var sub=document.body.scrollHeight-window.pageYOffset;
  /*console.log("Sub="+sub);*/

  if(window.pageYOffset>300&&sub>remainingheight+250)
  {
    /*document.getElementById("sideicon").style.visibility="visible";*/
    document.getElementById("sideicon").style.opacity="1";
  }

  else
  {
    /*document.getElementById("sideicon").style.visibility="hidden";*/
    document.getElementById("sideicon").style.opacity="0";
  }
}

function totop()
{
    window.scroll({
        top: 0, 
        left: 0, 
        behavior: 'smooth'
      });
}

function gotolink(url)
{
    /*alert(url);*/
    window.location.href=url;
}


