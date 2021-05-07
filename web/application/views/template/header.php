<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=SITE_NAME?></title>

    <!-- Bootstrap, fontawesome, CSS -->   
    <!-- Old LINK:-->
    <!-- <link rel="stylesheet" href="<?=URL?>/assets/vendor/bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- URL LINK : <?=URL?>/assets/css/style.css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> 
    <link rel="stylesheet" href="/assets/vendor/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- URL LINK : <?=URL?>/assets/vendor/fontawesome/css/all.min.css -->
    
</head>
<body style="background-color: #D5E1F0";>
<header>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #CAD5E2";>

      <div class="container-fluid">

        <a class="navbar-brand mb-0 h1" style="color: #6A1B4D">Timber</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index" style="color: #6A1B4D">Home</a>
              </li>
              <?php if (isset($_SESSION['username'])): ?>
                  <li class="nav-item">
                      <a class="nav-link" href="/message" style="color: #6A1B4D">Messages</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/profile" style=" color: #6A1B4D">My profile: <?=$_SESSION['username']?></a>                      
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/logout" style="color: #6A1B4D">Logout</a>
                  </li>
              <?php else: ?>
                  <li class="nav-item">
                      <a class="nav-link" href="/registration" style="color: #6A1B4D">Registration</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/login" style="color: #6A1B4D">Login</a>
                  </li>
              <?php endif ?>
          </ul>
          <form class="d-flex">
          </form>
        </div>
      </div>
    </nav>
</header>