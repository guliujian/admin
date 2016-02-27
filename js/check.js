/**
 * Created by bob on 16/2/26.
 */
function chk_form(){
    var user = document.getElementById("username");
    console.log(user);
    if(user.value==""){
        console.log("用户名不能为空！");
        return false;
        //user.focus();
    }
    var pass = document.getElementById("password");
    console.log(pass);
    if(pass.value==""){
       console.log("密码不能为空！");
        return false;
        //pass.focus();
    }
}
function chk_form1(){
    var user1=document.getElementById("username1");
    var pass1=document.getElementById("password1");
    var repeatPass =document.getElementById("repeatPassword");
    var email1 = document.getElementById("email");
    var preg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
    console.log(user1);
    if(user1.value=""){
        //alert("用户名不能为空");
        console.log("yonghuming");
        return false;
    }

    //if (pass1.value=""){
    //    console.log("mimabuneng");
    //    return false;
    //}
    //if(repeatPass.value=""){
    //    console.log("repeat");
    //    return false;
    //}
    //if(email1.value==""){
    //    console.log("email error");
    //    return false;
    //    //email.focus();
    //}
    // //匹配Email
    //if(!preg.test(email1.value)){
    //    console.log("Email格式错误！");
    //    return false;
    //    //email.focus();
    //}
    //
    //if(pass1.value!=repeatPass.value){
    //    console.log("两次输入密码不一样");
    //    return false;
    //}
}