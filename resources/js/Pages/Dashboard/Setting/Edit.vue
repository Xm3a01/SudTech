<template>

    <dashboard title = "Setting" :user = "user">
    <div v-if="successMessage">
       {{message(successMessage)}}
     </div>
      <div class="mt-20 max-w-lg mx-auto">
          <div class="mt-1  text-center font-bold text-gray-600 text-xl">Account setting</div>
            <div class="py-4 px-6">
                <form @submit.prevent="updateUser(user.id)">
                    <div class="flex flex-col">
                        <div class="flex justify-center">
                          <div class ="h-40 w-40 overflow-hidden px-auto bg-gray-600  rounded-full border-4 border-gray-600">
                              <img class="h-32 w-40" :src="imageData ? imageData : user.avatar ? user.avatar:'/images/user.png'" alt="">
                              <label for="avatar" class="text-xs h-2 w-2 px-20 text-center rounded-full pr-2 bg-gray-400 text-gray-500 cursor-pointer">Edit</label>
                              <input type="file" name="avatar" id="avatar" @input="onSelectFile" hidden>
                          </div>
                        </div>
                    <div>

                    <div class="mt-4 w-full">
                        <input type="text" name="name" placeholder="Full name" v-model="form.name"
                              class="w-full mt-2 text-sm py-2 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                            <div v-if="Object.keys(errors).length > 0 && errors.name" class="text-red-400 text-sm mt-1">
                               {{ errors[Object.keys(errors)[0]] }}
                      </div>
                    </div>
                    <div class="mt-4 w-full">
                        <input type="email" name="email" placeholder="Email address" v-model="form.email"
                               class="w-full mt-2 text-sm py-2 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                        <div v-if="Object.keys(errors).length > 0 && errors.email" class="text-red-400 text-sm mt-1">
                               {{ errors[Object.keys(errors)[1]] ? errors[Object.keys(errors)[1]] : errors.email }}
                      </div>
                    </div>
                    <div class="mt-4 w-full">
                        <div class="flex" v-if="!changePassord">
                        <input disabled :type="type" name="password" placeholder="Password" :value="form.user_password" 
                               class="w-full bg-gray-300 mt-2 text-sm py-2 px-4 select-none text-gray-700 border border-gray-300 rounded-l  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                        <div class="flex divide-x divide-gray-400">
                          <a href = "" @click.prevent ="changePassord = true"  class="text-xs text-blue-300 mt-2 h-10 bg-gray-300 px-1  pt-2"> Change </a>
                          <a href = "" @click.prevent ="showPassword(type)"  class="text-xs text-blue-300 mt-2 h-10 bg-gray-300 px-1  pt-2"> {{lable}} </a>
                          <a href = ""  v-if="type == 'text'"
                            v-clipboard:copy="this.type == 'password' ? '**********':form.user_password"
                            v-clipboard:success="onCopy"
                            v-clipboard:error="onError"
                            class="text-xs text-blue-300 mt-2 h-10 bg-gray-300 px-1 rounded-r pt-2"> Copy </a>
                        </div>
                        </div>
                         <input v-if="changePassord" type="password" name="password" placeholder="New password" v-model="form.password"
                               class="w-full mt-2 text-sm py-2 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                    </div>  
                    <div class="flex justify-between items-center mt-6">
                        <a :href="'/dashboard/users/'+user.id" class="text-gray-600 text-sm hover:text-gray-500"></a>
                    </div>
                        <button type="submit" @click="loading = true"
                                class="py-1 text-sm px-4 bg-gray-700 text-white rounded hover:bg-gray-600 focus:outline-none">
                                  Save Change
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
                loading: true,
                type:'password',
                lable: 'Show',
                imageData:'',
                avatar:''
            }
        },

        mounted(){
            console.log('/dashboard/users/' + this.user.id)
        },

        methods:{
            updateUser(id) {
                const formData = new FormData();
                formData.append('avatar', this.avatar);

                _.each(this.form, (value, key) => {
                    formData.append(key, value)
                })
                this.$inertia.post('/dashboard/editUser/'+id,formData)
                  .then((res)=>{
                      this.changePassord = false
                  })
            },

            onCopy: function (e) {
             event.preventDefault();
             swal({ 
                title: "You just copied",
                text: this.type == 'password' ? '**********':e.text,
                icon: "success",
             })
            },
            onError: function (e) {
             event.preventDefault();
             alert('Failed to copy texts')
            },

            dismis(){
                this.successMessage = ''
            },
            showPassword(type) {
                if(type == 'password') {
                    this.type = 'text'
                    this.lable = 'Hide'
                } else {
                    this.type = 'password'
                    this.lable = 'Show' 
                }
            },
            onchange(e){
                let file = e.target.files[0]
                // console.log(file)
            },

           onSelectFile (e) {
                let file = e.target.files[0]
                if (file) {
                    const reader = new FileReader
                    reader.onload = e => {
                    this.imageData = e.target.result
                }
             reader.readAsDataURL(file)
             this.avatar = file
           }
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
