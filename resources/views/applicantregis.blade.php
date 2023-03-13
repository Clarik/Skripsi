<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Applicant Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body style="background-color: #F2F1EF">
    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">
        <form
            role="form" action="/register/Applicant" method="POST" enctype="multipart/form-data"
            class="d-flex flex-column align-items-center p-5" style="background-color: white; border-radius: 20px;">
            <h1>Register</h1>
            <h6>as Applicant</h1>

            @csrf
                <div class="form-group p-2">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    @if($errors->has('username'))
                        <div class="m-auto mt-1 alert alert-danger p-1">
                            {{ $errors->first('username') }}
                        </div>
                    @endif
                </div>

                <div class="form-group p-2">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    @if($errors->has('email'))
                        <div class="m-auto mt-1 alert alert-danger p-1">
                            {{ $errors->first('email') }}
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

                <div class="form-group p-2">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Applicant Name">
                    @if($errors->has('name'))
                        <div class="m-auto mt-1 alert alert-danger p-1">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

                <div class="form-group p-2">
                    <label for="phone">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                    @if($errors->has('phone'))
                        <div class="m-auto mt-1 alert alert-danger p-1">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                </div>

                <div class="form-group p-2">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                    @if($errors->has('address'))
                        <div class="m-auto mt-1 alert alert-danger p-1">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                </div>

                <div class="form-group p-2">
                    <label for="dob">DOB</label>
                    <input type="date" class="form-control" id="dob" name="dob">
                    @if($errors->has('dob'))
                        <div class="m-auto mt-1 alert alert-danger p-1">
                            {{ $errors->first('dob') }}
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-success mt-2">Register</button>
        </form>
    </div>
</body>

</html>