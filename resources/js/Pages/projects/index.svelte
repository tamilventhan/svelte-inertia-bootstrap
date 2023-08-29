<script>
    import Swal from 'sweetalert2';
    import {inertia, router} from '@inertiajs/svelte'
    import Layout from '@/Shared/Layout.svelte'
    import Pagination from '@/Shared/Pagination.svelte'

    let pagetitle='Projects'
</script>

<svelte:head>
    <title>{pagetitle}</title>
</svelte:head>

<Layout>
    <div>
        <table class="table table-striped">
            <thead>
                <th>S.No</th>
                <th>Name of the project</th>
                <th>programming language</th>
                <th>assigned person</th>
                <th>project start date</th>
                <th>project end date</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div>
                            <button class="btn btn-sm btn-primary">show</button>
                            <button class="btn btn-sm btn-secondary">edit</button>
                            <button class="btn btn-sm btn-danger">delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</Layout>
