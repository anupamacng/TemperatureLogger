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

                <div class="row">
                  <div class="column">
                    <table>
                <tr v-for="temperatureDataColombo1 in temperatureDataColombo" :key="temperatureDataColombo1.id">
                          <td >{{ temperatureDataColombo1['time'] }}</td>
                <td >{{ temperatureDataColombo1['tempC'] }}</td>
                <td >{{ temperatureDataColombo1['tempF'] }}</td>
                    </tr>

                    </table>
                  </div>
                  <div class="column">
                    <table>

                     <tr v-for="temperatureDataMelbourne1 in temperatureDataMelbourne" :key="temperatureDataMelbourne1.id">
                          <td >{{ temperatureDataMelbourne1['time'] }}</td>
                <td >{{ temperatureDataMelbourne1['tempC'] }}</td>
                <td >{{ temperatureDataMelbourne1['tempF'] }}</td>
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
    props: ['baby' , 'temperatureDataColombo', 'temperatureDataMelbourne', 'towns' ],
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