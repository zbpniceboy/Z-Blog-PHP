    var days ,hour , minute , seconds ,text,tim = null;
    function Times(year,month,day,hour,minute,second){
        var nowDate = new Date();
        var endDate = new Date(year,month-1,day,hour,minute,second);
        var getDate = endDate - nowDate;//获取剩余的毫秒数
        days = intTime(parseInt(getDate/1000/60/60/24));//获取天数
        hour = intTime(parseInt(getDate/1000/60/60%24));//获取小时
        minute = intTime(parseInt(getDate/1000/60%60));//获取分钟
        seconds = intTime(parseInt(getDate/1000%60));//获取秒
        var Day = document.getElementById('day');
        var Hour = document.getElementById('hour');
        var Minute = document.getElementById('minute');
        var Seconds = document.getElementById('seconds');
        var tit = document.getElementById('tit');
        var box = document.getElementById('box');

        (days > 0)?(Day.style.display="inline-block"):(Day.style.display = "none");
        (days > 0)?(Hour.style.display="inline-block"):((hour > 0)?(Hour.style.display="inline-block"):(Hour.style.display="none"));
        (hour>0)?(Minute.style.display ="inline-block")
          :((minute>=0)?(Minute.style.display ="inline-block")
          :((seconds>0)?(Minute.style.display ="inline-block")
          :(Minute.style.display = "none")));
        if(seconds>=0){
          tit.style.display = 'block';
          (days > 0)?(Day.innerHTML = "<i>"+days+"</i><em>天</em>"):(Day.style.display="none");
          (days > 0)?(Hour.innerHTML = "<i>"+hour+"</i><em>时</em>"):((hour > 0)?(Hour.innerHTML = "<i>"+hour+"</i><em>时</em>"):(Hour.style.display="none"));
          (hour>0)?(Minute.innerHTML = "<i>"+minute+"</i><em>分</em>")
          :((minute>=0)?(Minute.innerHTML = "<i>"+minute+"</i><em>分</em>")
          :((seconds>0)?(Minute.innerHTML = "<i>"+minute+"</i><em>分</em>")
          :(Minute.style.display = "none")));
          Seconds.innerHTML ="<i>"+seconds+"</i><em>秒</em>";
          Seconds.style.display = "inline-block";
        }else{
          tit.style.display = "none";
          box.innerHTML=text;
          box.style.fontSize = "25px";
          box.style.color = "red";
          window.clearInterval(tim);
          tim = null;
        }

    };
    function intTime(t){
      if(t<10){
        t = "0" + t;
      }
      return t;
    }
    function AutoInt(y,m,d,h,min,sec,str){
      tim = setInterval("Times("+y+","+m+","+d+","+h+","+min+","+sec+")",1000);
      text = str;
    }