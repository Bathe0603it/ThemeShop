<!DOCTYPE html>
<html>
    <head>

        <meta name="viewport" content="user-scalable=1.0,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
        <title>file-upload-with-preview | Promosis</title>
        <link rel="shortcut icon" type="image/png" href="static/favicon.png"/>

        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="dist/file-upload-with-preview.css">

        <style>
            
        </style>

    </head>
    <body>

        <!-- This container is just for the demo -->
        <section>
            <div class="demo-upload-container">
                <div class="custom-file-container" data-upload-id="myFirstImage">
                    <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a></label>
                    <label class="custom-file-container__custom-file" >
                        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                        <input type="hidden" value="10485760" />
                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                    </label>
                    <div class="custom-file-container__image-preview"></div>
                </div>
            </div>
        </section>
        <section>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="custom-file-container" data-upload-id="mySecondImage">
                    <label>Upload (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a></label>
                    <label class="custom-file-container__custom-file" >
                        <input name="abc[]" type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" multiple>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                        <p class="custom-file-container__custom-file__custom-file-control"></p>
                    </label>
                    <div class="custom-file-container__image-preview"></div>
                </div>
                <button type="submit">End</button>
            </form>
        </section>
        
        <?php
            if ($_POST) {
                ?>
                <pre>
                <?php
                    var_dump($_FILES['abc']);
                ?>
                </pre>
                <?php
                exit();
            }
        ?>
        <script src="http://localhost/Lab_run/file_upload_with_preview_master_run/dist/file-upload-with-preview.js"></script>
        <script>
            // First upload
            var firstUpload = new FileUploadWithPreview('myFirstImage')

            // Second upload
            var secondUpload = new FileUploadWithPreview('mySecondImage', {showDeleteButtonOnImages: true})

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
        </script>

    </body>
</html>
