<template>
    <form :method="method" :action="action" id="project-form" @submit.prevent="onSubmit" @keydown="onKeyDown">
        <input type="hidden" name="_token" :value="csrf">
        <input type="hidden" name="_method" :value="hiddenMethod">

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
        props: ['action', 'method', 'hiddenMethod', 'csrf', 'fields', 'submit'],
        components: {
            'form-field': FormField
        },
        data() {
            return {
                form: new Form()
            }
        },
        methods: {
            onSubmit(){
                axios[this.method](this.action, this.form)
                    .then(response => console.log(response.data))
                    .catch(error => this.form.errors.record(error.response.data.errors));
            },
            onKeyDown(event){
                this.form.errors.clear(event.target.name);
            }
        }
    }
</script>
