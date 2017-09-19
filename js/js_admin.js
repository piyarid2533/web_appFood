/*------------------- form login -------------------------------*/
function validateForm() {
    var u = document.forms["formlogin"]["username"].value;
    var p = document.forms["formlogin"]["password"].value;
    if (u == "") {
        alert(" กรุณาใส่ Username");document.formlogin.username.focus();
        
        return false;
    }
    if (p == "") {
        alert("กรุณาใส่ Password");document.formlogin.password.focus()
       
        return false;
    }
}/*------------------ end form login ------------------------------*/


function Formfood() {
    var n   = document.forms["formfood"]["food_name"].value;
    var st  = document.getElementById("foodtype_id").value;
    var en  = document.forms["formfood"]["food_energy"].value;
    var pr  = document.forms["formfood"]["food_price"].value;
    var how = document.forms["formfood"]["food_howdo"].value;
    var img = document.forms["formfood"]["food_img"].value;
    var raw = document.forms["formfood"]["food_rawmaterial"].value;
    var de  = document.forms["formfood"]["food_detail"].value;
   
    if (n == "") {
        alert("กรุณาใส่ชื่ออาหาร");document.formfood.food_name.focus();
        return false;
    }if (st == "00") {
        alert('กรุณาประเภทอาหารเมนูอาหาร');document.formfood.foodtype_id.focus();
        return false;
    }if(en ==""){
        alert("กรุณาระบุพลังงาน");document.formfood.food_energy.focus();
        return false;
    }if(pr ==""){
        alert("กรุณาระบุราคา");return false;
    }if(how ==""){
        alert("กรุณาบอกวิธีทำ");return false;
    }if(img ==""){
        alert("กรุณาใส่รูปภาพ");return false;
    }if(raw ==""){
        alert("กรุณาระบุส่วนผสม");return false;
    }if(de ==""){
        alert("กรุณาระบุลายละเอียด");return false;
    }
}/*------------- end form_food ------------------------*/



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


function chk_form() {/** jquery เชคค่าว่างForm พลังงานที่ใช้ในการทำกิจกรรม***/

    $(":input + span.require").remove();
    $(":input").each(function () {
        $(this).each(function () {
            if ($(this).val() == "") {
                $(this).after("<span class=require>« จำเป็นต้องกรอก</span>");
            }
        });
    });
    if ($(":input").next().is(".require") == false) {
        return true;
    } else {
        return false;
    }
}/*------------ End-Form พลังงานที่ใช้ในการทำกิจกรรม**-----------------*/