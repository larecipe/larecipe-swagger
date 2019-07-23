<template>
    <div class="mt-10">
        <div class="flex justify-between">
            <h6 class="text-lg text-grey-light">Params</h6>
            <button @click="addNewParam" class="w-6 h-6 bg-blue text-sm rounded-full flex items-center justify-center text-white focus:outline-none">
                <i class="fa fa-plus"></i>
            </button>
        </div>

        <div class="mt-3" v-for="(param, index) in params" :key="index">
            <div class="bg-blue-darkest appearance-none font-bold rounded-lg w-full text-grey-dark leading-tight flex">
                <div class="w-1/2 overflow-hidden border-r-2 border-blue-dark">
                    <input class="bg-transparent text-grey-dark px-3 py-2 focus:outline-none" type="text" placeholder="name" v-model="params[index].key">
                </div>
                <div class="w-1/2 overflow-hidden">
                    <input class="bg-transparent text-grey-dark px-3 py-2 focus:outline-none" :type="getParamInputType(param)" placeholder="value" v-model="params[index].value">
                </div>
            </div>
        </div>

        <div v-if="! params.length" class="mt-3">
            <div class="bg-blue-darkest appearance-none p-2 font-bold rounded-lg w-full text-grey-dark leading-tight flex">
                No Params Attached
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['defaultParams'],
    data() {
        return {
            params: []
        }
    },
    watch: {
        params: {
            handler(val){
                this.$emit('change', this.prepareParams());
            },
            deep: true
        }
    },
    methods: {
        addNewParam() {
            this.params.push({key: '', value: ''})
        },
        prepareParams() {
            let params = {};

            this.params.forEach(param => {
                params[param.key] = param.value
            });

            return params;
        },
        getParamInputType(param) {
            return param.key == "password" ? "password" : "text";
        }
    },
    created() {
        if(this.defaultParams) {
            this.params = Object.entries(this.defaultParams).map(param => {
                return {
                    key: param[0],
                    value: param[1],
                }
            })
            this.$emit('change', this.prepareParams());
        }
    }
}
</script>