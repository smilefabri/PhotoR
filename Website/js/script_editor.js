// Create the filter
var canvas = document.getElementById('canvas');


try {
    var filter = new WebGLImageFilter();
    var filteredImage;
    var type_Filter = null;
    var accept_format = [
		"image/png",
		"image/jpeg",
		"image/jpg",

	]
}
catch( err ) {

    console.log("This browser doesn't support WebGL");
    
}





function Send_File_again(){
	let Input_File = document.getElementById("file-editor");
	Input_File.click();

}




function LoadImageCanvas(temp_image){
    var image = new Image();
    var canvas = document.getElementById('canvas');
    let ctx = canvas.getContext('2d');
    
    
    image.src = temp_image;
    

    image.onload = function () {
        canvas.width = image.naturalWidth   * 1.5
        canvas.height = image.naturalHeight  * 1.4
        imgCenterWidth = canvas.width / 2 - image.width / 2;
        imgCenterHeight = canvas.height / 2 - image.height / 2;
        ctx.drawImage(image, imgCenterWidth,imgCenterHeight-(imgCenterHeight/2));
        
    }


}




window.addEventListener('load',function(){
    


    let file_image = this.sessionStorage.getItem("recent-upload");

    if(file_image){
        LoadImageCanvas(file_image);
    }

    var reset_btn = this.document.getElementById("reset");
    reset_btn.addEventListener('click',()=>{

        LoadImageCanvas(file_image);
        type_Filter = null;

    });

    //TODO filter
    this.document.addEventListener('click',(e)=>{

        if(e.target.classList.contains('Descr_card') ){
            filter.reset();
            
            var canvas = document.getElementById('canvas');
            let ctx = canvas.getContext('2d');
            
            var t_image = new Image();
            

            switch(e.target.getAttribute('value')) {
                case "hue":
                    
                    
                    filter.addFilter('hue',230);
                    t_image.src = file_image
                    filteredImage =filter.apply(t_image);
                    //console.log(filteredImage.toDataURL());
                    LoadImageCanvas(filteredImage.toDataURL());

                    break;
                case "sharpen":
                    
                    
                    filter.addFilter('sharpen');
                    t_image.src = file_image
                    filteredImage =filter.apply(t_image);
                    //console.log(filteredImage.toDataURL());
                    LoadImageCanvas(filteredImage.toDataURL());

                    break; 
                case "Vintage":
                    
                    
                    filter.addFilter('vintagePinhole');
                    t_image.src = file_image
                    filteredImage =filter.apply(t_image);
                    //console.log(filteredImage.toDataURL());
                    LoadImageCanvas(filteredImage.toDataURL());

                    break;

                case "saturation":
                    
                    filter.addFilter('saturation',2);
                    t_image.src = file_image
                    filteredImage =filter.apply(t_image);
                    //console.log(filteredImage.toDataURL());
                    LoadImageCanvas(filteredImage.toDataURL());
    
                    break;

                case "detectEdges":
                        
                        
                        filter.addFilter('detectEdges');
                        t_image.src = file_image
                        filteredImage =filter.apply(t_image);
                        //console.log(filteredImage.toDataURL());
                        LoadImageCanvas(filteredImage.toDataURL());
                        break;
                case "sepia":

                     
                    filter.addFilter('sepia');
                    t_image.src = file_image
                    filteredImage =filter.apply(t_image);
                        //console.log(filteredImage.toDataURL());
                    LoadImageCanvas(filteredImage.toDataURL());
    
                    break;
                case "B&N":

                    
                    filter.addFilter('desaturate',30);
                    t_image.src = file_image
                    filteredImage =filter.apply(t_image);
                    //console.log(filteredImage.toDataURL());
                    LoadImageCanvas(filteredImage.toDataURL());

                  
                    break;
                case "gaussiano":
                   
                    filter.addFilter('blur',10);
                    t_image.src = file_image
                    filteredImage =filter.apply(t_image);
                    //console.log(filteredImage.toDataURL());
                    LoadImageCanvas(filteredImage.toDataURL());
                    // code block
                    break;
                

                default:
                    console.log("il filtro non esiste");
                  // code block
              } 
              type_Filter = e.target.getAttribute('value');

        }
    });

    var download_btn = this.document.getElementById("download");

    download_btn.addEventListener('click',()=>{
        if(type_Filter != null ){

            let send_image = new Image();
            
            send_image.src = filteredImage.toDataURL();
            const type = send_image.src.split(';')[0].split('/')[1];
            
            console.log(type)
            fetch(send_image.src)
            .then(res => res.blob())
            .then(blob => {
            let files = new File([blob], 'download.'+type, blob)
            console.log("mario",files);
            let formData = new FormData();
            let xhr = new XMLHttpRequest();
            console.log(files.length);
         

                if(accept_format.includes(files.type) ){
                    
                    formData.append('file[]', files);
                    formData.append('tipo',type_Filter);
                    xhr.open('post', '/PhotoR/Website/php/download.php');
                    //salvare in locale anche il file per avere subito accesso al file

                    console.log("send data: ", formData)
                    xhr.send(formData);

                    xhr.onload = function(){
                        var data = this.responseText;
                        data =JSON.parse(data)
                        console.log("risposta dal server php:",data)
                        if (data[0]["response"] == "200") {
                            //window.location.replace(data[0]['header'].replace("#","%23"));
                            alert(data[0]['descr'])
                            
                            
                        }

                        if(data[0]["response"] == "600"){
                            alert(data[0]['descr'])
                        }
                        if (data[0]["response"] == "400") {
                            alert(data[0]['descr'])
                            
                        }
                        if (data[0]["response"] == "505") {
                            alert(data[0]['descr'])
                            
                        }
                        if (data[0]["response"] == "404") {
                            alert(data[0]['descr'])
                            
                        }
                        
        
                    }
        


                }
            
            
            })
            
            





        }else{
            this.alert("devi applicare almeno un filtro");
            console.log("Debug: non hai elaborato l'immagine");

        }
        


    });
    

});

