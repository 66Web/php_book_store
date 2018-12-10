function $(idVlue){                          //返回被触发的“id = idVlue”元素对象
    return document.getElementById(idVlue);
}

window.onload = function(){

    $('regname').focus();                   //焦点定位到注册名称文本框
    var cname1,cname2,cpwd1,cpwd2,rname;          //声明5个要检测的数据

    function chkreg(){ //每一次触发键盘事件后调用，判断5个变量，都为yes时注册按钮激活
        if((cname1 == 'yes')&&(cname2 == 'yes')
            &&(cpwd1 == 'yes') &&(cpwd2 == 'yes')&&(rname == 'yes')){
            $('regbtn').disabled = false;
        }else{
            $('regbtn').disabled = true;
        }
    }

    $('regname').onkeyup = function(){     //验证用户名
        username = $('regname').value;        //获取注册名称
        cname2 = '';
        if(username.match(/^[a-zA-Z_]*/)==''){
            $('namediv').innerHTML = '<span id="u_error" >必须以字母或字母下划线开头</span>';
            cname1 = '';
        }else if(username.length <= 3){
            $('namediv').innerHTML = '<span id="u_error" >注册名称必须大于3位</span>';
            cname1 = '';
        }else{
            $('namediv').innerHTML = '<span id="u_success" >注册名称符合标准</span>';
            cname1 = 'yes';
        }
        chkreg();                         //检查是否要激活注册按钮
    };

    $('regname').onblur = function(){      //用户名文本框失去焦点时，调用处理页，检测用户名重复
        username = $('regname').value;        //获取注册名称

        if(cname1 == 'yes'){              //当用户名合格时，才执行进一步操作
            var xhr = new XMLHttpRequest();
            xhr.open('get','checkname.php?username='+username,true);       //创建新请求
            xhr.onreadystatechange = function(){
                if(xhr.readyState == 4){
                    if(xhr.status == 200){
                        var msg = xhr.responseText;        //获取响应内容
                        if(msg == '1'){
                            $('namediv').innerHTML = '<span id="u_success" >恭喜您，该用户名可以使用！</span>';
                            cname2 = 'yes';
                        }else if(msg == '2'){
                            $('namediv').innerHTML = '<span id="u_error" >用户名被占用！</span>';
                        }else{
                            $('namediv').innerHTML = '<span id="u_error" >'+msg+'</span>';
                            cname2 = '';
                        }
                    }
                }
                chkreg();             //检查是否要激活注册按钮
            };
            xhr.send(null);
        }
    };

    $('regpwd1').onkeyup = function(){      //验证密码
        pwd = $('regpwd1').value;
        pwd2 = $('regpwd2').value;
        if(pwd.length < 6){
            $('pwddiv1').innerHTML = '<span id="u_error" >密码长度最少需要6位</span>';
            cpwd1 = '';
        }else if(pwd.length >= 6 && pwd.length < 12){
            $('pwddiv1').innerHTML = '<span id="u_success" >密码强度弱</span>';
            cpwd1 = 'yes';
        }else if((pwd.match(/^[0-9]*$/)!=null)||(pwd.match(/^[a-zA-Z]*$/)!=null)){
            $('pwddiv1').innerHTML = '<span id="u_success" >密码强度中</span>';
            cpwd1 = 'yes';
        }else{
            $('pwddiv1').innerHTML = '<span id="u_success" >密码强度高</span>';
            cpwd1 = 'yes';
        }
        if(pwd2 != '' && pwd != pwd2){
            $('pwddiv2').innerHTML = '<span id="u_error" >两次密码不一致！</span>';
        }else if(pwd2 != '' && pwd == pwd2){
            $('pwddiv2').innerHTML = '<span id="u_success" >密码输入正确</span>';
            cpwd2 = 'yes';
        }
        chkreg();
    };

    $('regpwd2').onkeyup = function(){      //验证二次密码
        pwd1 = $('regpwd1').value;
        pwd2 = $('regpwd2').value;
        if(pwd1 != pwd2){
            $('pwddiv2').innerHTML = '<span id="u_error" >两次密码不一致！</span>';
        }else{
            $('pwddiv2').innerHTML = '<span id="u_success" >密码输入正确</span>';
            cpwd2 = 'yes';
            chkreg();
        }
    };

    $('realname').onkeyup = function(){        //验证真实姓名
        rnamereg = /^[\u4e00-\u9fa5 ]{2,20}$/;
        $('realname').value.match(rnamereg);
        if($('realname').value.match(rnamereg) == null){
            $('rnamediv').innerHTML = '<span id="u_error" >请用中文正确填写</span>';
            rname = '';
        }else{
            $('rnamediv').innerHTML = '<span id="u_success" >姓名输入正确</span>';
            rname = 'yes';
        }
        chkreg();
    };

    $('regbtn').onclick = function(){       //Ajax将用户信息以url的形式传给reginsert.php
        url = 'reginsert.php?username='+$('regname').value
            +'&pwd='+$('regpwd1').value+ '&realname='+$('realname').value;
        alert(url);
        var xhr = new XMLHttpRequest();
        xhr.open('get',url,true);
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4){
                if(xhr.status == 200){
                    var msg = xhr.responseText;        //获取响应内容
                    if(msg == '1'){
                        alert('注册成功！');
                        location = 'login.php';
                    }else{
                        alert(msg);
                    }
                }
            }
        };
        xhr.send(null);
    }

};