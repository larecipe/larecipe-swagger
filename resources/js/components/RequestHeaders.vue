<template>
    <div class="mt-10">
        <div class="flex justify-between">
            <h6 class="text-lg text-grey-light">Request Headers</h6>
            <button @click="addNewHeader" class="w-6 h-6 bg-blue text-sm rounded-full flex items-center justify-center text-white focus:outline-none">
                <i class="fa fa-plus"></i>
            </button>
        </div>

        <div class="mt-3" v-for="(header, index) in headers" :key="index">
            <div class="bg-blue-darkest appearance-none font-bold rounded-lg w-full text-grey-dark leading-tight flex">
                <div class="w-1/2 overflow-hidden border-r-2 border-blue-dark">
                    <input class="bg-transparent text-grey-dark px-3 py-2 focus:outline-none" type="text" placeholder="key" v-model="headers[index].key">
                </div>
                <div class="w-1/2 overflow-hidden">
                    <input class="bg-transparent text-grey-dark px-3 py-2 focus:outline-none" type="text" placeholder="value" v-model="headers[index].value">
                </div>
            </div>
        </div>

        <div v-if="! headers.length" class="mt-3">
            <div class="bg-blue-darkest appearance-none p-2 font-bold rounded-lg w-full text-grey-dark leading-tight flex">
                No Headers Attached
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['defaultHeaders'],
    data() {
        return {
            headers: [
                {
                    key: 'Content-Type',
                    value: 'application/json'
                }
            ]
        }
    },
    watch: {
        headers: {
            handler(val){
                this.$emit('change', this.prepareHeader());
            },
            deep: true
        }
    },
    methods: {
        addNewHeader() {
            this.headers.push({key: '', value: ''})
        },
        prepareHeader() {
            let headers = {};

            this.headers.forEach(header => {
                headers[header.key] = header.value
            });

            return headers;
        }
    },
    mounted() {
        if(this.defaultHeaders) {
            this.headers = Object.entries(this.defaultHeaders).map(header => {
                return {
                    key: header[0],
                    value: header[1],
                }
            })
            this.$emit('change', this.prepareHeader());
        }
    }
}
</script>
