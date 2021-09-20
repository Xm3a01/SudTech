<template>
  <client-layout title="Dashboard . Trash" :user="user">
    <div v-if="successMessage">
      {{ message(successMessage) }}
    </div>

    <div class="box pt-20 w-9/12 md:w-3/5 mx-auto">
      <div class="box-wrapper">
        <div
          class="
            bg-white
            rounded
            flex
            items-center
            w-full
            p-3
            shadow-sm
            border border-gray-200
          "
        >
          <button @click="getImages()" class="outline-none focus:outline-none">
            <svg
              class="w-5 text-gray-600 h-5 cursor-pointer"
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
          </button>
          <input
            type="search"
            name=""
            id=""
            @keydown.enter="getImages()"
            placeholder="search for job"
            v-model="search"
            x-model="q"
            class="
              w-full
              pl-4
              text-sm
              outline-none
              focus:outline-none
              bg-transparent
            "
          />
          <div class="select">
            <select
              name=""
              id=""
              x-model="image_type"
              v-model="type"
              class="text-sm outline-none focus:outline-none bg-transparent"
            >
              <!-- <option value="all" selected>All</option>
              <option value="new">New</option>
              <option value="older">Older</option> -->
            </select>
          </div>
        </div>
      </div>
    </div>

    <div
      class="px-auto mb-10 mt-10 mx-auto py-12 w-9/12 md:w-3/5 bg-white p-10"
    >
      <div class="bg-gray-100 rounded shadow">
        <h2 class="text-2xl font-medium mb-5 text-gray-500 uppercase">Trash</h2>
        <div class="flex flex-col">
          <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6">
            <div
              class="
                align-middle
                inline-block
                min-w-full
                shadow
                overflow-hidden
                sm:rounded-lg
                border-b border-gray-200
              "
            >
              <table class="min-w-full">
                <thead class="bg-gray-200">
                  <tr>
                    <th
                      class="
                        px-6
                        py-3
                        border-b border-gray-200
                        bg-gray-50
                        text-xs
                        leading-4
                        font-medium
                        text-gray-500
                        uppercase
                        tracking-wider
                      "
                      style="text-align: start"
                    >
                      Job Title
                    </th>
                    <th
                      class="
                        px-6
                        py-3
                        border-b border-gray-200
                        bg-gray-50
                        text-xs
                        leading-4
                        font-medium
                        text-gray-500
                        uppercase
                        tracking-wider
                      "
                      style="text-align: start"
                    >
                      Status
                    </th>
                    <th
                      class="
                        px-6
                        py-3
                        border-b border-gray-200
                        bg-gray-50
                        text-xs
                        leading-4
                        font-medium
                        text-gray-500
                        uppercase
                        tracking-wider
                      "
                      style="text-align: start"
                    >
                      Job Location
                    </th>
                    <th
                      class="px-6 py-3 border-b border-gray-200 bg-gray-50"
                    ></th>
                  </tr>
                </thead>
                <tbody class="bg-gray-200">
                  <!-- <tr v-for ="job in paginateJob.data ? paginateJob.data : jobs.data  " :key="job.id"> -->
                  <tr v-for="job in filters" :key="job.id">
                    <td
                      class="
                        px-6
                        py-4
                        whitespace-no-wrap
                        border-b border-gray-200
                      "
                    >
                      <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10"></div>
                        <div class="mx-2">
                          <div
                            class="text-sm leading-5 font-medium text-gray-600"
                          >
                            {{ job.job_title }}
                          </div>
                          <div class="text-sm leading-5 text-gray-500">
                            <span
                              class="
                                px-2
                                inline-flex
                                text-xs
                                leading-5
                                font-semibold
                                rounded-full
                                bg-red-800
                                text-gray-200
                              "
                              >laravel</span
                            >
                            <span
                              class="
                                px-2
                                inline-flex
                                text-xs
                                leading-5
                                font-semibold
                                rounded-full
                                bg-red-800
                                text-gray-200
                              "
                              >laravel</span
                            >
                            <span
                              class="
                                px-2
                                inline-flex
                                text-xs
                                leading-5
                                font-semibold
                                rounded-full
                                bg-red-800
                                text-gray-200
                              "
                              >laravel</span
                            >
                            <span
                              class="
                                px-2
                                inline-flex
                                text-xs
                                leading-5
                                font-semibold
                                rounded-full
                                bg-red-800
                                text-gray-200
                              "
                              >laravel</span
                            >
                          </div>
                        </div>
                      </div>
                    </td>
                    <td
                      class="
                        px-6
                        py-4
                        whitespace-no-wrap
                        border-b border-gray-200
                      "
                    >
                      <span
                        class="
                          px-2
                          line-through
                          inline-flex
                          text-xs
                          leading-5
                          font-semibold
                          rounded-full
                          bg-green-100
                          text-green-800
                        "
                      >
                        Available
                      </span>
                    </td>
                    <td
                      class="
                        px-6
                        py-4
                        whitespace-no-wrap
                        border-b border-gray-200
                        text-sm
                        leading-5
                        text-gray-500
                      "
                    >
                      {{ job.job_location  }}
                    </td>
                    <td
                      class="
                        px-6
                        py-4
                        whitespace-no-wrap
                        border-b border-gray-200
                        text-sm
                        leading-5
                        font-medium
                      "
                    >
                      <inertia-link
                        :href="'trash/' + job.id + '/edit'"
                        class="
                          px-2
                          py-1
                          bg-indigo-500
                          hover:bg-indigo-600
                          text-white text-sm
                          font-medium
                          rounded
                        "
                        >Restore</inertia-link
                      >
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="w-48">
          <Paginate
            class="
              flex
              justify-between
              border border-blue-400
              text-white
              bg-gray-200
              py-1
              px-4
              mt-2
              rounded
              text-xs
              font-bold
            "
            :data="all"
            @pagination-change-page="getJob"
            :limit="1"
          >
          </Paginate>
        </div>
      </div>
    </div>
  </client-layout>
</template>

<script>
import ClientLayout from "./../../Layouts/Client.vue";
import Paginate from "laravel-vue-pagination";
export default {
  components: {
    ClientLayout,
    Paginate,

  },
  props: ["jobs", "Count", "successMessage"],

  data() {
    return {
      all: this.jobs,
      search: "",
    };
  },

  computed: {
    filters() {
      if (this.search) {
        return this.all.data.filter((item) => {
          return (
            item.job_title.toLowerCase().match(this.search.toLowerCase()) ||
            item.job_description.toLowerCase().match(this.search.toLowerCase())
          );
        });
      } else {
        return this.all.data;
      }
    },
  },

  filters: {
    strippedContent: function (string) {
      let des = string.replace(/<\/?[^>]+>/gi, " ");
      return des.substring(0, 30) + "...";
    },
  },

  mounted() {},

  methods: {
    getJob(page = 1) {
      axios.get("getTrashData?page=" + page).then((res) => {
        this.all = res.data;
      });
    },
    dismis() {
      this.successMessage = "";
    },

    message(string) {
      swal({
        title: "Success",
        text: string,
        icon: "success",
        // buttons:true
      });
      this.dismis();
    },
  },
};
</script>


<style>
.search-input {
  border: none;
  width: 240%;
  /* cursor: pointer; */
}
</style>
