<template>

    <dashboard title = "Create job" :user = "user">
      <Form :user='user' :users = "users" :tags = 'tags' title ="Create job" :errors = 'errors'></Form>
  </dashboard>

</template>

<script>
    import Dashboard from '../../../Layouts/dashboard.vue'
    import Multiselect from 'vue-multiselect'
    import Form from '../../../../components/Form.vue'

    export default {
        components: {
            Dashboard,
            Form,
        },
        props: ['user','tags' , 'errors' , 'users'],

        data() {
            return {

            }
        },

        mounted() {
        },
        methods:{

     }
    }

</script>
