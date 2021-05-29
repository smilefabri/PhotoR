window.addEventListener('load',function(){
    let file_image = this.sessionStorage.getItem("recent-upload");
    if(file_image){
        LoadImageCanvas(file_image);
    }



});



function LoadImageCanvas(temp_image){

    var canvas = document.getElementById('canvas_image');
    var image = new Image();
    image.src = temp_image;
    let ctx = canvas.getContext('2d');

    image.onload = function () {
    canvas.width = image.naturalWidth   * 1.5
    canvas.height = image.naturalHeight  * 1.4
    imgCenterWidth = canvas.width / 2 - image.width / 2;
    imgCenterHeight = canvas.height / 2 - image.height / 2;
    ctx.drawImage(image, imgCenterWidth,imgCenterHeight-(imgCenterHeight/2));

    }

}
