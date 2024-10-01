<?= $this->extend('layout/templates'); ?>
<?= $this->section('body-content'); ?>
<main class="blogs-view">
  <section class="hero-blogs">
    <img src="/img/Blog.png" alt="">
    <header>
      <h1>Muncak</h1>
      <article>
        <p>
        "Jangan lihat senangnya, tapi rasakan sedihnya hidup manusia tidak ada yang sempurna. 
        "Kenyataannya, dia yang tampak kuat dihadapanmu, boleh jadi dia yang sering mengeluh di dalam hatinya. "Kamu mendaki gunung dengan tekad bukan karena nekat.
         "Kesedihan hanyalah batu penghalang, ketika kau tidak bahagia, kerikil pun terlihat seperti gunung."Pemandangan terbaik datang setelah pendakian yang paling sulit.
          "Saya menyadari bahwa saat di puncak gunung, ada gunung lain yang lebih tinggi.
         "Setiap puncak gunung dapat dijangkau jika Kamu terus mendaki.
      </article>
    </header>
  </section>
  <!-- pengulangan data buat disini -->
  <div class="views">
    <?php foreach ($blog as $v) : ?>
      <div class="content-blogs">
        <section class="create-content">
          <div class="data-user">
            <b>Nama = <i><?= $v['Nama']; ?></i></b>
            <b>Tanggal pembuatan = <i><?= $v['Tanggal_create']; ?></i></b>
          </div>
          <article class="value-content">
            <b>Judul blogs = <i><?= $v['Judul_blogs']; ?></i></b>
          </article>
        </section>
        <div class="buttons m-2 p-2">
          <a href="/read/<?= $v['id']; ?>" class="btn btn-outline-primary">Read more</a>
        </div>
      </div>
    <?php endforeach; ?>
    <!-- end pengulangan -->
  </div>
</main>
<?= $this->endSection(); ?>