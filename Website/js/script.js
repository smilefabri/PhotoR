document.querySelector('.img-btn').addEventListener('click', function()
	{
		document.querySelector('.cont').classList.toggle('s-signup')
	}
);



window.addEventListener('load',function(){

	const canvas = this.document.getElementById("canvas_image");
	console.log("Debug: upload event");

	let accept_format = [
		"image/png",
		"image/jpeg",
		"image/jpg",

	]

	let Dropzone = document.getElementById("dropzone")



	Dropzone.ondrop = function(e){
		
		e.preventDefault();
		
		const files = e.dataTransfer.files;
		

		if(accept_format.includes(files[0].type) ){
				
			//formData.append('file[]', files[i]);
			const reader = new FileReader();
			reader.readAsDataURL(files);
			let img = new Image();

			img.src = reader.result;

			canvas.width = img.width;
			canvas.height = img.height;
			ctx.drawImage(img,0,0,img.width,img.height);


		}else{
			console.log("formato non accetto: ", files[i].type)
		}
		//upload(e)
		return false;
	}





	Dropzone.ondragover = function(){
		return false;

	}

	Dropzone.ondragleave = function(){

		return false;
	}

	const DowloandBtn = this.document.getElementById('download-btn')
	DowloandBtn.onclick = function(){

	}


});