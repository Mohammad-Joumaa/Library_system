var userReg=["abedReg"];
var passReg=["123Reg"];

var userInf=["housseinInf"];
var passInf=["456Inf"];

var a=userReg.length;
var b=passReg.length;
var c=userInf.length;
var d=passInf.length;

var max=a;
if(b>max){
	max=b;
}else if (c>max){
	max=c;
}else if (d>max){
	max=d;
}

function ck(){
	
	var x=document.getElementById("u1").value;
    var y=document.getElementById("p1").value;
	
	for(var i=0;i<max;i++){
		if(x==userReg[i] && y==passReg[i]){
			alert("Done");
		}else if(x==userInf[i] && y==passInf[i]){
			
		}else{
			alert("Invalid Username or Password");
		}
	}
	
}