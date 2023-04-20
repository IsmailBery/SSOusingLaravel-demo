<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        //remove token from local storage
        localStorage.removeItem('token');
        //redirect to login page
        window.location.href = 'http://localhost:8000/login?request_url=http://localhost/service1';
        
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
                <a href="index.php" onclick="logout()" class="btn btn-primary">go to Service 1</a>
            </div>
            </div>
    </div>
    
</body>
</html>