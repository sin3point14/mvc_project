      $(".info-item .btn").click(function(){
        $(".container").toggleClass("log-in");
      }
                                );
     /* $(".container-form .btn").click(function(){
        $(".container").addClass("active");
      }
                                 );*/
  function added(l){
  var x=document.getElementById("added");
  x.innerHTML=l;
  x.style.marginLeft="-280px";
  setTimeout(function(){x.style.marginLeft="0px";},2500)
}
      function signup(){
          var usr=document.getElementById('usrs').value;
          var passw=document.getElementById('passs').value;
          var dis=document.getElementById('display').value;
          post('username='+usr+'&pass='+passw+'&display='+dis);
      }
      function signin(){
        var usr=document.getElementById('usr').value;
        var passw=document.getElementById('pass').value;
        post('username='+usr+'&pass='+passw);
      }
      document.getElementById('logbtn').addEventListener('click',signin);
      function post(params) {
        var xhttp = new XMLHttpRequest(); 
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          if(this.responseText[0]=="U"||this.responseText[0]=="D"||this.responseText[0]=="I")
           added(this.responseText);
         else
            window.location=this.responseText;  
        }
      };
      xhttp.open("POST", "/", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send(params);
      }