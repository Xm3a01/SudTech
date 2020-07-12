<template>
    <div class="bg-gray-200 font-roboto font-medium">
        <Header />

        <div>
            <a class="block sm:hidden bg-dark  text-center text-primary text-5xl">
                <inertia-link href="/">SUD<span class="text-red-500">TE</span>CH</inertia-link>
                <!-- <inertia-link class="btn btn-primary" :href="$route('lead.view', {lead: lead})">
                    Edit
                </inertia-link> -->
            </a>
        </div>

        <slot />

        <Footer />
    </div>
</template>

<script>
import Header from './../App/Header';
import Footer from './../App/Footer';
    export default {
        components: {
            Header,
            Footer,
        },
        props:['title'],
        watch: {
         title: {
            immediate: true,
            handler(title) {
            document.title = title
            },
          },
        },
        methods: {

        }
    }

</script>

