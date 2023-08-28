    <script>
        import Swal from 'sweetalert2';
        import {inertia, router} from '@inertiajs/svelte'
        import Layout from '@/Shared/Layout.svelte'
        import Pagination from '@/Shared/Pagination.svelte'

        let pagetitle='Customers'
        export let customers;

    async function deleteCustomer(id) {
        const result = await Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        });

        if (result.isConfirmed) {
            await router.delete(`/customers/${id}`);
            Swal.fire({
            title: 'Deleted!',
            text: 'The customer has been deleted.',
            icon: 'success'
            });
        }
    }
    </script>

    <svelte:head>
        <title>{pagetitle}</title>
    </svelte:head>

<Layout>
    <div class="pb-5">

        <div class="p-2">
            <a use:inertia href="/customers/create" class="btn btn-secondary btn-sm" >Add Customer</a>
        </div>

        <div>
            <table class="table table-striped border-top">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                    {#each customers.data as customer,i}
                <tr>
                    <td class="text-left">{i+1}</td>
                    <td class="text-left">{customer.name}</td>
                    <td class="text-left">{customer.email}</td>
                    <td class="text-left">{customer.phone}</td>
                    <td class="text-center">
                        <a use:inertia  href="/customers/{customer.id}"  class="btn btn-secondary btn-sm">View</a>
                        <a use:inertia href="/customers/{customer.id}/edit" class="btn btn-secondary btn-sm">Edit</a>
                        <button on:click={()=>deleteCustomer(customer.id)} class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                {/each}
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <Pagination links={customers.links}/>
            </div>
        </div>
    </div>
</Layout>
