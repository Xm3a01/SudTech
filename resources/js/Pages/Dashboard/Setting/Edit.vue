<template>

    <dashboard title = "Edit . User" :user = "user">
    <div v-if="successMessage" class="bg-green-400 text-center font-bold mb-2 z-48 text-gray-900 py-2 rounded">
       <div class="flex justify-between"><span class="px-4">{{successMessage}} </span> <span class="px-4 font-normal hover:mouse-pointer" @click="dismis">x</span></div>
     </div>
      <div class="mt-20 max-w-lg mx-auto">
          <div class="mt-1  text-center font-bold text-gray-600 text-xl">Account setting</div>
            <div class="py-4 px-6">
                <form @submit.prevent="updateUser(user.id)">

                    <div class="mt-4 w-full">
                        <input type="text" name="name" placeholder="Full name" v-model="form.name"
                              class="w-full mt-2 text-sm py-2 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                            <div v-if="Object.keys(errors).length > 0 && errors.name" class="text-red-400 text-sm mt-1">
                               {{ errors[Object.keys(errors)[0]][0] }}
                      </div>
                    </div>
                    <div class="mt-4 w-full">
                        <input type="email" name="email" placeholder="Email address" v-model="form.email"
                               class="w-full mt-2 text-sm py-2 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                        <div v-if="Object.keys(errors).length > 0 && errors.email" class="text-red-400 text-sm mt-1">
                               {{ errors[Object.keys(errors)[1]][0] ? errors[Object.keys(errors)[1]][0] : errors.email }}
                      </div>
                    </div>
                    <div class="mt-4 w-full">
                        <div class="flex" v-if="!changePassord">
                        <input disabled type="password" name="password" placeholder="Password" value="********" 
                               class="w-full bg-gray-300 mt-2 text-sm py-2 px-4  text-gray-700 border border-gray-300 rounded-l  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                        <a href = "" @click.prevent ="changePassord = true"  class="text-xs text-blue-300 mt-2 h-10 bg-gray-300 px-1 rounded-r pt-2"> Change </a>
                        </div>
                         <input v-if="changePassord" type="password" name="password" placeholder="New password" v-model="form.password"
                               class="w-full mt-2 text-sm py-2 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                    </div>  
                    <div class="flex justify-between items-center mt-6">
                        <a :href="'/dashboard/users/'+user.id" class="text-gray-600 text-sm hover:text-gray-500"></a>

                        <button type="submit" @click="loading = true"
                                class="py-1 text-sm px-4 bg-gray-700 text-white rounded hover:bg-gray-600 focus:outline-none">
                                  Save Change
                        </button>
                    </div>
                </form>
            </div>
        </div>
  </dashboard>

</template>

<script>
    import Dashboard from './../../Layouts/dashboard'
    import Multiselect from 'vue-multiselect'

    export default {
        components: {
            Dashboard,
        },
        props: ['user','tags' , 'errors','successMessage'],

        data() {
            return{
                form: this.user,
                changePassord: false,
                loading: true
            }
        },

        mounted(){
            console.log('/dashboard/users/' + this.user.id)
        },

        methods:{
            updateUser(id) {
                console.log(id)
                this.$inertia.post('/dashboard/editUser/'+id,this.form)
                  .then((res)=>{

                  })
            },

            dismis(){
                this.successMessage = ''
            }
        }
    }

</script>
