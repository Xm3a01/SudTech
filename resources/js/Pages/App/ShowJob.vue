<template>

    <app title="SUDTECH">
        <div class="container mx-auto px-4 mb-12">
            <div class="sm:w-3/4 mx-auto">
                <div>

                    <div class="mb-4 mt-10">
                        <p class="font-medium" v-html="job.job_description">
                            <!-- {{ | striphtml}} -->
                        </p>
                    </div>

                    <div v-show="job.job_responspilty" class="mb-4">
                        <h1 class="uppercase text-3xl">job responsibilities</h1>
                        <p class="" >
                            <div v-html="job.job_responspilty"></div>
                            <!-- {{job.job_responspilty | striphtml}} -->
                        </p>
                    </div>

                    <div v-show="job.job_requirements != null" class="mb-4">
                        <h1 class="uppercase text-3xl">job requirements</h1>
                        <p >
                            <div v-html="job.job_requirements"></div>
                            <!-- {{job.job_requirements | striphtml}} -->
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
