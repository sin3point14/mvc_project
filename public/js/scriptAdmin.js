function added(l){
  var x=document.getElementById("added");
  x.innerHTML=l;
  x.style.marginLeft="-280px";
  if(l=='Question has been added!'){
  	let b=document.getElementById("qid");
  	let d=parseInt(b.innerHTML);
  	b.innerHTML=d+1;
  	document.getElementsByName('o1')[0].value='';
document.getElementsByName('o2')[0].value='';
document.getElementsByName('o3')[0].value='';
document.getElementsByName('o4')[0].value='';
document.getElementById('points').value='';
document.getElementsByName('q_title')[0].value='';
document.getElementsByName('q')[0].value='';
  }
  setTimeout(function(){x.style.marginLeft="0px";},2500)
}

function addq(){
	var name= document.getElementsByName('q')[0].value;
	var title= document.getElementsByName('q_title')[0].value;
	var op = String(document.querySelector('input[name = "mcq"]:checked').value);
	var points = String(
		document.getElementById('points').value);
	var o1=String(document.getElementsByName('o1')[0].value);
	var o2=String(document.getElementsByName('o2')[0].value);
	var o3=String(document.getElementsByName('o3')[0].value);
	var o4=String(document.getElementsByName('o4')[0].value);
	var xhttp= new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if (this.readyState == 4 && this.status == 200) {
        	added(this.responseText);
        }
    };
    xhttp.open("POST", "/admin", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("n="+name+"&o="+op+"&p="+points+"&o1="+o1+"&o2="+o2+"&o3="+o3+"&o4="+o4+"&title="+title);



  }
