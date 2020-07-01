<template>
    <div class="bg-white font-roboto font-medium">
        <Header />

        <div>
            <a class="block sm:hidden text-center text-primary text-5xl">
                <inertia-link href="/">sudtech</inertia-link>
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
        methods: {

        }
    }

</script>

