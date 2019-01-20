// First upload
var firstUpload = new FileUploadWithPreview('myFirstImage')

// Image selected event listener
window.addEventListener('fileUploadWithPreview:imageSelected', function(e) {
    // e.detail.uploadId
    // e.detail.cachedFileArray
    // e.detail.selectedFilesCount
    // Use `e.detail.uploadId` to match up to your specific input
    if (e.detail.uploadId === 'myFirstImage') {
        console.log(e.detail.selectedFilesCount)
        console.log(e.detail.cachedFileArray)
    }

    if (e.detail.uploadId === 'mySecondImage') {
        console.log(e.detail.selectedFilesCount)
        console.log(e.detail.cachedFileArray)
    }
})

// Image deleted event listener
window.addEventListener('fileUploadWithPreview:imageDeleted', function(e) {
    if (e.detail.uploadId === 'mySecondImage') {
        console.log(e.detail.selectedFilesCount)
        console.log(e.detail.cachedFileArray)
    }
})