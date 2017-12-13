<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.4.4/parsley.min.js"></script>
        <style type="text/css">
        
            .wrapper{
                //padding-top: 20px;
                padding-top: 50px;
            }

            input.parsley-error,
            select.parsley-error,
            textarea.parsley-error {    
                border-color:#843534;
                box-shadow: none;
            }


            input.parsley-error:focus,
            select.parsley-error:focus,
            textarea.parsley-error:focus {    
                border-color:#843534;
                box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483
            }


            .parsley-errors-list {
                list-style-type: none;
                opacity: 0;
                transition: all .3s ease-in;

                color: #d16e6c;
                margin-top: 5px;
                margin-bottom: 0;
              padding-left: 0;
            }

            .parsley-errors-list.filled {
                opacity: 1;
                color: #a94442;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <h2>Horizontal form</h2>
            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-10">
                        <input required type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Password:</label>
                    <div class="col-sm-10">          
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label><input type="checkbox" name="remember"> Remember me</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <script>
        $(document).ready(function(){
            $('form').parsley();
        });
        </script>
    </body>
</html>