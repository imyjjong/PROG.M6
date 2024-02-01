import { WebCamHelper } from "./webcamhelper.js";


class WebCamApp{
    constructor(){
        this.imageForm = document.getElementById("imageForm");
        this.downloadLink = document.getElementById("link");
        this.webapi = new WebCamHelper();
        
    }
    Init(){
        this.webapi.startApi();
        this.imageForm = addEventListener("submit", (event)=>{
            event.preventDefault();
            this.TakePhotoClicked();
        })
    }
    TakePhotoClicked(){
        if(this.webapi.ready){
            this.CapturePhoto();
        }
    }
    CapturePhoto(){
        this.webapi.GrabFrame(async (imageBitmap)=>{
            let imageBlob = await this.webapi.GrabFrameToCanvas(imageBitmap, "canvas");
            this.SendBlob(imageBlob);
        })
    }
    SendBlob(imageBlob){
        let formData = new FormData();
        formData.append("image", imageBlob, "image.png");
    
        let options = {
            method: 'POST',
            body: formData
        };
    
        fetch("imagerecieve.php", options)
        .then(async(response)=>{
            console.log(response);
            let json = await response.json()
            this.ShowLink(json);
        });
    }
    ShowLink(json){
        
    }
}
let application = new WebCamApp()
application.Init();