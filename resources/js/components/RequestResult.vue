<template>
    <div class="h-full relative overflow-hidden">
        <div class="flex items-center">
            <h6 class="text-grey-darkest text-xl font-bold">Result</h6>
            <span v-if="status" 
                class="rounded-lg font-bold text-white ml-2 px-1 py-1"
                :class=statusColor>{{ status }}</span>
            <span v-else
                class="bg-grey rounded-lg font-bold text-white ml-2 px-1 py-1">Ready</span>
        </div>

        <div class="border-l-2 border-t-2 bg-grey-lightest rounded p-4 mt-4 overflow-scroll" :style="{'height': height + 'px'}" id="request-result">
            <pre>
{{ formatedData }}
            </pre>
        </div>
    </div>
</template>

<script>
export default {
    props: ['response', 'height'],
    computed: {
        formatedData() {
            const { data } = this.response;

            return JSON.stringify(data, undefined, 2)
        },
        status() {
            const { status } = this.response;

            return status
        },
        statusColor() {
            const colors = {2: 'success', 3: 'warning', 4: 'danger', 5: 'danger'}
            const statusStarting = Number(String(this.status).charAt(0));

            return 'bg-' + colors[statusStarting];
        }
    }
}
</script>

<style lang="scss">
#request-result {
    &::-webkit-scrollbar {
        width: 3px;
        height: 3px;
    }

    /* Track */
    &::-webkit-scrollbar-track {
        background: #dae1e7; 
        border-radius: 5px;
        overflow: hidden;
    }

    /* Handle */
    &::-webkit-scrollbar-thumb {
        background: #305e8a;
        border-radius: 5px;
    }

    /* Handle on hover */
    &::-webkit-scrollbar-thumb:hover {
        background: #0e2336;
    }
}
</style>
