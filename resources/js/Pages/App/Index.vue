<template>
  <app title="SUDAJOB">

    <div class="box pt-20 w-9/12 md:w-3/5 mx-auto">
      <div class="box-wrapper">
        <div
          class="bg-white rounded flex items-center w-full p-3 shadow-sm border border-gray-200"
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
            class="w-full pl-4 text-sm outline-none focus:outline-none bg-transparent"
          />
          <div class="select">
            <select
              name=""
              id=""
              x-model="image_type"
              v-model="type"
              class="text-sm outline-none focus:outline-none bg-transparent"
            >
              <option value="all" selected>All</option>
              <option value="new">New</option>
              <option value="older">Older</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="px-auto mx-auto py-12 w-9/12 md:w-3/5">
      <div v-if="type != 'older'" class="mb-12">
        <div class="text-xl mb-2 text-gray-600 font-bold">NEW</div>
        <a
          v-for="job in filterNews"
          :key="job.id"
          :class="job.job_color"
          class="border-b border-gray-300 py-2 px-2 w-full flex flex-wrap justify-between hover:bg-gray-200"
        >
          <div class="flex flex-no-wrap w-full md:w-3/4 flex-col md:flex-row">
            <div class="md:w-1/2 flex">
              <img
                class="h-4/3 w-4/3 object-cover rounded mr-4 self-start"
                :src="job.image ? job.image : 'images/noimage.jpg'"
              />
              <div class="block">
                <div class="font-semibold text-dark w-3/10 text-sm">
                  {{ job.job_title }}
                </div>
                <div class="text-dark font-light">{{ job.company_name }}</div>
                <div class="flex">
                  <button
                    class="fill-current text-second-gray focus:outline-none"
                  >
                    <svg
                      class="h-4 w-4"
                      width="22"
                      height="22"
                      viewBox="0 0 22 22"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M0 10.9554V11.0446C0.0106637 13.7301 0.98363 16.1885 2.59196 18.0931C3.05715 18.6439 3.57549 19.1485 4.13908 19.5987C4.70631 20.0519 5.31937 20.4501 5.97019 20.7853C6.90271 21.2656 7.91275 21.6165 8.97659 21.8143C9.59145 21.9286 10.2243 21.9918 10.8705 21.9993C10.9136 21.9998 10.9567 22 10.9999 22C14.6894 22 17.9547 20.1836 19.9502 17.3962C20.3681 16.8125 20.7303 16.1861 21.0291 15.525C21.6528 14.1448 21.9999 12.613 21.9999 11C21.9999 7.73978 20.5816 4.81084 18.3283 2.79653C17.8064 2.32998 17.2397 1.91249 16.6355 1.55132C14.9873 0.56615 13.0597 0 10.9999 0C10.888 0 10.7764 0.00167179 10.6653 0.00499153C8.99846 0.0547895 7.42477 0.475413 6.0239 1.18719C5.07085 1.67144 4.19779 2.29045 3.42982 3.01914C2.7166 3.69587 2.09401 4.4672 1.58216 5.31302C1.22108 5.90969 0.915112 6.54343 0.671295 7.20718C0.241844 8.37631 0.00522906 9.63855 0 10.9554ZM19.4812 14.0186C19.8171 13.075 19.9999 12.0588 19.9999 11C19.9999 8.54265 19.0151 6.31533 17.4186 4.6912C16.5975 6.05399 15.5148 7.18424 14.2668 8.0469C14.7351 9.26262 14.9886 10.5603 15.0045 11.8778C15.7692 12.0484 16.5274 12.304 17.2669 12.6488C18.0741 13.0252 18.8141 13.487 19.4812 14.0186ZM14.8413 13.8954C15.3752 14.0321 15.904 14.22 16.4217 14.4614C17.222 14.8346 17.9417 15.3105 18.5723 15.8661C17.0688 18.2008 14.5151 19.7953 11.5788 19.9817C12.5517 19.0585 13.3709 17.9405 13.972 16.6514C14.3909 15.7531 14.678 14.8272 14.8413 13.8954ZM12.9964 11.6219C12.9583 10.7382 12.7898 9.86839 12.5013 9.04079C9.68874 10.2998 6.36584 10.3765 3.35382 8.97197C3.01251 8.81281 2.68319 8.63837 2.36632 8.44983C2.12787 9.25835 1.99991 10.1142 1.99991 11C1.99991 12.9462 2.61763 14.748 3.6677 16.2203C5.83038 13.1875 9.36854 11.4987 12.9964 11.6219ZM5.047 17.7502C6.77258 15.059 9.77137 13.5382 12.8585 13.6191C12.723 14.3586 12.4919 15.093 12.1594 15.8062C11.3777 17.4825 10.1453 18.805 8.67385 19.6965C7.31043 19.3328 6.07441 18.6569 5.047 17.7502ZM10.9999 2C12.7846 2 14.4479 2.51946 15.847 3.41543C15.2113 4.54838 14.3593 5.4961 13.368 6.23057C12.3472 4.57072 10.8752 3.16433 9.02696 2.21692C9.6619 2.07492 10.3222 2 10.9999 2ZM7.80619 3.84582C9.44618 4.61056 10.7474 5.80659 11.6379 7.23588C9.3464 8.24654 6.64722 8.30095 4.19906 7.15936C3.83384 6.98905 3.48541 6.79735 3.15458 6.58645C3.91365 5.24006 5.00929 4.10867 6.32734 3.30645C6.82672 3.44058 7.32138 3.61975 7.80619 3.84582Z"
                      />
                    </svg>
                  </button>
                  <span class="text-xs text-second-gray pl-1">{{
                    job.job_location
                  }}</span>
                </div>
              </div>
            </div>
            <div class="flex flex-wrap ml-16 py-4 w-auto">
              <span
                v-for="tag in job.tags"
                :key="tag.id"
                class="px-2 bg-gray-600 text-gray-300 mr-1 mb-1 text-xs self-center rounded-lg shadow-sm focus:outline-none"
              >
                {{ tag.name }}
              </span>
            </div>
          </div>
          <div class="flex justify-end">
            <div class="flex items-center">
              <!-- http%3A%2F%2Flocalhost:8000%2F -->
              <a :href="`https://twitter.com/intent/tweet?url=http%3A%2F%2Flocalhost:8000/job/show/${job.id}.&text=${job.company_name}:+Post+new+job+you+may+interest.&hashtags=${job.tags.map((tag)=>{return tag.name})}`"
                class="fill-current text-second-gray mr-4 focus:outline-none"
                target="_blank"
              >
                <svg
                  class="h-4 w-4"
                  width="18"
                  height="18"
                  viewBox="0 0 18 18"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M11.8283 8.99996L13.2426 10.4142L16.071 7.58575C17.6331 6.02365 17.6331 3.49099 16.071 1.9289C14.5089 0.3668 11.9762 0.3668 10.4141 1.9289L7.58571 4.75732L8.99992 6.17154L11.8283 3.34311C12.6094 2.56206 13.8757 2.56206 14.6568 3.34311C15.4378 4.12416 15.4378 5.39049 14.6568 6.17154L11.8283 8.99996Z"
                  />
                  <path
                    d="M8.99996 11.8285L10.4142 13.2427L7.58575 16.0711C6.02365 17.6332 3.49099 17.6332 1.9289 16.0711C0.3668 14.509 0.3668 11.9764 1.9289 10.4143L4.75732 7.58583L6.17154 9.00004L3.34311 11.8285C2.56206 12.6095 2.56206 13.8758 3.34311 14.6569C4.12416 15.4379 5.39049 15.4379 6.17154 14.6569L8.99996 11.8285Z"
                  />
                  <path
                    d="M11.8284 7.58568C12.2189 7.19516 12.2189 6.56199 11.8284 6.17147C11.4379 5.78094 10.8047 5.78094 10.4142 6.17147L6.17154 10.4141C5.78101 10.8046 5.78101 11.4378 6.17154 11.8283C6.56206 12.2188 7.19522 12.2188 7.58575 11.8283L11.8284 7.58568Z"
                  />
                </svg>
              </a>
              <span class="mr-4">{{ job.created_at }}</span>
            </div>
            <div class="flex items-center">
              <inertia-link
                :href="$route('job.show', job.id)"
                class="px-4 py-1 text-sm hover:bg-red-400 hover:text-primary bg-secondary focus:outline-none text-white rounded-sm"
              >
                Apply
              </inertia-link>
            </div>
          </div>
        </a>
      </div>
      <div v-if="type != 'new'" class="mb-12">
        <div class="flex mb-2 justify-between">
          <div class="text-xl text-gray-600 font-bold">OLDER</div>
          <div class="flex text-second-gray items-end justify-end text-sm">
            Note, these jobs may no longer be available
          </div>
        </div>
        <a
          v-for="(job, k) in filterOlds"
          :key="k"
          :class="job.job_color"
          class="border-b border-gray-300 bg-yellow-200 py-2 px-3 w-full flex flex-wrap justify-between hover:bg-gray-200"
        >
          <div class="flex flex-no-wrap w-full md:w-3/4 flex-col md:flex-row">
            <div class="md:w-1/2 flex">
              <img
                class="h-4/3 w-4/3 object-cover rounded mr-4 self-start"
                :src="job.image"
              />
              <div class="block">
                <div class="font-semibold text-dark w-3/10 text-sm">
                  {{ job.job_title }}
                </div>
                <div class="text-dark font-light">{{ job.company_name }}</div>
                <div class="flex">
                  <button
                    class="fill-current text-second-gray focus:outline-none"
                  >
                    <svg
                      class="h-4 w-4"
                      width="22"
                      height="22"
                      viewBox="0 0 22 22"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M0 10.9554V11.0446C0.0106637 13.7301 0.98363 16.1885 2.59196 18.0931C3.05715 18.6439 3.57549 19.1485 4.13908 19.5987C4.70631 20.0519 5.31937 20.4501 5.97019 20.7853C6.90271 21.2656 7.91275 21.6165 8.97659 21.8143C9.59145 21.9286 10.2243 21.9918 10.8705 21.9993C10.9136 21.9998 10.9567 22 10.9999 22C14.6894 22 17.9547 20.1836 19.9502 17.3962C20.3681 16.8125 20.7303 16.1861 21.0291 15.525C21.6528 14.1448 21.9999 12.613 21.9999 11C21.9999 7.73978 20.5816 4.81084 18.3283 2.79653C17.8064 2.32998 17.2397 1.91249 16.6355 1.55132C14.9873 0.56615 13.0597 0 10.9999 0C10.888 0 10.7764 0.00167179 10.6653 0.00499153C8.99846 0.0547895 7.42477 0.475413 6.0239 1.18719C5.07085 1.67144 4.19779 2.29045 3.42982 3.01914C2.7166 3.69587 2.09401 4.4672 1.58216 5.31302C1.22108 5.90969 0.915112 6.54343 0.671295 7.20718C0.241844 8.37631 0.00522906 9.63855 0 10.9554ZM19.4812 14.0186C19.8171 13.075 19.9999 12.0588 19.9999 11C19.9999 8.54265 19.0151 6.31533 17.4186 4.6912C16.5975 6.05399 15.5148 7.18424 14.2668 8.0469C14.7351 9.26262 14.9886 10.5603 15.0045 11.8778C15.7692 12.0484 16.5274 12.304 17.2669 12.6488C18.0741 13.0252 18.8141 13.487 19.4812 14.0186ZM14.8413 13.8954C15.3752 14.0321 15.904 14.22 16.4217 14.4614C17.222 14.8346 17.9417 15.3105 18.5723 15.8661C17.0688 18.2008 14.5151 19.7953 11.5788 19.9817C12.5517 19.0585 13.3709 17.9405 13.972 16.6514C14.3909 15.7531 14.678 14.8272 14.8413 13.8954ZM12.9964 11.6219C12.9583 10.7382 12.7898 9.86839 12.5013 9.04079C9.68874 10.2998 6.36584 10.3765 3.35382 8.97197C3.01251 8.81281 2.68319 8.63837 2.36632 8.44983C2.12787 9.25835 1.99991 10.1142 1.99991 11C1.99991 12.9462 2.61763 14.748 3.6677 16.2203C5.83038 13.1875 9.36854 11.4987 12.9964 11.6219ZM5.047 17.7502C6.77258 15.059 9.77137 13.5382 12.8585 13.6191C12.723 14.3586 12.4919 15.093 12.1594 15.8062C11.3777 17.4825 10.1453 18.805 8.67385 19.6965C7.31043 19.3328 6.07441 18.6569 5.047 17.7502ZM10.9999 2C12.7846 2 14.4479 2.51946 15.847 3.41543C15.2113 4.54838 14.3593 5.4961 13.368 6.23057C12.3472 4.57072 10.8752 3.16433 9.02696 2.21692C9.6619 2.07492 10.3222 2 10.9999 2ZM7.80619 3.84582C9.44618 4.61056 10.7474 5.80659 11.6379 7.23588C9.3464 8.24654 6.64722 8.30095 4.19906 7.15936C3.83384 6.98905 3.48541 6.79735 3.15458 6.58645C3.91365 5.24006 5.00929 4.10867 6.32734 3.30645C6.82672 3.44058 7.32138 3.61975 7.80619 3.84582Z"
                      />
                    </svg>
                  </button>
                  <span class="text-xs text-second-gray pl-1">{{
                    job.job_location
                  }}</span>
                </div>
              </div>
            </div>
            <div class="flex flex-wrap ml-16 py-4 w-auto">
              <span
                v-for="tag in job.tags"
                :key="tag.id"
                class="px-2 bg-gray-600 text-gray-300 mr-1 mb-1 text-xs self-center rounded-lg shadow-sm focus:outline-none"
              >
                {{ tag.name }}
              </span>
            </div>
          </div>
          <div class="flex justify-end">
            <div class="flex items-center">
              <button
                class="fill-current text-second-gray mr-4 focus:outline-none"
              >
                <svg
                  class="h-4 w-4"
                  width="18"
                  height="18"
                  viewBox="0 0 18 18"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M11.8283 8.99996L13.2426 10.4142L16.071 7.58575C17.6331 6.02365 17.6331 3.49099 16.071 1.9289C14.5089 0.3668 11.9762 0.3668 10.4141 1.9289L7.58571 4.75732L8.99992 6.17154L11.8283 3.34311C12.6094 2.56206 13.8757 2.56206 14.6568 3.34311C15.4378 4.12416 15.4378 5.39049 14.6568 6.17154L11.8283 8.99996Z"
                  />
                  <path
                    d="M8.99996 11.8285L10.4142 13.2427L7.58575 16.0711C6.02365 17.6332 3.49099 17.6332 1.9289 16.0711C0.3668 14.509 0.3668 11.9764 1.9289 10.4143L4.75732 7.58583L6.17154 9.00004L3.34311 11.8285C2.56206 12.6095 2.56206 13.8758 3.34311 14.6569C4.12416 15.4379 5.39049 15.4379 6.17154 14.6569L8.99996 11.8285Z"
                  />
                  <path
                    d="M11.8284 7.58568C12.2189 7.19516 12.2189 6.56199 11.8284 6.17147C11.4379 5.78094 10.8047 5.78094 10.4142 6.17147L6.17154 10.4141C5.78101 10.8046 5.78101 11.4378 6.17154 11.8283C6.56206 12.2188 7.19522 12.2188 7.58575 11.8283L11.8284 7.58568Z"
                  />
                </svg>
              </button>
              <span class="mr-4">{{ job.created_at }}</span>
            </div>
            <div class="flex items-center">
              <inertia-link
                :href="$route('job.show', job.id)"
                class="px-4 py-1 text-sm hover:bg-white hover:text-primary bg-secondary focus:outline-none text-white rounded-sm"
              >
                Apply
              </inertia-link>
            </div>
          </div>
        </a>
      </div>
    </div>
    <!-- End Cards -->
  </app>
  <!--  -->
  <!-- this.$inertia.post(route('reminder.save'), postData) -->
