<script>
import Layout from "../Shared/Layout.svelte";
</script>
<Layout>
    <div class="pb-5 overflow-x-auto">
        <header class="pt-5">
            <div class="container pb-5">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Header text content-->
                        <div class="text-center text-xxl-start">
                            <div class="badge bg-primary bg-gradient text-white mb-4"><div class="text-uppercase">Design &middot; Development &middot; Marketing</div></div>
                            <div class="fs-3 fw-light text-muted">I can help to developers</div>
                            <h6 class="display-5 mb-5"><span class="text-gradient d-inline">I'm Starter Kit for Laravel Svelte-Vite-Bootstrap boilerplate.</span></h6>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                                <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="resume.html">Resume</a>
                                <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="projects.html">Projects</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- Header profile picture-->
                        <div class="d-flex justify-content-center mt-5">
                            <div class="profile ">
                                <img class="img-lg-width" src="assets/img1.svg" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- About Section-->
        <section class="bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="text-center my-5">
                            <h2 class="display-6 fw-bolder"><span class="text-gradient d-inline">About Me</span></h2>
                            <p class="lead fw-light mb-4">I'm Starter Kit for Laravel-Svelte-Vite-Bootstrap boilerplate.</p>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit dolorum itaque qui unde quisquam consequatur autem. Eveniet quasi nobis aliquid cumque officiis sed rem iure ipsa! Praesentium ratione atque dolorem?</p>
                            <div class="d-flex justify-content-center fs-2 gap-4">
                                <a class="text-gradient" href="#!"><i class="bi bi-twitter"></i></a>
                                <a class="text-gradient" href="#!"><i class="bi bi-linkedin"></i></a>
                                <a class="text-gradient" href="#!"><i class="bi bi-github"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</Layout>

<style>
    .img-lg-width {
      width: 350px;
    }

    @media (min-width: 800px) {
      .img-lg-width {
        width: 550px;
      }
    }
  </style>

