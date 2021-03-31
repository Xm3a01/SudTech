<template>

    <app title="SUDTECH">
        <template v-slot:header>
            <nav>
           <div class="px-20 py-6 flex justify-between items-center">
                <div>
                    <a class="hidden sm:block text-white text-2xl font-bold">
                        <inertia-link href="/">SUD<span class="text-red-500" >A</span>JOB</inertia-link>
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
        </template>
        <div class="container mx-auto px-4 mb-12">
            <div class="sm:w-3/4 mx-auto">
                <div>

                    <div class="mb-4 mt-10">
                        <p class="font-medium">
                            {{job.job_description | striphtml}}
                        </p>
                    </div>

                    <div v-show="job.job_responspilty" class="mb-4">
                        <h1 class="uppercase text-3xl">job responsibilities</h1>
                        <p class="font-medium">
                            {{job.job_responspilty | striphtml}}
                        </p>
                    </div>

                    <div v-show="job.job_requirements != null" class="mb-4">
                        <h1 class="uppercase text-3xl">job requirements</h1>
                        <p class="font-medium">
                            {{job.job_requirements | striphtml}}
                        </p>
                    </div>

                </div>
                <div class="flex justify-center mt-10">
                    <a v-show="job.apply_url != null" :href="job.apply_url" target="_blank"
                        class="px-4 py-2 rounded-sm hover:bg-white hover:text-secondary font-bold border-2 border-secondary bg-secondary text-white focus:outline-none">
                        Apply
                    </a>
                    <a v-show="job.apply_email != 'null'"  :href="'mailto:'+job.apply_email" target="_blank"
                        class="px-4 py-2 rounded-sm hover:bg-white hover:text-secondary font-bold border-2 border-secondary bg-secondary text-white focus:outline-none">
                        Apply
                    </a>
                </div>
            </div>
        </div>

    </app>

</template>

<script>
    import App from './../Layouts/App'
    export default {
        components: {
            App,
        },
        props: ['job'],
    }

</script>
