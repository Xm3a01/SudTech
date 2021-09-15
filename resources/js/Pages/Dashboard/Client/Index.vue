<template>
  <app title="SUDAJOB">
    <template v-slot:header> </template>
    <template v-slot:sidebar>
        <sidebar />
    </template>

    <div class="box pt-20 w-9/12 md:w-3/5 mx-auto">
      <div class="grid gap-6 mb-8 md:grid-cols-3 xl:grid-cols-3">
        <div
          class="
            min-w-0
            rounded-lg
            shadow-md
            overflow-hidden
            bg-white
            dark:bg-gray-800
          "
        >
          <div class="p-4 flex items-center">
            <div
              class="
                p-3
                rounded-full
                text-orange-500
                dark:text-orange-100
                bg-orange-100
                dark:bg-orange-500
                mr-4
              "
            >
              <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5">
                <path
                  d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                ></path>
              </svg>
            </div>
            <div>
              <p
                class="
                  mb-2
                  text-sm
                  font-medium
                  text-gray-600
                  dark:text-gray-400
                "
              >
                Old Jobs <small class="text-gray-400">(affter 1 month)</small>
              </p>
              <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{olders}}
              </p>
            </div>
          </div>
        </div>

        <div
          class="
            min-w-0
            rounded-lg
            shadow-md
            overflow-hidden
            bg-white
            dark:bg-gray-800
          "
        >
          <div class="p-4 flex items-center">
            <div
              class="
                p-3
                rounded-full
                text-orange-500
                dark:text-orange-100
                bg-orange-100
                dark:bg-orange-500
                mr-4
              "
            >
              <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5">
                <path
                  d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                ></path>
              </svg>
            </div>
            <div>
              <p
                class="
                  mb-2
                  text-sm
                  font-medium
                  text-gray-600
                  dark:text-gray-400
                "
              >
                New Jobs
              </p>
              <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{newers}}
              </p>
            </div>
          </div>
        </div>
        <div
          class="
            min-w-0
            rounded-lg
            shadow-md
            overflow-hidden
            bg-white
            dark:bg-gray-800
          "
        >
          <div class="p-4 flex items-center">
            <div
              class="
                p-3
                rounded-full
                text-orange-500
                dark:text-orange-100
                bg-orange-100
                dark:bg-orange-500
                mr-4
              "
            >
              <svg fill="currentColor" viewBox="0 0 20 20" class="w-5 h-5">
                <path
                  d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                ></path>
              </svg>
            </div>
            <div>
              <p
                class="
                  mb-2
                  text-sm
                  font-medium
                  text-gray-600
                  dark:text-gray-400
                "
              >
                Jobs Deleted <small class="text-gray-400">(2 month)</small>
              </p>
              <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{deleted}}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="px-auto mx-auto py-12 w-9/12 md:w-3/5 bg-white p-10">
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
            <table class="min-w-full shadow-lg">
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
                <!-- <tr v-for ="job in paginateJob.data ? paginateJob.data : jobs.data" :key="job.id"> -->
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
                        <div class="text-sm mt-1 leading-5 text-gray-500">
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
                            v-for="tag in job.tags"
                            :key="tag.id"
                            >{{ tag.name }}</span
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
                        inline-flex
                        text-xs
                        leading-5
                        cursor-pointer
                        font-semibold
                        rounded-full
                        bg-green-100
                        text-green-800
                      "
                    >
                      {{ job.status == 1 ? "Available" : "NotAvailable" }}
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
                    {{ job.job_location }}
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
                      :href="'/dashboard/jobs/' + job.id + '/edit'"
                      class="
                        px-2
                        py-1
                        bg-indigo-500
                        hover:bg-indigo-600
                        text-white text-sm
                        font-medium
                        rounded
                      "
                      >Edit</inertia-link
                    >
                    <inertia-link
                      href=""
                      @click.prevent="deletejob(job.id)"
                      class="
                        px-2
                        py-1
                        bg-red-500
                        hover:bg-red-600
                        text-white text-sm
                        font-medium
                        rounded
                      "
                      >Delete</inertia-link
                    >
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="w-64">
            <Paginate
              class="
                flex
                justify-between
                border border-gray-200
                text-blue-500
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
    </div>

    <!-- End Cards -->
  </app>
</template>

<script>
import App from "../../Layouts/App.vue";
import Paginate from "laravel-vue-pagination";
import Sidebar from './Include/Sidebar.vue';

export default {
  components: {
    Paginate,
    App,
    Sidebar
  },
  props: ["user", "jobs", "successMessage" ,'deleted' , 'newers' , 'olders'],

  data() {
    return {
      all: this.jobs,
      search: "",
      des: "",
    };
  },

  mounted() {
      console.log(this.jobs)
  },

  methods: {
    getJob(page = 1) {
      axios.get("getData?page=" + page).then((res) => {
        this.all = res.data;
        console.log(res.data)
      });
    },

    deletejob(id) {
      swal({
        title: "Confirm delete",
        text: "Do you really want to delete?",
        icon: "error",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.delete("jobs/" + id);
        }
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
};
</script>


<style>
.search-input {
  border: none;
  width: 240%;
}
</style>
