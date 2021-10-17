<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Login Temperatures
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Anu You're logged in! {{baby}}
                    </div>
                </div>

                <div>
                        <table style="width:100%;">
                            <tr>
                                  <th colspan="10" v-for="town in towns">{{ town }}</th>
                            </tr>
                        </table>
                        
                        <div v-for="temperatureData1 in temperatureData" :key="temperatureData1.id">
                            {{ temperatureData1.town }}
                        </div>
                </div>

            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';

export default {
    props: ['baby' , 'temperatureData', 'towns' ],
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
}


</script>
