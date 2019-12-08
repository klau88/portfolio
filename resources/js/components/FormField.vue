<template>
    <div>
        <div class="form-group row">
            <label v-show="type !== 'submit'" class="col-sm-2 col-form-label" :for="field" v-text="field"></label>
            <div class="col-sm-10">
                <input v-if="type !== 'textarea'" :type="type" class="form-control" :name="field" :placeholder="field" @input="update(field, $event.target.value)">
                <textarea v-if="type === 'textarea'" class="form-control" :name="field" :placeholder="field" @input="update(field, $event.target.value)"></textarea>
            </div>
        </div>
        <div class="alert alert-danger" v-if="form.errors.has(field)">{{ form.errors.get(field) }}</div>
    </div>
</template>

<script>
    export default {
        props: ['type', 'field', 'form'],
        methods: {
            update(name, value) {
                this.$emit('input', value);
            }
        }
    }
</script>

<style>
    label, input, textarea {
        text-transform: capitalize;
    }
</style>
