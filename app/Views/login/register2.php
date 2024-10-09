<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap demo</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="/Css/register.css" />
</head>

<body>
  <div class="hero-content">
    <img src="/img/join.png" alt="">
    <header>
      <h1 class="text-white">Daftar Disini</h1>
      <article>
        <p class="text-white">
          Dengan banyaknya kesulitan yang harus dihadapi ketika mendaki, tak akan mengherankan jika seorang pendaki akan tumbuh menjadi seseorang yang sabar dan bijaksana. Tak asal bicara atau menuduh orang lain, dan berpikir panjang sebelum membuat keputusan.
        </p>
      </article>
    </header>
  </div>
  <!-- <?php if (session()->getFlashdata('login')): ?>
    <h5 class="text-center fs-6 text-white"> <?= session()->getFlashdata('login'); ?></h5>
  <?php endif ?> -->
  <main class="container-form">
    <?php if (session()->getFlashdata('notreg')): ?>
      <h4 style="
        text-align:center;
        font-size:0.8em;
        color:red;
        "><?= session()->getFlashdata('notreg'); ?></h4>
    <?php else:
      // echo session()->getFlashdata('gagal');
    ?>
    <?php endif; ?>


    <form method="post" action="/Daftar" class="border rounded-4 p-4 input">
      <div class="email-username">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input
          type="email"
          name="Email"
          class="form-control fw-bold <?= ($Valid->getError('Email')) ? 'is-invalid' : ''; ?>"
          id="exampleInputEmail1"
          aria-describedby="emailHelp" required />
        <div class="invalid-feedback">
          <?= $Valid->getError('Email'); ?>
        </div>
        <br>
        <label for="exampleInputPassword1" class="form-label">Username</label>
        <input
          type="text"
          name="Username"
          class="form-control fw-bold <?= ($Valid->getError('Email')) ? 'is-invalid' : ''; ?>"
          id="exampleInputPassword1" required />
        <?php
        if ($Valid->getError('Username')):
        ?>
          <div class="invalid-feedback">
            <?= $Valid->getError('Username'); ?>
          </div>
        <?php endif ?>
      </div>
      <div class="Password-chek">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input
          type="password"
          name="Password"
          class="form-control fw-bold <?= (session()->getFlashdata('salah')) ? 'is-invalid' : ''; ?>"
          id=" exampleInputPassword1" required />
        <div class="invalid-feedback">
          <?= session()->getFlashdata('salah'); ?>
        </div>
        <br>
        <label for="exampleInputPassword1" class="form-label">Chek Your Password</label>
        <input
          type="password"
          name="chekPass"
          class="form-control fw-bold"
          id="exampleInputPassword1" />
      </div>
      <div class="buttons">
        <button type="submit" name="submit" class="btn btn-primary">Daftar</button>
        <p class="text-white">Or</p>
        <a href="/sigin" class="btn btn-primary"> Sigin</a>
      </div>
    </form>
    <section class="register">
      <img src="/img/register.png" alt="">
    </section>
  </main>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>