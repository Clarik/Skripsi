<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JobAisle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @if (session()->has('alert'))
        <script>
            var msg = "<?php echo session()->get('alert')?>";
            alert(msg); 
        </script>            
    @endif
</head>
<body style="background-color: #F2F1EF">
    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">
        <div class="d-flex flex-column align-items-center p-4" style="background-color: white; border-radius: 20px;">
            <h2 class="p-2">JobAisle</h2>
            <div>
                <form class="container d-flex flex-column justify-content-center align-items-center"
                role="form" action="/login" method="POST" enctype="multipart/form-data">                
                    @csrf
                    
                    <div class="form-group p-2">
                        <label for="username">
                            Username
                        </label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        @if($errors->has('username'))
                            <div class="m-auto mt-1 alert alert-danger p-1">
                                {{ $errors->first('username') }}
                            </div>
                        @endif
                    </div>
                
                    <div class="form-group p-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        @if($errors->has('password'))
                            <div class="m-auto mt-1 alert alert-danger p-1">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="p-2">
                        <button class="btn btn-outline-primary mt-2" type="submit">LOGIN</button>
                    </div>

                    <a href="/register" class="p-2">
                        Didn't have an account? 
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>