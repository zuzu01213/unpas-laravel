<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark" style="border-bottom: 0;">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-5 text-purple" href="/home">K's Blog</a>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="nav-link px-3 bg-lg border-0"><i class="bi bi-box-arrow-right"></i> Logout</button>
    </form>
</header>
<style>
    .text-purple {
        color: rgb(144, 143, 143);
    }
    .text-purple:hover {
        color: white !important;
        transform-style: color 0.3s;
    }
</style>
