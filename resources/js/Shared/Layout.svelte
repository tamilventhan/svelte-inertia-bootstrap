<script>
    import Swal from 'sweetalert2';
    import 'bootstrap/dist/js/bootstrap.bundle.min.js';
    import Header from '@/Shared/Header.svelte'
    import Footer from '@/Shared/Footer.svelte'
    import FlashMessage from './FlashMessage.svelte';

</script>

<Header/>
<div class="container">
    <FlashMessage/>
    <slot></slot>
</div>
<Footer/>
<style>
    @import 'sweetalert2/dist/sweetalert2.min.css';
</style>
