<template>
  <div
    class="
      min-w-0
      rounded-lg
      shadow-md
      mt-20
      ml-4
      hidden
      lg:block
      text-left
      absolute
      overflow-hidden
      bg-white
      dark:bg-gray-800
    "
  >
    <div class="p-4 items-left">
      <div
        class="
          h-1/2
          w-40
          rounded-full
          text-orange-500
          dark:text-orange-100
          bg-orange-100
          dark:bg-orange-500
        "
      ></div>

      <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
        <inertia-link href="/dashboard" > Home </inertia-link>
      </p>

      <ul>
        <li class="p-2"><inertia-link href="/dashboard/jobs">Jobs</inertia-link></li>
        <li class="p-2"><inertia-link href="/dashboard/trash">Trash</inertia-link></li>
        <!-- <li><a href="#">Linl1</a></li>
                    <li><a href="#">Linl1</a></li> -->
      </ul>
    </div>
  </div>
</template>
