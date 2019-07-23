<template>
    <div class="h-full relative overflow-hidden">
        <h6 class="text-grey-darkest text-xl font-bold">Result</h6>
        <div class="border-l-2 border-t-2 bg-grey-lightest rounded p-4 mt-4 overflow-scroll" :style="{'height': height + 'px'}" id="request-result">
            <pre>
{{ formatedData }}
            </pre>
        </div>
    </div>
</template>

<script>
export default {
    props: ['data', 'height'],
    computed: {
        formatedData() {
            return JSON.stringify(this.data, undefined, 2)
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
