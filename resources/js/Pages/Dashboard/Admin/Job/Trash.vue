<template>
  <Layout title="Dashboard . Trash" :user="user">
      <div v-if="successMessage" >
        {{message(successMessage)}}
    </div>
    <div class="bg-gray-100 p-6 rounded shadow">
        <h2 class="text-2xl font-medium mb-5 text-gray-500 uppercase">Trash</h2>
        <div class="flex justify-between">
         <div class="shadow flex  rounded">
            <input class="w-full rounded p-2 focus:outline-none" type="text" placeholder="Search..." v-model="search">
            <button class=" w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400">
              <img src="/images/search.png" alt="" width="30">
            </button>
         </div>
        </div>
        <div class="mt-4">
            <div class="flex flex-col">
                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6">
                    <div
                        class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200 ">
                        <table class="min-w-full">
                            <thead class="bg-gray-200">
                            <tr>
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
                            <tbody class="bg-gray-200">
                            <!-- <tr v-for ="job in paginateJob.data ? paginateJob.data : jobs.data  " :key="job.id"> -->
                              <tr v-for="job in filters" :key="job.id">
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                        </div>
                                        <div class="mx-2">
                                          <div class="text-sm leading-5 font-medium text-gray-600"> {{job.job_title}}</div>
                                            <div class="text-sm leading-5 text-gray-500">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-gray-200">laravel</span>
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-gray-200">laravel</span>
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-gray-200">laravel</span>
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-gray-200">laravel</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                  <span
                                      class="px-2 line-through inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Available
                                  </span>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                    {{job.job_description | strippedContent}}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                                    <inertia-link :href="'trash/'+job.id+'/edit'" class="px-2 py-1 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded">Restore</inertia-link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="w-48">
            <Paginate
                class="flex justify-between border border-blue-400  text-white bg-gray-200 py-1 px-4 mt-2 rounded text-xs font-bold "
                :data="all" @pagination-change-page="getJob" :limit="1">
            </Paginate>
            </div>
        </div>
    </div>
  </Layout>
</template>

<script>
import Layout from '../../../Layouts/dashboard'
import Paginate from 'laravel-vue-pagination'
export default {
components:{
    Layout,
    Paginate
},
props:['user','jobs','Count','successMessage'],

data() {
    return {
        all: this.jobs,
        search:''
    }
},

computed:{
    filters() {
        if(this.search){
        return this.all.data.filter(item =>{
            return item.job_title.toLowerCase().match(this.search.toLowerCase()) || item.job_description.toLowerCase().match(this.search.toLowerCase())
        })
    } else {
        return this.all.data
    }
  }
},

filters: {
    strippedContent: function(string) {
           let des =  string.replace(/<\/?[^>]+>/ig, " ");
           return des.substring(0,30) + '...';
    }
},

mounted(){
},

methods: {
    getJob(page = 1) {
        axios.get('getTrashData?page='+page)
          .then((res) => {
              this.all = res.data;
          })
    },
    dismis(){
        this.successMessage = ''
    },

    message(string){
        swal({
            title: "Success",
            text: string,
            icon: "success",
            // buttons:true
        });
      this.dismis();
    }
}
}
</script>


<style>
    .search-input{
        border:none;
        width: 240%;
        /* cursor: pointer; */
    }

</style>
