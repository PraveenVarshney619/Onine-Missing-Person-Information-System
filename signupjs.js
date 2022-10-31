function redirect(){
    var flag1=false;
    var flag2=false;
    var flag3=false;
    var flag4=false;
    var flag5=false;
    var fn=document.getElementById("fulln").value;
    var pattern1=/^[a-zA-Z]+ [a-zA-Z]+$/;
    if(pattern1.test(fn)==true)
    {
        flag1=true;
    }
    else
    {
        alert("Invalid Fullname");
    }
    var un=document.getElementById("usern").value;
    var pattern2=/^[a-zA-Z0-9]+$/;
    if(pattern2.test(un)==true)
    {
        flag2=true;
    }
    else
    {
        alert("Invalid Username");
    }
    var pw=document.getElementById("passw").value;
    if(pw.length>7)
    {
        flag3=true;
    }
    else
    {
        alert("Password Length Should be Atleast 8 characters");
    }
    var ad=document.getElementById("aadhaar").value;
    if(ad.length==12)
    {
        flag4=true;
    }
    else
    {
        alert("Invalid Aadhaar Number");
    }
    var mn=document.getElementById("mobno").value;
    if(mn.length==10)
    {
        flag5=true;
    }
    else
    {
        alert("Invalid Mobile Number");
    }
}