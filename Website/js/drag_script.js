
function ToggleMenu(){
	let menu = document.querySelector(".menu");
	menu.classList.toggle("active");
	
}





//Manager upload Image Sull server php




window.addEventListener('load',function(){

	const canvas = this.document.getElementById("canvas_image");
	console.log("Debug: upload event");

	let accept_format = [
		"image/png",
		"image/jpeg",
		"image/jpg",

	]

	let Dropzone = document.getElementById("dropzone")

	let upload = function(e){

	
		files = e.dataTransfer.files
		console.log(files); 

		let formData = new FormData();
		let xhr = new XMLHttpRequest();

	
		let i;
			
	
		for(i=0;i < files.length;i=i+1){
			if(accept_format.includes(files[i].type) ){
				
				formData.append('file[]', files[i]);
				xhr.open('post', '/PhotoR/Website/php/upload.php');
				console.log("send data: ", formData)
				xhr.send(formData);
				xhr.onload = function(){
					var data = this.responseText;
					console.log("risposta dal server php:")
					console.log(data)
				}
			
				
			}else{
				console.log("formato non accetto: ", files[i].type)
		}
		}
		
	


	
	
	}


	Dropzone.ondrop = function(e){
		
		e.preventDefault();
		upload(e)
		//upload(e)
		return false;
	}





	Dropzone.ondragover = function(){
		return false;

	}

	Dropzone.ondragleave = function(){

		return false;
	}




});












