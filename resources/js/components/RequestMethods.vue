<template>
    <div class="mt-10">
        <h6 class="text-lg text-grey-light">Request Method</h6>
        <div class="flex mt-3 overflow-scroll h-scrollable">
            <button 
                v-for="method in methods"
                :key="method"
                class="mx-1 p-2 rounded-lg font-bold focus:outline-none"
                @click="selectMethod(method)"
                :class="[ selectedMethod == method ? 'bg-blue text-white' : 'bg-grey-light text-grey-dark' ]"
            >{{ method.toUpperCase() }}</button>
        </div>
    </div>
</template>

<script>
export default {
    props: ['defaultMethod'],
    data() {
        return {
            methods: [
                'get',
                'post',
                'put',
                'patch',
                'delete',
            ],
            selectedMethod: 'get'
        }
    },
    methods: {
        selectMethod(method) {
            this.selectedMethod = method
            this.$emit('change', method)
        }
    },
    mounted() {
        if(this.defaultMethod) {
            this.selectedMethod = this.defaultMethod
            this.$emit('change', this.selectedMethod)
        }
    }
}
</script>
