function $(idVlue){                          //返回被触发的“id = idVlue”元素对象
    return document.getElementById(idVlue);
}

window.onload = function(){

    $('lgname').focus();                     //光标定位到用户名输入框

    $('lgname').onkeydown = function(){      //处理用户名输入框的键盘按下事件
        if(event.keyCode == 13){             //当按下Enter键时，光标自动下移
            $('lgpwd').select();             //密码获取焦点
        }
    };

    $('lgpwd').onkeydown = function(){       //处理密码框的键盘按下事件
        if(event.keyCode == 13){
            chklg();
        }
    };

    function chklg() {
        if ($('lgname').value.match(/^[a-zA-Z]\w*$/) == null) {     //判断用户名合法，第一位必须是英文字母，不允许有特殊字符
            alert("请输入合法名称");
            $('lgname').select();
            return false;
        }

        if ($('lgname').value == '') {                              //判断用户名是否为空
            alert("请输入用户名！");
            $('lgname').focus();
            return false;
        }

        if ($('lgpwd').value == '') {                              //判断密码是否为空
            alert("请输入密码！");
            $('lgpwd').focus();
            return false;
        }
    }

    $('lgbtn').onclick = function(){
        url = 'logincheck.php?username='+$('lgname').value+'&password='+$('lgpwd').value;
        var xhr = new XMLHttpRequest();
        xhr.open('get',url,true);
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4){
                if(xhr.status == 200){
                    var msg = xhr.responseText;                   //获取响应内容
                    if(msg == '0'){
                        alert('用户名或密码不允许为空');
                        $('lgpwd').select();
                    }else if(msg == '1'){
                        alert('用户名或密码输入错误');
                        $('lgpwd').select();
                    }else if(msg == '-1'){
                        alert('登录成功');
                        location = 'person/index.php';
                    }else{
                        alert(msg);
                    }
                }
            }
        };
        xhr.send(null);
    };

};