<nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="#">Keenan Rahmanda</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" {{ ($title === "Home" ) ? 'active' : ''}} href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" {{ ($title === "About" ) ? 'active' : ''}} href="/about">About Me</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" {{ ($title === "Posts" ) ? 'active' : ''}} href="/posts">My Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" {{ ($title === "Posts" ) ? 'active' : ''}} href="http://coba-laravel-2.test/3?jumlahProduk=123&generateButton=#" target="_blank">My Project</a>

        </li>
      </ul>
    </div>
  </nav>
  <style>nav{background-color: pink !important} a{ color: rgb(54, 72, 21) !important}</style>