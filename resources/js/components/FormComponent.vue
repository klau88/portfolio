<template>
    <div>
        <form method="post" :action="route" id="project-form" @submit.prevent="onSubmit" @keydown="errors.clear($event.target.name)">
            <h1>{{ title }}</h1>

            <hr>

            <input type="hidden" name="_token" :value="csrf">
            <input v-if="method" type="hidden" name="_method" :value="method">

            <form-field type="text" field="name" v-model="form.name" :form="form"></form-field>

            <form-field type="email" field="email" v-model="form.email" :form="form"></form-field>

            <form-field type="textarea" field="message" v-model="form.message" :form="form"></form-field>

            <form-field type="submit" field="button" :submit="submit"></form-field>

        </form>
    </div>
</template>

<script>
    import Form from "../classes/Form";
    import FormField from "./FormField";

    export default {
        mounted() {
            console.log('mounted form');
        },
        props: ['route', 'title', 'method', 'csrf', 'fields', 'submit'],
        components: {
            'form-field': FormField
        },
        data() {
            return {
                disabled: false,
                form: new Form()
            }
        },
        methods: {
            onSubmit(){
                axios.post(this.route, this.form)
                    .then(response => console.log(response.data))
                    .catch(error => this.form.errors.record(error.response.data.errors));
            }
        }
    }
</script>
