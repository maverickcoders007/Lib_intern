function popup()
{
    document.getElementById("sideiconpopup").style.visibility="visible";
}

function popupclose()
{
    document.getElementById("sideiconpopup").style.visibility="hidden";
}

function bblink()
{
    window.location.href="booksborrowed.php";
}

function feedback()
{
    document.getElementById("sideiconpopup").style.visibility="hidden";
    document.getElementById("sideicon").style.visibility="hidden";
    document.getElementById("overlay").style.visibility="visible";
    document.getElementById("feedbackform").style.visibility="visible";
}

function closefeedback()
{
    document.getElementById("sideicon").style.visibility="visible";
    document.getElementById("overlay").style.visibility="hidden";
    document.getElementById("feedbackform").style.visibility="hidden";
}


