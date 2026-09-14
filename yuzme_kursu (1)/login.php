<?php session_start(); ?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AquaClub — Yüzme Kulübü Yönetim Sistemi</title>

  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php if(isset($_SESSION['loginError'])): ?>
  <script>
    window.onload = function() {
      showToast("<?= $_SESSION['loginError']; ?>");
    }
  </script>
  <?php unset($_SESSION['loginError']); ?>
<?php endif; ?>

<div class="login-page">
  <div class="login-card">
    <div class="login-header">
      <h1>Hoş Geldin</h1>
      <p>Hesabına giriş yaparak devam et.</p>
    </div>

    <form action="actions/login_action.php" method="POST" class="login-form">
      <div class="input-group">
          <label>Kullanıcı Adı</label>
          <input type="text" name="kullanici_adi" placeholder="Kullanıcı adınızı girin">
      </div>

      <div class="input-group">
          <label>Şifre</label>
          <input type="password" name="sifre" placeholder="Şifrenizi girin">
      </div>

      <button type="submit" class="login-btn">
          Giriş Yap
      </button>
    </form>
  </div>
</div>
<script>
  function showToast(message){
    alert(message);
  }
</script>
</body>
</html>