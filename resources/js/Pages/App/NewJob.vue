<template>
    <App title="Post job">
       <Form  :tags ='tags' :errors = 'errors' :successMessage = 'successMessage'></Form>
    </App>
</template>

<script>
    import App from './../Layouts/App'
    import Form from '../../components/Form'
    export default {
        components: {
            App,
            Form
        },
        props:['tags','errors','successMessage']
    }

</script>