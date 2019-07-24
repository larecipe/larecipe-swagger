<template>
    <div>
        <h6 class="text-lg text-grey-light">Request URL</h6>
        <div class="appearance-none overflow-hidden mt-3 rounded-lg w-full focus:outline-none">
            <input class="w-full overflow-scroll h-scrollable bg-blue-darkest text-green font-bold px-3 py-2 focus:outline-none" type="text" placeholder="url" v-model="fullUrl">
        </div>
    </div>
</template>

<script>
export default {
    props: ['url'],
    data() {
        return {
            fullUrl: ''
        }
    },
    mounted() {
        this.fullUrl = this.url
    },
    watch: {
        fullUrl(newValue) {
            this.$emit('change', newValue);
        }
    }
}
</script>
