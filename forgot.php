<!DOCTYPE html>
<html lang="en" data-theme="<?= $_COOKIE['mode']; ?>">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- quicksandfont -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <!-- fa -->
    <script src="js/fa.js"></script>
    <!-- my css -->
    <link rel="stylesheet" href="css/singin.css">
    <link rel="stylesheet" href="css/forgot.css">
    <title>Lupa Sandi</title>
  </head>
  <body>
    
    <div class="body">
      
      <!-- login -->
      <div class="kotak">
        <h2 class="h2 text-center">Lupa Sandi</h2>
        <i class="far fa-unlock-alt icon icon-1"></i>
        <form action="">
          <input type="text" placeholder="Email Verifikasi" class="input">
          <input type="text" placeholder="Kode Verifikasi" class="input">
          <button class="button btn-verif">Verifikasi</button>
          <a href="singin.php" class="link buat">Masuk</a>
          <a href="create.php" class="link lupa">Buat Akun ?</a>
        </form>
      </div>
      <!--  akhir login -->
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>