<template>
    <div>
        <div class="form-group row">
            <label v-show="type !== 'submit'" class="col-sm-2 col-form-label" :for="field" v-text="field"></label>
            <div class="col-sm-10">
                <input v-if="type !== 'textarea' && type !== 'submit'" :type="type" class="form-control" :name="field" :placeholder="field"  @input="update(field, $event.target.value)">
                <textarea v-if="type === 'textarea'" class="form-control" :name="field" :placeholder="field" @input="update(field, $event.target.value)"></textarea>
                <button v-if="type === 'submit'" :type="type" class="btn btn-primary" v-text="submit"></button>
            </div>
        </div>
        <div v-if="type !== 'submit'" class="alert alert-danger" v-show="form.errors.has(field)">{{ form.errors.get(field) }}</div>
    </div>
</template>

<script>
    export default {
        props: ['type', 'field', 'submit', 'form'],
        methods: {
            update(name, value) {
                this.$emit('input', value);
            }
        }
    }
</script>
