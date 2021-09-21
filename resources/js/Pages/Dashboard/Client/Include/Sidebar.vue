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

      <div class="flex" :class="trager == 0? 'side-item' : ''" @click="btnToggle(0)">
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
        <div class="flex items-center " :class="trager === 1 ? 'side-item' : ''" @click="btnToggle(1)">
          <div class="p-2">
            <svg class="w-5 h-5" viewBox="0 0 20 20">
              <path
                fill="currentColor"
                d="M17.237,3.056H2.93c-0.694,0-1.263,0.568-1.263,1.263v8.837c0,0.694,0.568,1.263,1.263,1.263h4.629v0.879c-0.015,0.086-0.183,0.306-0.273,0.423c-0.223,0.293-0.455,0.592-0.293,0.92c0.07,0.139,0.226,0.303,0.577,0.303h4.819c0.208,0,0.696,0,0.862-0.379c0.162-0.37-0.124-0.682-0.374-0.955c-0.089-0.097-0.231-0.252-0.268-0.328v-0.862h4.629c0.694,0,1.263-0.568,1.263-1.263V4.319C18.5,3.625,17.932,3.056,17.237,3.056 M8.053,16.102C8.232,15.862,8.4,15.597,8.4,15.309v-0.89h3.366v0.89c0,0.303,0.211,0.562,0.419,0.793H8.053z M17.658,13.156c0,0.228-0.193,0.421-0.421,0.421H2.93c-0.228,0-0.421-0.193-0.421-0.421v-1.263h15.149V13.156z M17.658,11.052H2.509V4.319c0-0.228,0.193-0.421,0.421-0.421h14.308c0.228,0,0.421,0.193,0.421,0.421V11.052z"
              ></path>
            </svg>
          </div>
          <li class="">
            <inertia-link href="/dashboard/jobs">Jobs</inertia-link>
          </li>
        </div>

        <div class="flex items-center" :class="trager == 2 ? 'side-item' : ''"  @click="btnToggle(2)">
          <div class="p-2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              x="0px"
              y="0px"
              class="h-5 w-5"
              viewBox="0 0 24 24"
              style="fill: #333333"
            >
              <path
                d="M 10 2 L 9 3 L 3 3 L 3 5 L 4.109375 5 L 5.8925781 20.255859 L 5.8925781 20.263672 C 6.023602 21.250335 6.8803207 22 7.875 22 L 16.123047 22 C 17.117726 22 17.974445 21.250322 18.105469 20.263672 L 18.107422 20.255859 L 19.890625 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 6.125 5 L 17.875 5 L 16.123047 20 L 7.875 20 L 6.125 5 z"
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
<script>
export default {
    data() {
        return {
            // 0 , 1 ,2
            trager: 0,
        }
    },
    methods: {
        btnToggle(trager) {
            this.trager = trager
        }
    }
}
</script>

<style>
    .side-item {
        background: #90cdf4;
        width: 120%;
        margin-left: -16px;
        border-left: 2px solid red;
    }
</style>
