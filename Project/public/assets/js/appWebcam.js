import { WebCamHelper } from "./webcamhelperjs";

class WebCamApp{
    constructor(){
        this.imageForm = document.getElementById("imageForm");
        this.downloadLink = document.getElementById("link");
        this.webapi = new WebCamHelper();
    }
    Init(){
        this.webapi.startApi();
    }
}
let application = new WebCamApp()
application.Init();