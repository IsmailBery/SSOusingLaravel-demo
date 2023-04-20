<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        //To use SSO you can inject this script in your page
        <?php 
            if(isset($_GET['token'])){
                echo "var token = '".$_GET['token']."';";
                echo "var check = validate_token(token);";
                echo "if(check){ localStorage.setItem('token', token); }";
            }
        ?>

        if(!localStorage.getItem('token')){
        window.location.href = 'http://localhost:8000/login?request_url=http://localhost/service1';
        }

        function validate_token(token){
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'http://localhost:8000/api/validate_token/'+token, false);
        xhr.send();
        if (xhr.status != 200) {
            return false;
        } else {
            if(xhr.responseText == 1){
                $(document).ready(function(){
                    $('#checkPackage').show();
                });
            }else{
                $(document).ready(function(){
                    $('#checkPackage').hide();
                });
            }
            return xhr.responseText;
        }

        }
    </script>
</head>
<body>
    <div class="container">
        
        <div class="card">
            <div class="card-header">
                Service 
            </div>
            <div class="card-body">
                <h5 class="card-title">This SSO Service</h5>
                <p class="card-text">You passed  SSO and you are now authenticated</p>
                <div id="checkPackage" >
                    <span>Your Package allows you to change the country</span>
                    <select class="form-select" aria-label="Default select example" id="test" >
                    <option selected disabled>select country</option>
                    <option value="1">Egypt</option>
                    <option value="2">Saudi Arabia</option>
                    <option value="3">UAE</option>
                </select>
                </div>
                <a href="logout.php" class="btn btn-primary" style="margin-top: 8px;">Logout</a>
            </div>
            
            </div>
    </div>
    
</body>
</html>