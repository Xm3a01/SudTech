<template>
  <Layout title="Dashboard . Jobs" :user="user">
    <div class="bg-gray-100 p-6 rounded shadow">
        <h2 class="text-2xl font-medium mb-5 text-gray-500 uppercase">Jobs</h2>
        <div class="flex justify-between">
            <!-- <div class="w-1/3 bg-gray-800 rounded-lg flex border-2 border-gray-500">
                <span class ="w-1/3 mt-1 ml-3 hidden md:block"><img src="/images/search.png" alt="" width="30"></span>
                <span class="bg-gray-500 mr-1 hidden md:block" style="width:1px;"></span>
                <input
                    class=" pl-3 w-1/3 search-input bg-gray-800 border-0 focus:border-0 appearance-none focus:shadow-none focus:bg-gray-700 mt-1 mb-1 w-half h-8"
                    type="text"
                    placeholder="Search...">
            </div> -->
            <!-- <div class="relative mr-6 my-2">
            <input type="search" class="bg-purple-white shadow rounded border-0 p-3" placeholder="Search by name...">
            <div class="absolute pin-r pin-t mt-3 mr-4 text-purple-lighter">
            <svg version="1.1" class="h-4 text-dark" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 52.966 52.966" style="enable-background:new 0 0 52.966 52.966;" xml:space="preserve">
                    <path d="M51.704,51.273L36.845,35.82c3.79-3.801,6.138-9.041,6.138-14.82c0-11.58-9.42-21-21-21s-21,9.42-21,21s9.42,21,21,21
                    c5.083,0,9.748-1.817,13.384-4.832l14.895,15.491c0.196,0.205,0.458,0.307,0.721,0.307c0.25,0,0.499-0.093,0.693-0.279
                    C52.074,52.304,52.086,51.671,51.704,51.273z M21.983,40c-10.477,0-19-8.523-19-19s8.523-19,19-19s19,8.523,19,19
                    S32.459,40,21.983,40z"/>

              </svg>

          </div>
           </div> -->

        <div class="shadow flex  rounded">
            <input class="w-full rounded p-2 focus:outline-none" type="text" placeholder="Search...">
            <button class=" w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400">
              <img src="/images/search.png" alt="" width="30">
            </button>
        </div>

            <div>
              <inertia-link href="#"  class="px-3 py-1 font-medium shadow  bg-blue-500 hover:bg-blue-400 text-white text-sm rounded"> + New</inertia-link>
            </div>

        </div>
        <div class="mt-4">
            <div class="flex flex-col">
                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6">
                    <div
                        class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200 ">
                        <table class="min-w-full">
                            <thead class="bg-gray-800">
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                    style="text-align: start">
                                    Job Name
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                    style="text-align: start">
                                    Job Title
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                    style="text-align: start">
                                    Status
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                    style="text-align: start">
                                    Job Description
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                            </tr>
                            </thead>
                            <tbody class="bg-gray-800">
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                        </div>
                                        <div class="mx-2">
                                          <div class="text-sm leading-5 font-medium text-gray-300">Devloper full satck</div>
                                            <div class="text-sm leading-5 text-gray-500">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-gray-200">vue</span>
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-gray-200">react</span>
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-gray-200">laravel</span>
                                                <br><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-gray-200">laravel</span>
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-gray-200">laravel</span>
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-gray-200">laravel</span>
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-gray-200">laravel</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-gray-500">
                                    Devloper
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                  <span
                                      class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Available
                                  </span>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                    We need to devoloer to enjoin our team...
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                                    <a href="#" class="px-2 py-1 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded">Edit</a>
                                    <a href="#" class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                        </div>
                                        <div class="mx-2">
                                            <div class="text-sm leading-5 font-medium text-gray-200">HR (Stupid)</div>
                                            <div class="text-sm leading-5 text-gray-500">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-gray-200">nothing</span>
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-gray-200">null</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-gray-500">
                                    HR
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                  <span
                                      class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Not Available
                                  </span>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                    We need stupid person to sid down just...
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                                    <a href="#" class="px-2 py-1 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded">Edit</a>
                                    <a href="#" class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded">Delete</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </Layout>
</template>

<script>
import Layout from './../../Layouts/dashboard'
export default {
components:{
    Layout
},
props:['user']
}
</script>


<style>
    .search-input{
        border:none;
        width: 240%;
    }

</style>
