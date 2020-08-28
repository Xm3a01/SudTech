<template>
<div>
    <header class="bg-dark bg-auto bg-cover" style="">
        <nav>
           <div class="px-20 py-6 flex justify-between items-center">
                <div>
                    <a class="hidden sm:block text-white text-2xl font-bold">
                        <inertia-link href="/">SUD<span class="text-red-500" >TE</span>CH</inertia-link>
                    </a>
                </div>
                <div :class="postJobBtn == false ? 'w-33  px-12 py-2' : ''">
                    <inertia-link href="/job/create" v-if="postJobBtn"
                        class="px-6 py-2 border rounded border-gray-200 text-white font-bold text-sm  hover:text-primary focus:outline-none">
                        Post a Job
                         <span  class="ml-2 text-red-200  hover:text-red-400" @click.prevent="postJobBtn = false">x</span>
                    </inertia-link>
                </div>
            </div>
        </nav>
        <div v-if="title  != 'Post job'" class="block sm:block text-center border-b-4 border-primary pb-24 pt-48  bg-dark bg-cover"  style="">
            <div class="px-20 text-white text-3xl flex justify-start">
               <span class="border-b border-white">SUD<span class="text-red-500">TE</span>CH job board</span>
            </div>
            <div class="px-20 xs:hidden  text-white text-2xl flex  justify-start">
                sudtech job board connecting the best jobs with top talent
            </div>
            <div class="px-20 box md:hidden  text-white text-sm flex  justify-start">
                <p> sudtech job board connecting the best jobs with top talent</p>
                sudtech job board connecting the best jobs with top talent
                
            </div>
      </div>
    </header>
</div>
</template>

<script>

    export default {
        props:['title'],
        data(){
            return {
                postJobBtn: true
            }
        }
    }

</script>

<style>

</style>
