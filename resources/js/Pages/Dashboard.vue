<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg p-4">
                    <!-- chat box -->

                    <div class="w-80 h-96 flex flex-col border shadow-md bg-white">

                        <div class="flex-1 px-4 py-4 overflow-y-auto">
                            <!-- chat message -->

                            <div class="flex items-center mb-4" v-for="(item, index) in messages" :key="index">
                                <div class="flex-none flex flex-col items-center space-y-1 mr-4">
                                    {{item.user.name}}
                                </div>
                                <div class="flex-1 bg-indigo-400 text-white p-2 rounded-lg mb-2 relative">
                                    <div>{{item.message}}</div>

                                    <!-- arrow -->
                                    <div
                                        class="absolute left-0 top-1/2 transform -translate-x-1/2 rotate-45 w-2 h-2 bg-indigo-400"></div>
                                    <!-- end arrow -->
                                </div>
                            </div>

                            <!-- end chat message -->
                        </div>

                        <div class="flex items-center border-t p-2">


                            <div class="w-full mx-2">
                                <input class="w-full rounded-full border border-gray-200" type="text"
                                       v-model="message"
                                       @keyup.enter="sendMessage()"
                                       placeholder="Say something..."
                                       autofocus
                                />
                            </div>
                        </div>
                    </div>

                    <!-- end chat box -->
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';

export default {
    name: "Dashboard",
    components:{
        AuthenticatedLayout,
        Head
    },
    data(){
        return{
            chatRooms: [],
            messages: [],
            message:''
        }
    },
    methods:{
        getMessages() {
            axios.get('/chat/room/messages')
                .then(response => {
                    this.messages = response.data
                    console.log(this.messages)
                }).catch(error => {
                console.log(error)
            })
        },
        sendMessage() {
            if (this.message == '') {
                alert('warning');
            } else {
                axios.post('/chat/room/message', {
                    message: this.message
                })
                    .then(response => {
                        if(response.status == 201){
                            this.message = '';
                        }
                    }).catch(error => {
                    console.log(error)
                })
            }
        }
    },
    created() {
        this.getMessages();
        const roomId = 1;
        Echo.private('chat')
            .listen('NewChatMessage',(result)=>{
                this.getMessages();
            })
    },
}
</script>

<style scoped>

</style>
