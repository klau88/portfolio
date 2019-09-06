<template>
    <div>
        <form method="post" :action="route" id="project-form" @submit.prevent="onSubmit" @keydown="errors.clear($event.target.name)">
            <h1>{{ title }}</h1>

            <hr>

            <input type="hidden" name="_token" :value="csrf">
            <input v-if="method" type="hidden" name="_method" :value="method">

            <form-field type="text" field="name" v-model="form.name"></form-field>
            <div class="alert alert-danger" v-show="form.errors.has('name')">{{ form.errors.get('name') }}</div>

            <form-field type="email" field="email" v-model="form.email" :errors="errors"></form-field>
            <div class="alert alert-danger" v-show="form.errors.has('email')">{{ form.errors.get('email') }}</div>

            <form-field type="textarea" field="message" v-model="form.message" :errors="errors"></form-field>
            <div class="alert alert-danger" v-show="form.errors.has('message')">{{ form.errors.get('message') }}</div>

            <form-field type="submit" field="button" :submit="submit"></form-field>

        </form>
    </div>
</template>

<script>
    import Errors from "../classes/Errors";
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
                errors: new Errors(),
                form: new Form()
            }
        },
        methods: {
            onSubmit(){
                axios.post(this.route, this.form)
                    .then(response => console.log(response.data))
                    .catch(error => {
                        this.form.errors.record(error.response.data.errors)
                    });
            }
        }
    }
</script>
