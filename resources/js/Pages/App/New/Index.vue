<template>
  <app-layouts>
    <div class="py-16 text-center">
      <h1 class="text-xl md:text-3xl text-gray-800 font-medium">
       Tags
        <span class="text-xs"></span>
      </h1>
      <div class="max-w-2xl mx-auto">
        <div class="flex items-center justify-center mt-5">
          <div class="mt-2 md:mt-0">
            <span
              ><button
                class="motion-reduce:transition-none transition-colors duration-150 ease-in-out ml-2 mt-2 px-3 py-1 cursor-pointer hover:bg-gray-700 hover:text-gray-200 rounded text-sm focus:outline-none bg-gray-700 text-gray-200"
              >
                All
              </button></span
            ><span
              ><button
                class="motion-reduce:transition-none transition-colors duration-150 ease-in-out ml-2 mt-2 px-3 py-1 cursor-pointer hover:bg-gray-700 hover:text-gray-200 rounded text-sm focus:outline-none bg-gray-200 text-gray-700"
              >
                Nod js
              </button></span
            ><span
              ><button
                class="motion-reduce:transition-none transition-colors duration-150 ease-in-out ml-2 mt-2 px-3 py-1 cursor-pointer hover:bg-gray-700 hover:text-gray-200 rounded text-sm focus:outline-none bg-gray-200 text-gray-700"
              >
                Python
              </button></span
            ><span
              ><button
                class="motion-reduce:transition-none transition-colors duration-150 ease-in-out ml-2 mt-2 px-3 py-1 cursor-pointer hover:bg-gray-700 hover:text-gray-200 rounded text-sm focus:outline-none bg-gray-200  text-gray-700"
              >
                C#
              </button></span
            ><span
              ><button
                class="motion-reduce:transition-none transition-colors duration-150 ease-in-out ml-2 mt-2 px-3 py-1 cursor-pointer hover:bg-gray-700 hover:text-gray-200 rounded text-sm focus:outline-none bg-gray-200 text-gray-700"
              >
                DotNet
              </button></span
            ><span
              ><button
                class="motion-reduce:transition-none transition-colors duration-150 ease-in-out ml-2 mt-2 px-3 py-1 cursor-pointer hover:bg-gray-700 hover:text-gray-200 rounded text-sm focus:outline-none bg-gray-200 text-gray-700"
              >
                Vue Js
              </button></span
            ><span
              ><button
                class="motion-reduce:transition-none transition-colors duration-150 ease-in-out ml-2 mt-2 px-3 py-1 cursor-pointer hover:bg-gray-700 hover:text-gray-200 rounded text-sm focus:outline-none bg-gray-200 text-gray-700"
              >
                Ruby
              </button></span
            ><span
              ><button
                class="motion-reduce:transition-none transition-colors duration-150 ease-in-out ml-2 mt-2 px-3 py-1 cursor-pointer hover:bg-gray-700 hover:text-gray-200 rounded text-sm focus:outline-none bg-gray-200 text-gray-700"
              >
                Odoo
              </button></span
            ><span
              ><button
                class="motion-reduce:transition-none transition-colors duration-150 ease-in-out ml-2 mt-2 px-3 py-1 cursor-pointer hover:bg-gray-700 hover:text-gray-200 rounded text-sm focus:outline-none bg-gray-200 text-gray-700"
              >
                Flutter
              </button></span
            ><span
              ><button
                class="motion-reduce:transition-none transition-colors duration-150 ease-in-out ml-2 mt-2 px-3 py-1 cursor-pointer hover:bg-gray-700 hover:text-gray-200 rounded text-sm focus:outline-none bg-gray-200 text-gray-700"
              >
                Kotlen
              </button></span
            ><span
              ><button
                class="motion-reduce:transition-none transition-colors duration-150 ease-in-out ml-2 mt-2 px-3 py-1 cursor-pointer hover:bg-red-400 hover:text-gray-200 rounded text-sm focus:outline-none bg-gray-200 text-gray-700"
              >
                WordPress
              </button></span
            >
          </div>
        </div>
      </div>
    </div>

    <div class="w-full max-w-6xl mx-auto px-24">
      <p class="mt-8 text-sm text-gray-500 mb-2">
        This job sort by date The first one is up to date
      </p>
      <div v-for="(i , index) in 10" :key="index"
        class="flex max-w-2lg mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-2"
        :class="color ? 'border-r-8 border-red-500' : 'border-r-8 border-white'"
      >
        <div
          class="w-1/6 bg-cover"
          style="
            background-image: url('images/download.jpeg');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
          "
        ></div>

        <div class="w-full p-4 md:p-4">
          <div class="flex item-center justify-between">
            <h1 class="text-gray-900 font-bold text-2xl">Web Devolper</h1>
            <h1 class="text-indigo-700 font-bold text-sm md:text-md">1h</h1>
          </div>

          <div class="block">
            <!-- <div class="font-semibold text-dark w-3/10 text-sm">{{job.job_title}}</div> -->
            <div class="flex divide-x-2">
              <div class="text-dark font-light pr-2">Hash Developed projects</div>
              <div class="text-second-gray pl-2">Khrtumm 60 st</div>
            </div>
          </div>
          <p class="mt-2 text-gray-600 text-sm">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Exercitationem neque impedit dolor, voluptatem odit minus tenetur
            mollitia nihil nesciunt eveniet ...
          </p>

          <div class="flex item-center mt-2">
            <!-- <div class="flex flex-wrap ml-16  py-4 w-auto"> -->
            <span
              class="px-2 bg-gray-700 text-white mr-1 mb-1 text-xs self-center rounded-lg shadow-sm focus:outline-none"
            >
              latavel
            </span>
            <span
              class="px-2 bg-gray-700 text-white mr-1 mb-1 text-xs self-center rounded-lg shadow-sm focus:outline-none"
            >
              latavel
            </span>
            <span
              class="px-2 bg-gray-700 text-white mr-1 mb-1 text-xs self-center rounded-lg shadow-sm focus:outline-none"
            >
              latavel
            </span>
            <span
              class="px-2 bg-gray-700 text-white mr-1 mb-1 text-xs self-center rounded-lg shadow-sm focus:outline-none"
            >
              latavel
            </span>
            <!-- </div> -->
          </div>

          <div class="flex item-center justify-between mt-3">
            <button
              class="px-2 py-1 bg-red-500 text-white text-xs font-bold uppercase rounded hover:bg-red-400 focus:outline-none focus:bg-red-400"
            >
              Apply
            </button>
          </div>
        </div>
      </div>
    </div>
  </app-layouts>
</template>

<script>
import Layouts from "../Master";
export default {
  components: {
    "app-layouts": Layouts,
  },
  data() {
      return {
          color: true
      }
  }
};
</script>