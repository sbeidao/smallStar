/**
 * Created by penguin on 7/9/16.
 */
//跳转至卡片库
function func_card_library(){
}

//返回按钮
function func_back() {
    document.getElementById('bn_back').setAttribute("src","../images/back_pressed.png");
    history.back(-1);
}