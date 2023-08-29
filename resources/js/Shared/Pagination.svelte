  <script>
    import { inertia } from '@inertiajs/svelte'

    export let links = []
  </script>

  <nav class="Page navigation">
    <ul class="pagination justify-content-center">
      {#if links.length > 3}
        {#each links as link, key (key)}
          <li>
            <a
              class="page-link"
              class:active={link.active}
              use:inertia
              href={link.url}
              aria-label="Goto page {link.label}">
              {@html link.label}
            </a>
          </li>
        {/each}
      {/if}
    </ul>
  </nav>

  <style>
    .pagination {
      padding: 10px;
    }
  </style>
