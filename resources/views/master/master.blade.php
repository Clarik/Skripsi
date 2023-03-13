<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>JobAisle</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  @if (session()->has('alert'))
  <script>
    var msg = "<?php echo session()->get('alert') ?>";
    alert(msg);
  </script>
  @endif
</head>
<header>
  <div class="d-flex justify-content-between align-items-center">
    <div class="left w-50 d-flex justify-content-start">
      <div class="navbar-brand ms-2 p-2 fs-4">
        <a href="/home" class="nav-link active">
          <h1>JobAisle</h1>
        </a>
      </div>
      <form class="form-inline my-2 my-lg-0 d-flex align-items-center" role="form" action="/search" enctype="multipart/form-data">
        <input class="form-control mr-sm-2" type="search" name="search" id="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0 ms-2" type="submit">Search</button>
      </form>
    </div>
    <div class="right w-50 justify-content-around align-items-center px-5">
      <nav class="navbar navbar-expand-lg">
        <ul class="container-fluid nav">
          <li class="nav-item">
            <a href="/home" class="nav-link">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">Jobs</a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            @if(session()->get('user')->MSME()->first() == null)  
            <a href="/jobvacancy/view" class="dropdown-item">View All Job Vacancy</a>
              <div class="dropdown-divider"></div>
              <a href="/jobvacancy/applied" class="dropdown-item">View Applied Job Vacancy</a>
            </div>
            @else
            <a href="/jobvacancy/manage" class="dropdown-item">Manage Job Vacancy</a>
              <div class="dropdown-divider"></div>
              <a href="/jobvacancy/applicantlist" class="dropdown-item">View All Applicant</a>
            </div>
            @endif
          </li>
          <li class="nav-item">
            <a href="/forum" class="nav-link">Forum</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">Profile</a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a href="/profile" class="dropdown-item">View Profile</a>
              <div class="dropdown-divider"></div>
              <a href="/logout" class="dropdown-item">Logout</a>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</header>

<body>
  @yield('content')
</body>

</html>