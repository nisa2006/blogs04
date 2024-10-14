<?= $this->extend('layout/templates'); ?>
<?= $this->section('body-content'); ?>
<main class="view-content">
  <header class="user-data">

    <img src="/img/anjani.jpg" alt="">
    <article>
      <span>
        <h1>Hallo saya <?= $user_view['Nama']; ?></h1>
        <h2>Judul blogs: <?= $user_view['Judul_blogs']; ?></h2>
        <h2>Tanggal, <?= $user_view['Tanggal_create']; ?></h2>
      </span>
      <p>Gunung hanya menjadi masalah jika lebih besar dari Anda. 
      Anda harus mengembangkan diri Anda sedemikian rupa sehingga Anda menjadi lebih besar dari pegunungan yang Anda hadapi</p>
    </article>
  </header>
  <hr>
  <div class="content-view">
    <section>
      <article>
        <?= $user_view['Blogs']; ?>
      </article>
    </section>
    <div class="back">
      <?php if(session()->get('login') === true) :?>
      <div class="buttons">
        <a href="/edit/<?= $user_view['id']; ?>" class="btn btn-outline-info">Edit</a>
        <form action="/hapus/<?= $user_view['id']; ?>" method="post">
          <?= csrf_field(); ?>
          <input type="hidden" name="_method" value="delete">
          <button class=" btn btn-outline-danger"  type="submit">Delete</a>
        </form>
      </div>
      <div class="user-not-login">
        <a href="/back" class="btn btn-outline-primary">Kembali</a>
        <a href="<?= $user_view['Referensi']; ?>" class="btn btn-outline-primary">Referensi Blog saya</a>
      </div>
      <?php else: ?>
        <div class="user-not-login">
          <a href="/back" class="btn btn-outline-primary">Kembali</a>
          <a href="<?= $user_view['Referensi']; ?>" class="btn btn-outline-primary">Referensi Blog saya</a>
        </div>
      <?php endif ?>
  <hr>
</main>

<?= $this->endSection(); ?>