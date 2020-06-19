<template>
 <Auth title="SUDTECH . Login">
    <div class="bg-white w-3/12 max-w-lg rounded-lg shadow overflow-hidden mx-auto">
        <div class="py-4 px-6">
            <div class="text-center font-bold text-gray-700 text-3xl">SUD<span class ="text-red-500">TE</span>CH</div>
            <div class="mt-1 mb-10 text-center font-bold text-gray-600 text-xl">Make you'r jobs available</div>
            <form  @submit.prevent="login">
                <div class="mt-4 w-full">
                    <input type="email" name="email" placeholder="Email address" v-model="form.email"
                            class="w-full mt-2 text-sm py-2 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>

                </div>
                <div class="mt-4 w-full">
                    <input type="password" name="password" placeholder="Password" v-model="form.password"
                            class="w-full mt-2 text-sm py-2 px-4 bg-gray-100 text-gray-700 border border-gray-300 rounded  block appearance-none placeholder-gray-500 focus:outline-none focus:bg-white"/>

                </div>
                <div class="flex justify-between items-center mt-6">
                    <a href="#" class="text-gray-600 text-sm hover:text-gray-500">Forget password?</a>
                    <button type="submit"
                            class="py-1 px-4 bg-gray-700 text-sm text-white rounded hover:bg-gray-600 focus:outline-none">
                            Login
                    </button>
                </div>
            </form>
        </div>
        <div class="flex items-center justify-center py-4 bg-gray-100 text-center">
            <h1 class="text-gray-600 text-sm">Don't have an account</h1>
            <inertia-link href="/register" class="text-blue-600 font-bold mx-2 text-sm hover:text-blue-500">Register now</inertia-link>
        </div>
    </div>
  </Auth>
</template>

<script>
import {AtomSpinner} from 'epic-spinners'
import Auth from '../Layout/Auth'
export default {
    components:{
        Auth
    },
    data() {
        return {
            form:{
                email:'',
                password:''
            }

        }
    },

    methods:{
        login(){
            this.$inertia.post('login' , this.form)
              .then(()=>{})
                 .catch((err)=>{console.log(err.getMessage())})
        }
    }
}
</script>
