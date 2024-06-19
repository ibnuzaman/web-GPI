<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/admin-style.css">
    <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand me-auto" href="#">
            <img src="./assets/img/logo.jpg" width="10%" alt="Logo" class="logo-navbar">
          </a>
        </div>
      </nav>
      <div class="back-button-container">
        <a href="#" class="back-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
            </svg>
        </a>
      </div>
      <div class="profile-container justify-content-center container-fluid me-5 ms-5">
        <div class="header-profile text-center">
          <h2>Profile Saya</h2>
          <h5>Kelola Informasi Profile Anda</h5>
        </div>
        <div class="info-profile mt-5 justify-content-center text-center align-items-center">
          <div class="item row">
            <div class="col-auto username-label">
              <label for="username">Username</label>
            </div>
            <div class="col-auto username">
              <span id="username">Anonymous</span>
            </div>
            <div class="col-auto">
              <button class="edit">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg>
              </button>
            </div>
          </div>
          <div class="item row pt-3">
            <div class="col-auto email-label">
              <label for="email">Email <span></span></label>
            </div>
            <div class="col-auto email">
              <span id="email">Anonymous@email.com</span>
            </div>
          </div>
          <div class="item row pt-3">
            <div class="col-auto password-label">
              <label for="password">Current Password</label>
            </div>
            <div class="col-auto">
              <input type="password" class="password borderless ps-3" placeholder="Input Current Password">
            </div>
          </div>
          <div class="item row pt-3 ms-2">
            <div class="col-auto password-label">
              <label for="password">New Password</label>
            </div>
            <div class="col-auto">
              <input type="password" class="password borderless ps-3" placeholder="Input Current Password">
            </div>
          </div>
          <div class="item row pt-3">
            <div class="col-auto confirm-password-label">
              <label for="password" class="confirm-pw">Confirm Password</label>
            </div>
            <div class="col-auto">
              <input type="password" class="password borderless ps-3" placeholder="Input Current Password">
            </div>
          </div>
        </div>
        <div class="text-center mt-5 pb-3">
          <button class="btn btn-primary btn-simpan">
            Simpan
          </button>
        </div>
      </div>
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>