<script>
    import Swal from "sweetalert2";
    import { inertia, router } from "@inertiajs/svelte";
    import Layout from "@/Shared/Layout.svelte";
    import Pagination from "@/Shared/Pagination.svelte";
    export let projects;

    let pagetitle = "Projects";
    let filters = {
        search: "",
    };
    let showButton = false;
    async function deleteProject(id) {
        const result = await Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        });

        if (result.isConfirmed) {
            await router.delete(`/projects/${id}`);
            Swal.fire({
                title: "Deleted!",
                text: "The customer has been deleted.",
                icon: "success",
            });
        }
    }
</script>

<svelte:head>
    <title>{pagetitle}</title>
</svelte:head>

<Layout>
    <div class="d-flex justify-content-between p-3">
        <div>
            <a
                use:inertia
                href="/projects/create"
                class="btn btn-secondary btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#myModal"
                on:click={() => (showButton = false)}>Add Project</a
            >
        </div>
        <label
            >Search
            <input type="text" bind:value={filters.search} />
        </label>
    </div>
    <div>
        <div class="p-2">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name of the project</th>
                        <th>Programming language</th>
                        <th>Assigned Person</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {#each projects.data as project, i}
                        <tr>
                            <td class="text-left">{i + 1}</td>
                            <td class="text-left">{project.name}</td>
                            <td class="text-left">{project.language}</td>
                            <td class="text-left">{project.assigned_person}</td>
                            <td class="text-left">{project.start_date}</td>
                            <td class="text-left">{project.end_date}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-around">
                                    <a
                                        use:inertia
                                        href="/customers/{project.id}"
                                        class="btn btn-sm btn-primary ml-3"
                                        data-bs-toggle="modal"
                                        data-bs-target="#myModal"
                                        on:click={() => (showButton = "")}
                                        >show</a
                                    >

                                    <a
                                        use:inertia
                                        href="/customers/{project.id}"
                                        class="btn btn-sm btn-secondary ml-3"
                                        data-bs-toggle="modal"
                                        data-bs-target="#myModal"
                                        on:click={() => (showButton = true)}
                                        >edit</a
                                    >
                                    <button
                                        class="btn btn-sm btn-danger ml-3"
                                        on:click={() =>
                                            deleteProject(project.id)}
                                        >delete</button
                                    >
                                </div>
                            </td>
                        </tr>
                    {/each}
                </tbody>
            </table>
        </div>
    </div></Layout
>

<!-- Add Project Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color:#FFF0F0">
                {#if showButton && showButton !== ""}
                    <h4 class="modal-title">Edit Project</h4>
                {:else if !showButton && showButton !== ""}
                    <h4 class="modal-title">Add Project</h4>
                {:else if showButton === ""}
                    <h4 class="modal-title">Project Details</h4>
                {/if}
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                />
            </div>

            <!-- Modal body -->
            {#if showButton !== ""}
                <div class="p-3 ml-5 mr-5">
                    <form class="grid gap-3">
                        <div class="form-group mb-2">
                            <!-- svelte-ignore a11y-label-has-associated-control -->
                            <label>
                                <strong>Name of the project</strong>
                            </label>
                            <input
                                type="text"
                                class="form-control"
                                id="project-name"
                            />
                        </div>
                        <div class="form-group mb-2">
                            <!-- svelte-ignore a11y-label-has-associated-control -->
                            <label><strong>Programming language</strong></label>
                            <input
                                type="text"
                                class="form-control"
                                id="language"
                            />
                        </div>
                        <div class="form-group mb-2">
                            <!-- svelte-ignore a11y-label-has-associated-control -->
                            <label><strong>Assigned person</strong></label>
                            <input
                                type="text"
                                class="form-control"
                                id="assigned-person"
                            />
                        </div>
                        <div class="form-group mb-2">
                            <!-- svelte-ignore a11y-label-has-associated-control -->
                            <label><strong>Project start date</strong></label>
                            <input
                                type="date"
                                class="form-control"
                                id="start-date"
                            />
                        </div>
                        <div class="form-group mb-2">
                            <!-- svelte-ignore a11y-label-has-associated-control -->
                            <label><strong>Project end date</strong></label>
                            <input
                                type="date"
                                class="form-control"
                                id="end-date"
                            />
                        </div>
                    </form>
                </div>
            {:else}
                <div class="p-3">
                    <div>
                        <p>Name of the project:</p>
                        <p>Programming language:</p>
                        <p>Assigned person:</p>
                        <p>Project start date:</p>
                        <p>Project end date:</p>
                    </div>
                </div>
            {/if}

            <!-- Modal footer -->
            <div class="modal-footer" style="background-color:#FFF0F0">
                <div class="d-flex justify-content-end gap-2 p-2">
                    <a
                        use:inertia
                        href="/customers"
                        class="btn btn-secondary float-start"
                        data-bs-dismiss="modal">Back</a
                    >
                    {#if !showButton && showButton !== ""}
                        <button type="submit" class="btn btn-primary float-end"
                            >Submit</button
                        >
                    {:else if showButton && showButton !== ""}
                        <button type="submit" class="btn btn-primary float-end"
                            >Update</button
                        >
                    {/if}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Project Modal End -->
