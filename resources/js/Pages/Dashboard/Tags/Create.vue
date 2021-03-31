<template>

    <dashboard title="Edit tag" :user="user">
    <div
      class="bg-gray-100 p-6 rounded pt-20 shadow overflow-y-auto"
      style="height: 550px"
    >
      <!-- <div v-if="Object.keys(errors).length > 0 " class="text-red-400 border flex justify-center rounded p-4 border-red-400 bg-red-200 font-bold mb-1">
             {{ errors[Object.keys(errors)[0]][0] }}
           </div> -->
      <h2
        class="text-2xl w-9/12 mx-auto font-medium mb-5 text-gray-500 uppercase"
      >
        Create tag
      </h2>
      <div class="container w-9/12 mx-auto px-4 mb-12 mt-8">
        <form @submit.prevent="submit()">
          <div class="sm:w-3/4 mx-auto">
            <div>
              <div class="mb-4">
                <label for="tag title" class="uppercase">tag name</label>
                <input
                  type="name"
                  v-model="fields.name"
                  class="px-3 py-1 rounded bg-gray-200 w-full text-gray-700 border border-gray-300 rounded block appearance-none placeholder-gray-500 focus:outline-none focus:bg-gray-100"
                />
                
              </div>
            </div>
            <div class="flex justify-center mt-10">
              <button
                type="submit"
                class="px-4 py-2 rounded-sm hover:bg-white hover:text-secondary font-bold border-2 border-secondary bg-secondary text-white focus:outline-none"
              >
                create tag
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </dashboard>

</template>

<script>
    import Dashboard from './../../Layouts/dashboard'

    export default {
        components: {
            Dashboard,
        },
        props: ['user','tags' , 'errors'],

        data() {
            return {
                fields:{}
            }
        },

        mounted() {
        },
        methods:{

        submit() {
            this.$inertia
            .post("/dashboard/tags/", this.fields)
            .then((res) => {})
            .catch((err) => {
            console.log(err);
            }); 
        }
         
     }
    }

</script>
