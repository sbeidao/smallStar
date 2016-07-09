
//返回按钮
function func_back() {
    document.getElementById('bn_back').setAttribute("src","../images/back_pressed.png");
    history.back(-1);
}


//跳转至卡片库
function func_card_library(){
    location.href="card_library.php?openid="+openid;
}

//测试
function test() {
    location.href="share.php";
}

function getUrlParam(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
            var r = window.location.search.substr(1).match(reg);  //匹配目标参数
            if (r != null) 
            	//return decodeURI(unescape(r[2])); 
            	return decodeURIComponent(r[2]); 
            return null; //返回参数值
}