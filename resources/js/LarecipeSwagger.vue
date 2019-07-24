<template>
    <div class="my-4 font-sans">
        <div class="text-left">
            <div class="p-2 bg-blue-darker items-center text-blue-lightest leading-none rounded-full flex inline-flex" role="alert">
                <span class="flex rounded-full bg-blue uppercase px-2 py-1 text-xs font-bold mr-3">Try</span>
                <span class="font-semibold mr-2 text-left flex-auto">Live Demo</span>
            </div>
        </div>
        <div class="bg-blue-darker p-2 rounded-lg flex flex-wrap justify-start">
            <div class="w-1/2 px-6 py-4" :class="'request-panel-' + panelId">
                <RequestUrl :url="fullUrl" @change="updateRequestUrl" />
                <RequestMethods :defaultMethod="defaultMethod" @change="updateRequestMethod" />
                <RequestHeaders :defaultHeaders="getDefaultHeaders" @change="updateRequestHeaders" />
                <RequestParams :defaultParams="defaultParams" @change="updateRequestParams" />
                <RequestRunner @run="run" />
            </div>

            <div class="w-1/2 p-8 bg-white rounded-lg">
                <RequestResult :response="response" :height="resultHeight" />
            </div>
        </div>
    </div>
</template>

<script>
import RequestUrl from './components/RequestUrl';
import RequestParams from './components/RequestParams';
import RequestRunner from './components/RequestRunner';
import RequestResult from './components/RequestResult';
import RequestMethods from './components/RequestMethods';
import RequestHeaders from './components/RequestHeaders';

export default {
    name: 'larecipe-swagger',
    props: {
        baseUrl: {
            type: String,
            default: window.location.origin
        }, 
        endpoint: {
            type: String,
            default: '/'
        }, 
        defaultHeaders: Object, 
        defaultParams: Object, 
        defaultMethod: String,
        hasCommonHeaders: {
            type: Boolean,
            default: false
        },
        hasAuthHeader: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            fullUrl: '',
            panelId: Date.now(),
            response: {data: 'Press the run button!', status: null},
            resultHeight: 400,
            method: 'get',
            headers: {},
            commonHeaders: {'Content-Type': 'application/json', 'Accept': 'application/json'},
            authHeader: {'Authorization': 'Bearer token_here'},
            params: {}
        }
    },
    computed: {
        getDefaultHeaders() {
            return {
                ...this.defaultHeaders ? this.defaultHeaders : {},
                ...this.hasCommonHeaders ? this.commonHeaders : {},
                ...this.hasAuthHeader ? this.authHeader : {},
            };
        },
    },
    methods: {
        updateResultPanelHeight() {
            this.resultHeight = $(".request-panel-" + this.panelId).height();
        },
        updateRequestUrl(url) {
            this.fullUrl = url
        },
        updateRequestMethod(method) {
            this.method = method
        },
        updateRequestHeaders(headers) {
            this.headers = headers
        },
        updateRequestParams(params) {
            this.params = params
        },
        run() {
            let call = null
            
            if(this.method == "get") {
                call = axios[this.method](this.fullUrl, {params: this.params, headers: this.headers})
            }else {
                call = axios[this.method](this.fullUrl, this.params, {headers: this.headers})
            }

            call.then(response => this.response = response)
                .catch(errors => this.response = errors.response)
        },
    },
    created() {
        this.fullUrl = this.baseUrl + this.endpoint;
    },
    mounted() {
        this.updateResultPanelHeight();
    },
    components: {
        RequestUrl,
        RequestResult,
        RequestParams,
        RequestRunner,
        RequestMethods,
        RequestHeaders,
    }
}
</script>
