<template>
<div>
    <header class="bg-dark">
        <nav>
           <div class="px-20 py-6 flex justify-between items-center">
                <!--<div class="flex divide-x divide-gray-400 border p-1 rounded">
                    <div class="px-2 z-10 ">
                        <a href="" >
                            <svg class="fill-current h-5 w-5 text-blue-500" width="12" height="20" viewBox="0 0 12 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.19765 19.5H7.19765V11.4901H10.8018L11.1976 7.50977H7.19765V5.5C7.19765 4.94772 7.64536 4.5 8.19765 4.5H11.1976V0.5H8.19765C5.43622 0.5 3.19765 2.73858 3.19765 5.5V7.50977H1.19765L0.801758 11.4901H3.19765V19.5Z" />
                            </svg>
                        </a>
                    </div>
                    <div class="px-2 z-10 ">
                        <a href="#">
                            <svg class="fill-current h-5 w-5 text-gray-500" xmlns='http://www.w3.org/2000/svg' width='512'
                                height='512' viewBox='0 0 512 512'>
                                <title>ionicons-v5_logos</title>
                                <path
                                    d='M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z' />
                            </svg>
                        </a>
                    </div>
                    <div>
                        <inertia-link class=" z-10 rounded-sm px-2  font-medium text-blue-600 focus:outline-none" href="/login">Join</inertia-link>
                    </div>
                </div> -->
                <div>
                    <a class="hidden sm:block text-white text-2xl font-bold">
                        <inertia-link href="/">SUD<span class="text-red-500" >TE</span>CH</inertia-link>
                    </a>
                </div>
                <div :class="postJobBtn == false ? 'w-33  px-12 py-2' : ''">
                    <inertia-link href="/dashboard/jobs/create" v-if="postJobBtn"
                        class="px-6 py-2 border rounded border-gray-200 text-white font-bold text-sm  hover:text-primary focus:outline-none">
                        Post a Job
                         <span  class="ml-2 text-red-200  hover:text-red-400" @click.prevent="postJobBtn = false">x</span>
                    </inertia-link>
                </div>
            </div>
        </nav>
    </header>
        <div class="block text-center border-b-4 border-primary pb-24 pt-48  bg-dark">
            <div class="px-20 text-white text-3xl flex justify-start">
               <span class="border-b border-white">SUD<span class="text-red-500">TE</span>CH job board</span>
            </div>
            <div class="px-20  text-white text-2xl flex  justify-start">
                sudtech job board connecting the best jobs with top talent
            </div>
            <div class="px-20 box  text-white text-sm flex  justify-start">
                <p> sudtech job board connecting the best jobs with top talent</p>
                sudtech job board connecting the best jobs with top talent
                
            </div>
      </div>
</div>
</template>

<script>

    export default {
        data(){
            return {
                postJobBtn: true
            }
        }
    }

</script>

<style>

</style>
