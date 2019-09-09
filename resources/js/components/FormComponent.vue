<template>
    <form :method="method" :action="route" id="project-form" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
        <input type="hidden" name="_token" :value="csrf">
        <input v-if="method" type="hidden" name="_method" :value="method">

        <div v-for="[field,type] in Object.entries(fields)">
            <form-field :type="type" :field="field" v-model="form[field]" :form="form"></form-field>
        </div>

        <button type="submit" class="btn btn-primary">{{ submit }}</button>
    </form>
</template>

<script>
    import Form from "../classes/Form";
    import FormField from "./FormField";

    export default {
        mounted() {
            console.log('mounted form');
        },
        props: ['route', 'method', 'csrf', 'fields', 'submit'],
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
                axios[this.method](this.route, this.form)
                    .then(response => console.log(response.data))
                    .catch(error => this.form.errors.record(error.response.data.errors));
            }
        }
    }
</script>
