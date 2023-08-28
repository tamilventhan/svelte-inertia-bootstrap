<!-- <script>
 import {page} from '@inertiajs/svelte'
</script>

{#if $page.props.flash.success}
 <div class="alert alert-success">{$page.props.flash.success}</div>
 {:else if $page.props.flash.info}
 <div class="alert alert-info">{$page.props.flash.info}</div>
{:else if $page.props.flash.warning}
<div class="alert alert-warning">{$page.props.flash.warning}</div>
{/if} -->

<!-- <script>
    //Notyf package
    import {page} from '@inertiajs/svelte'
    import { Notyf } from 'notyf';
    import 'notyf/notyf.min.css';

    const notyf = new Notyf({
        dismissible: true,
        duration: 2000,
        ripple: true,
        position: {
            x: 'right',
            y: 'top',
        }
    });

    if ($page.props.flash.success) {
        notyf.success($page.props.flash.success);
    }
</script> -->
<script>
import {page} from '@inertiajs/svelte'
import Swal from 'sweetalert2';

    let successMessage = '';
    if ($page.props.flash.success) {
        successMessage = $page.props.flash.success;
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: successMessage,
        });
    }

</script>
<style>
    @import 'sweetalert2/dist/sweetalert2.min.css';
</style>
