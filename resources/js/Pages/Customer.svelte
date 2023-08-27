    <script>
        import {inertia, router} from '@inertiajs/svelte'
        import Layout from '@/Shared/Layout.svelte'
        import Pagination from '@/Shared/Pagination.svelte'
        import { Notyf } from 'notyf';
        import 'notyf/notyf.min.css';

        let pagetitle='Customers'
        export let customers;

        const notyf = new Notyf({
        dismissible: true,
        duration: 2000,
        ripple: true,
        position: {
            x: 'right',
            y: 'top',
        }
    });

        async function deleteCustomer(id) {
            if (confirm("You are about to delete a customer, are you sure?")) {
                try {
                    router.delete("/customers/" + id);
                    notyf.success('Customer deleted successfully');

                    setTimeout(() => {
                        router.push('/customers');
                    }, 2000);
                } catch (error) {
                    console.error("Error deleting customer:", error);
                }
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
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th class="text-center">Action</th>
                </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <Pagination links={customers.links}/>
            </div>
        </div>
    </div>
    </Layout>
