var manualUploader=new qq.FineUploader({element:document.getElementById('fine-uploader-manual-trigger'),template:'qq-template-manual-trigger',request:{endpoint:'/server/success.html',method:'GET'},thumbnails:{placeholders:{waitingPath:'/source/placeholders/waiting-generic.png',notAvailablePath:'/source/placeholders/not_available-generic.png'}},autoUpload:false,debug:true});qq(document.getElementById("trigger-upload")).attach("click",function(){manualUploader.uploadStoredFiles();});