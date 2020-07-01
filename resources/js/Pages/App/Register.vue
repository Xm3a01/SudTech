<template>

    <app>
        <div>

            <div class="block text-center pb-8 border-b border-light-gray">
                <div class="text-third text-6xl">
                    sudtech job board
                </div>
                <div class="px-1 text-second-gray text-2xl">
                    sudtech job board connecting the best jobs with top talent
                </div>
            </div>

            <div class="container mx-auto px-4 mb-12">
                <div class="py-10 text-2xl text-center font-bold">
                    Register
                </div>
                <div class="sm:w-1/3 mx-auto">
                    <div>
                        <label for="Name">Name</label>
                        <input type="name" class="px-3 py-1 mb-4 rounded-lg bg-gray-200 w-full">
                        <label for="Email">E-Mail Address</label>
                        <input type="email" class="px-3 py-1 mb-4 rounded-lg bg-gray-200 w-full">
                        <label for="Password">Password</label>
                        <input type="password" class="px-3 py-1 mb-4 rounded-lg bg-gray-200 w-full">
                    </div>

                    <div class="flex">
                        <button
                            class="px-4 py-2 rounded-sm hover:bg-white hover:text-secondary font-bold border-2 border-secondary bg-secondary text-white focus:outline-none">Register</button>
                    </div>

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
    }

</script>
