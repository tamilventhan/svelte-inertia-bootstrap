<script>
    import Swal from "sweetalert2";
    import { inertia, router, useForm } from "@inertiajs/svelte";
    import Layout from "@/Shared/Layout.svelte";
    import Pagination from "@/Shared/Pagination.svelte";

    export let projects;
    let project;

    let defaultform = {
        name: null,
        language: null,
        assigned_person: null,
        start_date: null,
        end_date: null,
    };
    let formElement;
    let form = useForm(defaultform);
    export let errors;

    function submitModal() {
        router.post("/projects", form);
        formElement.reset();
    }
    function updateModal(id) {
        router.put("/projects/" + id, form);
    }
    function showModal(data) {
        showButton = "";
        project = data;
    }
    function handleEditButton(data) {
        showButton = true;
        project = data;
        console.log(project.id);
        form.name = data.name;
        form.language = data.language;
        form.assigned_person = data.assigned_person;
        form.start_date = data.start_date;
        form.end_date = data.end_date;
    }
    let pagetitle = "Projects";
    let filters = {
        search: "",
    };
    $: getSearchValue(filters);
    function getSearchValue(payload) {
        router.get("/projects", payload, {
            preserveScroll: false,
        });
    }
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
                on:click={() => {
                    showButton = false;
                    form = useForm(defaultform);
                }}>Add Project</a
            >
        </div>
        <label
            ><b>Search</b>
            <input type="text" bind:value={filters.search} />
        </label>
    </div>
    <div>
        <div class="p-2 mb-5">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name of the Project</th>
                        <th>Programming Language</th>
                        <th>Assigned Person</th>
                        <th class="text-center">Start Date</th>
                        <th class="text-center">End Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {#each projects.data as project, i}
                        <tr>
                            <td class="text-center">{i + 1}</td>
                            <td class="text-left">{project.name}</td>
                            <td class="text-left">{project.language}</td>
                            <td class="text-left">{project.assigned_person}</td>
                            <td class="text-left">{project.start_date}</td>
                            <td class="text-left">{project.end_date}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-around">
                                    <button
                                        class="btn btn-sm btn-primary ml-3"
                                        data-bs-toggle="modal"
                                        data-bs-target="#myModal"
                                        on:click={() => showModal(project)}
                                        >Show
                                    </button>

                                    <button
                                        class="btn btn-sm btn-secondary ml-3"
                                        data-bs-toggle="modal"
                                        data-bs-target="#myModal"
                                        on:click={() =>
                                            handleEditButton(project)}
                                        >Edit
                                    </button>
                                    <button
                                        class="btn btn-sm btn-danger ml-3"
                                        on:click={() =>
                                            deleteProject(project.id)}
                                        >Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    {/each}
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <Pagination links={projects.links} />
            </div>
        </div>
    </div>
</Layout>

<!-- Add Project Modal -->
<div class="modal" id="myModal" data-bs-backdrop="static">
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
                    <form class="grid gap-3" bind:this={formElement}>
                        <div class="form-group mb-2">
                            <!-- svelte-ignore a11y-label-has-associated-control -->
                            <label>
                                <strong>Name of the project</strong>
                            </label>
                            <input
                                type="text"
                                bind:value={form.name}
                                class="form-control"
                                id="project-name"
                            />
                            {#if errors.name}
                                <div class="text-danger">{errors.name}</div>
                            {/if}
                        </div>
                        <div class="form-group mb-2">
                            <!-- svelte-ignore a11y-label-has-associated-control -->
                            <label><strong>Programming language</strong></label>
                            <input
                                type="text"
                                bind:value={form.language}
                                class="form-control"
                                id="language"
                            />
                            {#if errors.language}
                                <div class="text-danger">{errors.language}</div>
                            {/if}
                        </div>
                        <div class="form-group mb-2">
                            <!-- svelte-ignore a11y-label-has-associated-control -->
                            <label><strong>Assigned person</strong></label>
                            <input
                                type="text"
                                bind:value={form.assigned_person}
                                class="form-control"
                                id="assigned-person"
                            />
                            {#if errors.assigned_person}
                                <div class="text-danger">
                                    {errors.assigned_person}
                                </div>
                            {/if}
                        </div>
                        <div class="form-group mb-2">
                            <!-- svelte-ignore a11y-label-has-associated-control -->
                            <label><strong>Project Start Date</strong></label>
                            <input
                                type="date"
                                bind:value={form.start_date}
                                class="form-control"
                                id="start-date"
                            />
                            {#if errors.start_date}
                                <div class="text-danger">
                                    {errors.start_date}
                                </div>
                            {/if}
                        </div>
                        <div class="form-group mb-2">
                            <!-- svelte-ignore a11y-label-has-associated-control -->
                            <label><strong>Project End Date</strong></label>
                            <input
                                type="date"
                                bind:value={form.end_date}
                                class="form-control"
                                id="end-date"
                            />
                            {#if errors.end_date}
                                <div class="text-danger">{errors.end_date}</div>
                            {/if}
                        </div>
                    </form>
                </div>
            {:else}
                <div class="p-3">
                    <div>
                        <p><b>Name of the project:</b> {project.name ?? "-"}</p>
                        <p>
                            <b>Programming language:</b>
                            {project.language ?? "-"}
                        </p>
                        <p>
                            <b>Assigned person:</b>
                            {project.assigned_person ?? "-"}
                        </p>
                        <p>
                            <b>Project start date:</b>
                            {project.start_date ?? "-"}
                        </p>
                        <p>
                            <b>Project end date:</b>
                            {project.end_date ?? "-"}
                        </p>
                    </div>
                </div>
            {/if}

            <!-- Modal footer -->
            <div class="modal-footer" style="background-color:#FFF0F0">
                <div class="d-flex justify-content-end gap-2 p-2">
                    <a
                        use:inertia
                        href="/projects"
                        class="btn btn-secondary float-start"
                        data-bs-dismiss="modal">Back</a
                    >
                    {#if !showButton && showButton !== ""}
                        <button
                            type="submit"
                            on:click|preventDefault={submitModal}
                            class="btn btn-primary float-end">Submit</button
                        >
                    {:else if showButton && showButton !== ""}
                        <button
                            type="submit"
                            data-bs-dismiss="modal"
                            on:click|preventDefault={updateModal(project.id)}
                            class="btn btn-primary float-end">Update</button
                        >
                    {/if}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Project Modal End -->
