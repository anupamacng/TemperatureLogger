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
                                  <th v-for="town in towns">{{ town }}</th>
                            </tr>
                            
                        </table>
                    <div class="row">
                        <div v-for="tempCity in tempData" class="column" style="width:">
                            <table>
                                <tr v-for="cityData in tempCity" :key="cityData.id">
                                            <td >{{ cityData['time'] }}</td>
                                  <td >{{ cityData['tempC'] }}</td>
                                  <td >{{ cityData['tempF'] }}</td>
                                      </tr>
                            </table>
                        </div>
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
    props: [ 'towns' , 'tempData'],
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
}


</script>
<style scoped>
    * {
  box-sizing: border-box;
}

.row {
  margin-left:-5px;
  margin-right:-5px;
}
  
.column {
  float: left;
  width: 50%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>