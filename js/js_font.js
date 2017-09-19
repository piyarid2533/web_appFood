/* 
 Dev . Piyarid
 */

/*--------------form member----------------*/
function memberForm(){
    var u = document.forms
    ["form_member"]["username"].value;
    var p = document.forms
    ["form_member"]["password"].value;
    var n = document.forms
    ["form_member"]["member_name"].value;
    var s = document.forms
    ["form_member"]["member_sex"].value;
    var a = document.forms
    ["form_member"]["member_address"].value;
    var t = document.forms
    ["form_member"]["member_mobile"].value;
    
    if(u==""){
         alert(" กรุณาใส่ Username");
         document.form_member.username.focus();
         return false;}
    
    if(p==""){
         alert(" กรุณาใส่ Password");
         document.form_member.username.focus();
         return false;}
    
    if(n==""){
         alert("กรุณาใส่ชื่อผู้ใช้");
         document.form_member.member_name.focus();
         return false;}
     
    if(s==""){
         alert("กรุณาระบุเพศ");
         document.form_member.member_sex.focus();
         return false;}
     
    if(a==""){
         alert("กรุณาใส่ที่อยู่");
         document.form_member.member_address.focus();
         return false;}
     
    if(t==""){
         alert("กรุณาใส่หมายเลขโทรศัพท์");
         document.form_member.member_mobile.focus();
         return false;}
}/*--------------End form member----------------*/

function NewWindow(mypage, myname, w, h, scroll) 
{/*--------------------- windows Newwindow -----------------------------*/
    
    var win = null;
    
    LeftPosition  = (screen.width) ? (screen.width - w) / 2 : 0;
    TopPosition   = (screen.height) ? (screen.height - h) / 2 : 0;
    settings      =  'height=' + h + ',\n\
                        width=' + w + ',\n\
                        top=' + TopPosition + ',\n\
                        left=' + LeftPosition + ',\n\
                        scrollbars=' + scroll + ',\n\
                        resizable'
                        win = window.open(mypage, myname, settings)
                        
}/*--------------------- End Newwindow -----------------------------*/


