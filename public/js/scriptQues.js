  function added(l){
  var x=document.getElementById("added");
  x.innerHTML=l;
  x.style.marginLeft="-280px";
  setTimeout(function(){x.style.marginLeft="0px";},2500)
}
  function submi(){
  var op = String(document.querySelector('input[name = "mcq"]:checked').value);
  var qid= document.getElementsByTagName("span")[0].innerHTML;
  var xhttp= new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if (this.readyState == 4 && this.status == 200) {
          added(this.responseText);
          if(this.responseText==" Correct answer!"){
            var x=document.getElementsByTagName("div")[2];
            var c= x.innerHTML.slice(0,-7);
            console.log(parseInt(document.getElementsByClassName("points")[0].innerHTML.slice(8)));
            x.innerHTML=c+" Points";
          }
        }
    };

    xhttp.open("POST", "/question", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("option="+op+"&qid="+qid);
}