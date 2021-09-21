<template>
  <Layout title="SUDAJOB" :user="user" :role="role">
    <div class="mx-auto w-full">
      <div>
        <!-- Card stats -->
        <div class="flex flex-wrap -mx-4">
          <div class="w-full md:w-1/3 px-4">
            <div
              class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg"
            >
              <div class="flex-auto p-4">
                <div class="flex flex-wrap">
                  <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                    <h5 class="text-gray-500 uppercase font-bold text-xs">
                      New Jobs
                    </h5>
                    <span class="font-semibold text-xl text-gray-800">
                      {{ newers }}
                    </span>
                  </div>
                  <div class="relative w-auto px-2 flex-initial">
                    <div
                      class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-orange-500"
                    >
                      <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                        ></path>
                      </svg>
                    </div>
                  </div>
                </div>
                <p class="text-sm text-gray-500 mt-4">
                  <span class="text-red-500 mr-2">
                    <i class="fas fa-arrow-down"></i>
                  </span>
                  <span class="whitespace-no-wrap">
                    <!-- Since last week -->
                  </span>
                </p>
              </div>
            </div>
          </div>
          <div class="w-full md:w-1/3 px-4">
            <div
              class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg"
            >
              <div class="flex-auto p-4">
                <div class="flex flex-wrap">
                  <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                    <h5 class="text-gray-500 uppercase font-bold text-xs">
                      Old Jobs
                    </h5>
                    <span class="font-semibold text-xl text-gray-800">
                      {{ olders }}
                    </span>
                  </div>
                  <div class="relative w-auto px-2 flex-initial">
                    <div
                      class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-500"
                    >
                      <svg
                        class="w-5 h-5"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                        <path
                          fill-rule="evenodd"
                          d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                          clip-rule="evenodd"
                        ></path>
                      </svg>
                    </div>
                  </div>
                </div>
                <p class="text-sm text-gray-500 mt-4">
                  <span class="text-orange-500 mr-2">
                    <i class="fas fa-arrow-down"></i>
                  </span>
                  <span class="whitespace-no-wrap">
                    <!--  -->
                  </span>
                </p>
              </div>
            </div>
          </div>
          <div class="w-full md:w-1/3 px-4">
            <div
              class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg"
            >
              <div class="flex-auto p-4">
                <div class="flex flex-wrap">
                  <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                    <h5 class="text-gray-500 uppercase font-bold text-xs">
                      Deleted Jobs
                    </h5>
                    <span class="font-semibold text-xl text-gray-800">
                      {{ deleted }}
                    </span>
                  </div>
                  <div class="relative w-auto px-2 flex-initial">
                    <div
                      class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-blue-500"
                    >
                      <svg
                        class="h-5 w-5"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                          clip-rule="evenodd"
                        ></path>
                      </svg>
                    </div>
                  </div>
                </div>
                <p class="text-sm text-gray-500 mt-4">
                  <span class="text-green-500 mr-2">
                    <i class="fas fa-arrow-up"></i>
                  </span>
                  <span class="whitespace-no-wrap"> </span>
                </p>
              </div>
            </div>
          </div>
              <line-chart :chartdata="chartdata" :options="chartOptions"/>
        </div>
      </div>
    </div>
  </Layout>
</template>
<script>
import Layout from "../../Layouts/dashboard";
import LineChart from "./Chart/LineChart.vue";
export default {
  components: {
    Layout,
    LineChart
  },

  props: ["newers", "olders", "deleted", "role"],

  data() {
      return {
          user:this.$page.authadmin,
          chartOptions: {name : '1' , age:'2' , last:'3'},
          chartdata : {name: 'Ali' , age: 30 , last: 'coll'}
      }
  }
};
</script>
