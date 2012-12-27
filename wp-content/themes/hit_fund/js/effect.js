window.onload = function() {
	var m=document.getElementById("test");
	var nn=new SKclass(m,40,40);
	nn.start();
}

function SKclass (obj,Rate,speed) {
	 var oL=obj.offsetLeft;
	 var oT=obj.offsetTop;
	 this.stop=null;
	 this.oTime=null;
	 this.state=0;
	 var om=this;
	 this.start=function(){
		if(this.state==0){
		 ostart();
		 setTimeout(function(){clearTimeout(om.oTime);state = 0}, 1500);
		 this.state=1;
		}
	 }
	 var ostart=function(){
			 if(parseInt(obj.style.left)==oL-4){
				obj.style.top=oT+4+"px";
				setTimeout(function(){obj.style.left=oL+4+"px"},Rate)
			 }
			 else{
				obj.style.top=oT-4+"px";
				setTimeout(function(){obj.style.left=oL-4+"px"},Rate)
			}
		om.oTime=setTimeout(function(){ostart()},speed);
	 }
}


