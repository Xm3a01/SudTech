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

      <div class="flex">
        <div class="">
          <svg fill="currentColor" class="w-5 h-5" viewBox="0 0 20 20">
            <path
              d="M18.121,9.88l-7.832-7.836c-0.155-0.158-0.428-0.155-0.584,0L1.842,9.913c-0.262,0.263-0.073,0.705,0.292,0.705h2.069v7.042c0,0.227,0.187,0.414,0.414,0.414h3.725c0.228,0,0.414-0.188,0.414-0.414v-3.313h2.483v3.313c0,0.227,0.187,0.414,0.413,0.414h3.726c0.229,0,0.414-0.188,0.414-0.414v-7.042h2.068h0.004C18.331,10.617,18.389,10.146,18.121,9.88 M14.963,17.245h-2.896v-3.313c0-0.229-0.186-0.415-0.414-0.415H8.342c-0.228,0-0.414,0.187-0.414,0.415v3.313H5.032v-6.628h9.931V17.245z M3.133,9.79l6.864-6.868l6.867,6.868H3.133z"
            ></path>
          </svg>
        </div>
        <p
          class="mb-2 px-2 text-sm font-medium text-gray-600 dark:text-gray-400"
        >
          <inertia-link href="/dashboard"> Home </inertia-link>
        </p>
      </div>

      <ul>
        <div class="flex items-center">
          <div class="p-2">
            <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5">
              <path
                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
              ></path>
            </svg>
          </div>
          <li class="">
            <inertia-link href="/dashboard/jobs">Jobs</inertia-link>
          </li>
        </div>

        <div class="flex items-center">
          <div class="p-2">
            <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5">
              <path
                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
              ></path>
            </svg>
          </div>
          <li class="">
            <inertia-link href="/dashboard/trash">Trash</inertia-link>
          </li>
        </div>
      </ul>
    </div>
  </div>
</template>
