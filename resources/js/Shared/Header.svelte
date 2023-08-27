<script>
import {inertia} from '@inertiajs/svelte'
</script>

<main>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 border-bottom">
        <div class="container px-5">
            <a use:inertia class="navbar-brand" href="/">
                <span class="fw-bolder text-primary">Laravel-Svelte-Bootstrap</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                    <li class="nav-item"><a use:inertia class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a use:inertia class="nav-link" href="/customers">Customers</a></li>
                    <li class="nav-item"><a class="nav-link" href="/">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="/">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
</main>
