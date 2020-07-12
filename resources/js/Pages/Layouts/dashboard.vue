<template>
 <div class="flex flex-col md:flex-row">

    <!-- Start side bar -->
    <aside class="w-full md:w-64 bg-gray-800 md:min-h-screen">
        <div class="flex items-center justify-between bg-gray-900 p-4 h-16">
            <a href="/dashboard" class="flex items-center">
                <div></div>
                <span class="text-gray-300 text-xl  font-semibold mx-2">SUD<span class="text-red-500">TE</span>CH</span>
            </a>
            <div class="flex md:hidden">
                <button type="button" @click="isOpen = !isOpen"
                        class="text-gray-300 hover:text-gray-500 focus:outline-none focus:text-gray-500">
                    <svg class="fill-current w-8" fill="none" stroke-linecap="round" stroke-linejoin="round"
                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="px-2 py-6 md:block" :class="isOpen? 'block': 'hidden'">
            <ul>
                <li class="px-2 py-2 text-sm  " :class="title == 'SUDTECH' ? 'bg-gray-900 border-l-2 border-blue-300' : 'hover:bg-gray-900'">
                    <inertia-link href ="/dashboard"  @click="loading= true" class="flex items-center">
                        <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round"
                             stroke-linejoin="round"
                             stroke-width="2"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span class="mx-2 text-gray-300"> Home</span>
                    </inertia-link>
                </li>
                <li class="px-2 py-2 text-sm w-full mt-2" :class="title == 'Dashboard . Jobs' || title == 'Create job' || title == 'Edit job' ? 'bg-gray-900 border-l-2 border-blue-300' : 'hover:bg-gray-900'">
                    <inertia-link href="/dashboard/jobs"  @click="loading= true" class="flex items-center">
                        <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round"
                             stroke-linejoin="round"
                             stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="mx-2 text-gray-300">Jobs</span>
                    </inertia-link>
                </li>
                <li class="px-2 py-2 text-sm  hover:bg-gray-900 mt-2" :class="title == 'Dashboard . Trash' ? 'bg-gray-900 border-l-2 border-blue-300': ''">
                    <inertia-link href="/dashboard/trash" class="flex items-center" @click="loading= true">
                        <svg class="w-6 text-gray-500" fill="none" stroke-linecap="round"
                             stroke-linejoin="round"
                             stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                        </svg>
                        <span class="mx-2 text-gray-300">Trash</span>
                    </inertia-link>
                </li>
            </ul>
            <div class="border-t border-gray-700 -mx-2 mt-2 md:hidden"></div>
            <ul class="mt-6 md:hidden">
                <li class="px-2 py-2 text-sm  hover:bg-gray-900 rounded mt-2">
                    <a href="#" class="mx-2 text-gray-300">Account Settings</a>
                </li>
                <li class="px-2 py-2 text-sm  hover:bg-gray-900 rounded mt-2">
                    <button class="mx-2 text-gray-300" @click="logout">Logout</button>
                </li>
            </ul>
        </div>
    </aside>
    <!-- End side bar -->

      <div class="w-full md:flex-1">
           <nav class="hidden md:flex justify-between items-center bg-gray-900 p-4 shadow-md h-16">
               <div><span class="lds-dual-ring mr-1 mt-1" v-if="loading"></span></div>
               <div class="image-text py-auto border-2 border-red-500 hover:bg-red-500" @click ="settingPanel">
                   <small>30x30</small>
               </div>
            </nav>
               <div class="absolute right-0 mt-1 z-40 " v-if="account">
                 <div class="bg-gray-700 p-5 mr-5 rounded transition duration-500 ease-in-out">
                   <div class="text-center">
                    <div class="flex px-3 my-3 justify-center">
                      <div class="image-text py-auto border-2 hover:bg-blue-200" @click ="settingPanel">
                        <small>30x30</small>
                     </div>
                     </div>
                    <a href="" class ="hover:text-gray-500">
                    <div class="flex px-3 mt-1">
                     <!-- <svg fill="currentColor" class="text-gray-400 h-5 mr-1" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg> -->
                      <h2 class="text-sm text-bold text-gray-400"> <small>{{user.name}}</small></h2>
                    </div>
                    <div class="flex px-3 -mt-1 mb-2 divide-y  divide-gray-200">
                      <h2 class="text-sm mt text-gray-400">{{user.email}}</h2>
                    </div>
                    </a>
                    <div class="h-px w-full bg-gray-300"></div>
                   <inertia-link :href="'/dashboard/users/'+user.id+'/edit'" class ="hover:text-gray-500">
                    <div class="flex px-3 my-2">
                     <svg fill="currentColor" class="text-gray-400 h-5 mr-2" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                     <h2 class="text-sm text-gray-400">Setting</h2>
                    </div>
                    </inertia-link>
                    <a href="/logout">
                      <div class="flex px-3">
                        <svg fill="currentColor" class="text-red-500 h-5 mr-2" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                       <div class="text-red-500 text-sm">Logout</div>
                    </div>
                    </a>
                    <div class="border-t border-gray-500 -mx-2 mt-2 md:hidden"></div>
                   </div>
                  </div>
               </div>
              <main>
                <div class="px-8 py-6">
                   <slot />
               </div>
         </main>
     </div>
 </div>
</template>

<script>
  export default {
    props:['title','user'],
    data() {
        return{
            isOpen:false,
            account:false,
            loading:false
        }
    },

    methods:{
          logout() {
              this.$inertia.post('logout')
                .then(()=>{location = '/login'})
                  .catch((err)=>{console.log(err.getMessage())})
          },
          settingPanel(){
              if(this.account){
              this.account = false
              } else {
                  this.account = true
              }
          }
      },
    watch: {
      title: {
        immediate: true,
        handler(title) {
          document.title = title
        },
      },
    },
  }
</script>

<style>
.image-text {
    height: 30px;
    width: 30px;
    background: #ccc;
    border: none;
    border-radius: 50%;
    color: rgb(78, 72, 72);
    font-size: 9px;
    text-align: center;
}
.lds-dual-ring {
  display: inline-block;
  width: 30px;
  height: 30px;
}
.lds-dual-ring:after {
  content: "";
  display: block;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  border: 2px solid rgb(59, 110, 175);
  border-color: rgb(48, 130, 207) transparent rgb(40, 71, 173) transparent;
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