</template>

<script>
import App from "./../Layouts/App";
export default {
  components: {
    App,
  },
  props: ["olders", "newers", "jobs"],
  data() {
    return {
      search: "",
      type: "all",
    };
  },
  computed: {
    filterNews() {
      if ((this.search && this.type == "new") || this.type == "all") {
        return this.newers.filter((item) => {
          console.log("new");
          return item.job_title.toLowerCase().match(this.search.toLowerCase());
        });
      } else {
        return this.newers;
      }
    },
    filterOlds() {
      if ((this.search && this.type == "older") || this.type == "all") {
        return this.olders.filter((item) => {
          console.log("old");
          return item.job_title.toLowerCase().match(this.search.toLowerCase());
        });
      } else {
        return this.olders;
      }
    },
  },
};
</script>

<style >

.header-brand {
  /* background-color: #DFDBE5; */
/* background-color: #DFDBE5; */
/* background-color: #DFDBE5; */
background-image: url("data:image/svg+xml,%3Csvg width='32' height='26' viewBox='0 0 32 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M14 0v3.994C14 7.864 10.858 11 7 11c-3.866 0-7-3.138-7-7.006V0h2v4.005C2 6.765 4.24 9 7 9c2.756 0 5-2.236 5-4.995V0h2zm0 26v-5.994C14 16.138 10.866 13 7 13c-3.858 0-7 3.137-7 7.006V26h2v-6.005C2 17.235 4.244 15 7 15c2.76 0 5 2.236 5 4.995V26h2zm2-18.994C16 3.136 19.142 0 23 0c3.866 0 7 3.138 7 7.006v9.988C30 20.864 26.858 24 23 24c-3.866 0-7-3.138-7-7.006V7.006zm2-.01C18 4.235 20.244 2 23 2c2.76 0 5 2.236 5 4.995v10.01C28 19.765 25.756 22 23 22c-2.76 0-5-2.236-5-4.995V6.995z' fill='%239C92AC' fill-opacity='0.19' fill-rule='evenodd'/%3E%3C/svg%3E");
background-position: center;
background-size: 10px;
}
</style>
