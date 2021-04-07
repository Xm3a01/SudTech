<template>
     <Auth title="SUDAJOB . Register">
        <div class="bg-white w-3/12 max-w-lg rounded-lg shadow overflow-hidden mx-auto">
            <div class="py-4 px-6">
                <div class="text-center font-bold text-gray-700 text-3xl">S<span class ="text-blue-300">UD</span>AJOB</div>
                <div class="mt-1 text-center font-bold text-gray-600 text-xl">To get best developers</div>
                <div class="mt-1 text-center text-gray-600">Create new account</div>
                <form @submit.prevent="register">

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
                        <input type="password" name="password" placeholder="Password" v-model="form.password"
                               class="w-full mt-2 text-sm py-2 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                         <div v-if="Object.keys(errors).length > 0 && errors.password" class="text-red-400 text-sm mt-1">
                               {{ errors[Object.keys(errors)[2]] ? errors[Object.keys(errors)[2]] : errors.password }}
                      </div>
                    </div>
                    <div class="mt-4 w-full">
                        <input type="password" name="password_confirmation" placeholder="Password confirmation" v-model="form.password_confirmation"
                               class="w-full mt-2 text-sm py-2 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>
                    </div>
                    <div class="flex justify-between items-center mt-6">
                        <a href="#" class="text-gray-600 text-sm hover:text-gray-500">Forget password?</a>
                        <button type="submit"
                                class="py-1 text-sm px-4 bg-gray-700 text-white rounded hover:bg-gray-600 focus:outline-none">
                           <span class="lds-dual-ring mr-1 mt-1" v-if="loading"></span> Register
                        </button>
                    </div>
                </form>
            </div>
            <div class="flex items-center justify-center py-4 bg-gray-100 text-center">
                <h1 class="text-gray-600 text-sm">Already have account?</h1>
                <inertia-link href="/login" class="text-blue-600 font-bold mx-2 text-sm hover:text-blue-500">Login</inertia-link>
            </div>
        </div>
     </Auth>
</template>

<script>
import Auth from '../Layouts/Auth'
export default {
    components:{
        Auth
    },
    props:['errors'],
   data(){
    return{
        loading: false,
        form:{
            name:'',
            email:'',
            password:'',
            password_confirmation:''
        }

        }
    },
    methods:{
        register() {
            this.loading = true;
            this.$inertia.post('register', this.form)
              .then(()=>{this.loading = false})
                .catch((err)=>{console.log(err.getMessage())})
        }
    }
}
</script>

<style>
  .lds-dual-ring {
  display: inline-block;
  width: 15px;
  height: 15px;
}
.lds-dual-ring:after {
  content: "";
  display: block;
  width: 15px;
  height: 15px;
  border-radius: 50%;
  border: 2px solid #fff;
  border-color: #fff transparent #fff transparent;
  animation: lds-dual-ring 1.2s linear infinite;
}
@keyframes lds-dual-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
