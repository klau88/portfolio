<template>
    <section>
        <div class="row" v-for="item in collection">
            <div class="col-8">
                <h3 v-text="item.title"></h3>
                <p v-text="item.description"></p>
                <slot name="other"></slot>
            </div>
            <div v-show="item.images" class="col-4">
                <div v-for="image in item.images">
                    <img width="100%" :src="`/images/${image.name}`"/>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        mounted(){
            console.log('modal');
        },
        props: ['collection'],
        data() {
            return {

            }
        },
        methods: {

        }
    }
</script>
