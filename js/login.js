

//选择男孩
function func_choose_boy(){
    document.getElementById('boy').setAttribute("src","../images/super_selected.png");
    document.getElementById('girl').setAttribute("src","../images/princess_failed.png");
    document.getElementById('gender_des').setAttribute("src","../images/chi_boy.png");
}

//选择女孩
function func_choose_girl(){
    document.getElementById('boy').setAttribute("src","../images/super_failed.png");
    document.getElementById('girl').setAttribute("src","../images/princess_selected.png");
    document.getElementById('gender_des').setAttribute("src","../images/chi_girl.png");
}

//提交按钮开启
function func_enable_submit(){
    document.getElementById('nickname').setAttribute("value","");
    document.getElementById('bn_submit').setAttribute("src","../images/submit_pressed.png");
}

//提交
function func_submit(){
    if(document.getElementById('bn_submit').getAttribute("src") == "../images/submit_pressed.png"){
        alert("登录");
    }
}