<template>

    <dashboard title = "Create job" :user = "user">
      <Form :user='user' :tags = 'tags' title ="Create job" :errors = 'errors'></Form>
  </dashboard>

</template>

<script>
    import Dashboard from './../../Layouts/dashboard'
    import Multiselect from 'vue-multiselect'
    import Form from '../../../components/Form'

    export default {
        components: {
            Dashboard,
            Form,
        },
        props: ['user','tags' , 'errors'],

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
