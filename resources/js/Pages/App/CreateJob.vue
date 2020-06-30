<template>

    <app>
        <div class="container mx-auto px-4 mb-12">
            <div class="sm:w-3/4 mx-auto">
                <div>
                    <div class="mb-4">
                        <label for="job title" class="uppercase">job title</label>
                        <input type="name" class="px-3 py-1 rounded-lg bg-gray-200 w-full">
                        <span class="text-second-gray text-sm">Example: Senior Laravel Developer</span>
                    </div>

                    <div class="mb-4">
                        <label for="job location" class="uppercase">job location</label>
                        <input type="texr" class="px-3 py-1 rounded-lg bg-gray-200 w-full">
                        <span class="text-second-gray text-sm">Example: “Remote”, “Remote, Khartoum Only”,
                            “Khartoum”</span>
                    </div>

                    <div class="mb-4">
                        <label for="tags" class="uppercase">tags</label>
                        <multiselect v-model="value" tag-placeholder="Add this as new tag" class="px-3 py-1 rounded-lg bg-gray-200 w-full"
                        placeholder="Search or add a tag" label="name" track-by="code" :options="options" :multiple="true"
                         @tag="addTag" :max="5"></multiselect>
                        <span class="text-second-gray text-sm">Max of Five Tags</span>
                    </div>

                    <div class="mb-4">
                        <label for="company Name" class="uppercase">company Name</label>
                        <input type="text" class="px-3 py-1 rounded-lg bg-gray-200 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="job description" class="uppercase">job description</label>
                        <ckeditor v-model="job_description" :config="editorConfig"></ckeditor>
                    </div>

                    <div class="mb-4">
                        <label for="job responsibilities" class="uppercase">job responsibilities</label>
                        <span class="text-primary ml-3 text-xs">(optional)</span>
                        <ckeditor v-model="job_responsibilities" :config="editorConfig"></ckeditor>
                    </div>

                    <div class="mb-4">
                        <label for="job requirements" class="uppercase">job requirements</label>
                        <span class="text-primary ml-3 text-xs">(optional)</span>
                        <ckeditor v-model="job_requirements" :config="editorConfig"></ckeditor>
                    </div>

                    <div class="mb-4">
                        <label for="apply url" class="uppercase" :class="{ 'text-gray-300': focusedEmail }">apply url</label>
                        <input type="text" v-model="url" class="px-3 py-1 rounded-lg bg-gray-200 w-full"
                        :class="[focusedEmail ? 'bg-gray-100' : 'bg-gray-200']"
                        @focus="focusUrl" @blur="blurUrl">
                    </div>

                    <span class="flex justify-center text-second-gray text-sm">OR</span>

                    <div class="mb-4">
                        <label for="apply email" class="uppercase" :class="{ 'text-gray-300': focusedUrl }">apply email</label>
                        <input type="text" v-model="email" class="px-3 py-1 rounded-lg bg-gray-200 w-full" :class="[focusedUrl ? 'bg-gray-100' : 'bg-gray-200']"
                        @focus="focusEmail" @blur="blurEmail">
                        <span class="text-sm" :class="[focusedUrl ? 'text-gray-300' : 'text-second-gray']">
                          This email is public, the Apply button links to it if you
                            do not supply an Apply URL above
                        </span>
                    </div>

                    <div class="mb-4">
                        <label for="company Logo" class="uppercase">company Logo</label>
                        <span class="text-primary ml-3 text-xs">(optional)</span>
                        <input type="file" class="px-3 py-1 rounded-lg bg-gray-200 w-full">
                    </div>

                    <div class="mb-4">
                        <div class="block">
                            <label for="color" class="uppercase">color</label>
                            <span class="text-primary ml-3 text-xs">(optional)</span>
                        </div>
                        <input type="checkbox" name="" id="">
                        <input type="color" class="mx-1" name="" id="">
                        <span class="text-second-gray text-sm">Highlight Your Listing in a Custom Color</span>
                    </div>

                </div>
                <div class="flex justify-center mt-10">
                    <button
                        class="px-4 py-2 rounded-sm hover:bg-white hover:text-secondary font-bold border-2 border-secondary bg-secondary text-white focus:outline-none">
                        Post Job
                    </button>
                </div>
            </div>
        </div>
    </app>

</template>

<script>
    import App from './../Layouts/App'
    import Multiselect from 'vue-multiselect'

    export default {
        components: {
            App,
            Multiselect,
        },
        props: {},
        data() {
            return {

                job_description: '',
                job_responsibilities: '',
                job_requirements: '',
                focusedEmail: false,
                focusedUrl: false,
                email:'',
                url:'',
                value: [],
                options: [
                    { name: 'Vue.js', code: 'vu' },
                    { name: 'Javascript', code: 'js' },
                    { name: 'Open Source', code: 'os' }
                ],
                editorConfig: {
                    // The configuration of the editor.
                    toolbar: [
                        ['Bold', 'Italic'],
                        ['Styles', 'Format', 'Font', 'FontSize', 'BulletedList', 'NumberedList', 'InsertTable',
                            'BlockQuote', 'Undo', 'Redo'
                        ],
                    ],
                    height: 120,
                    // toolbar: ['Heading', 'bold', 'italic', 'bulletedList', 'numberedList', 'insertTable', 'blockQuote', 'undo', 'redo' ]
                }
            };
        },
        methods:{
          focusEmail(){
            this.focusedEmail = true
            this.focusedUrl = false
            this.url = ''
          },

          focusUrl(){
            this.focusedUrl = true
            this.focusedEmail = false
            this.email = ''
          },

          blurEmail(){
            // this.focusedEmail = false
            this.focusedUrl = false
          },

          blurUrl(){
            // this.focusedUrl = false
            this.focusedEmail = false
          },

          addTag (newTag) {
            const tag = {
                name: newTag,
                code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
            }
            this.options.push(tag)
            this.value.push(tag)
        }

        },
    }

</script>
