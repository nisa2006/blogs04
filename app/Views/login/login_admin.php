<?= $this->extend('layout/Userview'); ?>
<?= $this->section('content'); ?>
<div class="container">
  <div class="hero-content">
    <img src="/img/Userview.png" alt="">
    <header>
      <h1 class="text-white">Sigin up Disini</h1>
      <article>
        <p class="text-white">
          Selama mendaki, tak jarang kamu harus menghadapi kesulitan. Saat masalah itu muncul, barulah kamu menyadari siapa orang yang benar-benar bersedia membantumu dan mana yang hanya datang ketika ia yang membutuhkan bantuanmu. Saat itu, keegoisan dan ketulusan masing-masing orang tak akan bisa ditutupi.
        </p>
      </article>
    </header>
  </div>
  <?php if (session()->getFlashdata('register')): ?>
    <h4 style="
        text-align:center;
        color:white;
        "><?= session()->getFlashdata('register'); ?></h4>
  <?php else:
    // echo session()->getFlashdata('gagal');
  ?>
  <?php endif; ?>
  <div class="form-login">
    <form method="post" action="/get_user_login">
      <?php if (session()->getFlashdata('error')): ?>
        <h4 style="
        text-align:center;
        color:red;
        "><?= session()->getFlashdata('error'); ?></h4>
      <?php endif; ?>
      <div class="username">
        <label for="Username">Username </label><br>
        <input type="text" name="Username" id="Username" required placeholder="masukkan username " maxlength="8">
      </div>
      <div class="password">
        <label for="Password">Password </label><br>
        <input type="Password" name="Password" id="Password" required placeholder="masukkan password yang kuat" maxlength="8">
      </div>
      <span class="tombol">
        <button type="submit" name="KIRIM" onclick="return confirm('pastikan username dan passsword anda benar')">Sigin</button>
        <p>Or</p>
        <a href="/login/register2">daftar</a>
      </span>
    </form>
    <div class="heroes-image">
      <img src="/img/Sign-up.png" alt="">
    </div>
  </div>

</div>

<?= $this->endSection(); ?>