


let upload = function(files){

	let accept_format = [
		"image/png",
		"image/jpeg",
		"image/jpg",

	]

	
	console.log(files); 
	console.log(files.length);
	let formData = new FormData();
	let xhr = new XMLHttpRequest();


	let i;
		

	for(i=0;i < files.length;i=i+1){

		if(accept_format.includes(files[i].type) ){
			
			formData.append('file[]', files[i]);
			xhr.open('post', '/PhotoR/Website/php/upload.php');
			//salvare in locale anche il file per avere subito accesso al file
			const reader = new FileReader();
			reader.readAsDataURL(files[i]);

			reader.addEventListener("load",()=>{
				sessionStorage.setItem("recent-upload",reader.result);
				console.log(reader.result);
			});

			console.log("send data: ", formData)
			xhr.send(formData);

			

			xhr.onload = function(){
				var data = this.responseText;
				data =JSON.parse(data)
				console.log("risposta dal server php:")
				if(data[0]["response"] == "200"){
					window.location.replace("/PhotoR/Website/View/editor.php");
				}

			}

			
		
			
		}else{
			console.log("formato non accetto: ", files[i].type)
	}
	}


}


function ToggleMenu(){
	let menu = document.querySelector(".menu");
	menu.classList.toggle("active");
	
}

function Send_File(){
	let Input_File = document.getElementById("file-upload");
	Input_File.click();

}

function Read_File(input){

	let files = input.files;
	
	upload(files);



}



//Manager upload Image Sull server php





window.addEventListener('load',function(){

	
	console.log("Debug: upload event");

	let Dropzone = document.getElementById("dropzone")

	Dropzone.ondrop = function(e){
		
		e.preventDefault();
		files = e.dataTransfer.files;
		console.log(files);
		upload(files);
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












