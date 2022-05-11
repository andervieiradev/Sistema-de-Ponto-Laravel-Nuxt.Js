<template>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      <div class="p-2 md:p-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">

          <div class="mb-3 md:col-span-2">
            <h1 class=" mb-3 text-2xl font-medium">Pontos dos Seus Funcionários Subordinados</h1>
          </div>
          <div class="mb-3 md:col-span-1 flex items-center">
            <div class=" mt-5 md:mt-0 md:col-span-2 ">
              Data Inicial:
              <Datepicker
                v-model="params.start_date"
                :range="false"
                type="datetime"
                lang="pt-br"
                format='dd-MMM-yyyy'
                position="center"
                first-day-of-week="monday"
                :date-format="{ day: '2-digit', month: '2-digit', year: 'numeric' }"
               />

              Data Final:
              <Datepicker
                v-model="params.end_date"
                :range="false"
                type="datetime"
                lang="pt-br"
                format='dd-MMM-yyyy'
                position="center"
                first-day-of-week="monday"
                :date-format="{ day: '2-digit', month: '2-digit', year: 'numeric' }"
               />
            </div>
          </div>

          <div class="col-span-3">
            <div class="bg-white overflow-auto shadow-xl rounded-lg scrollbar scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200 scrollbar-thumb-rounded scrollbar-thumb-rounded scrollbar-thumb-rounded-md">
                <table class="min-w-full table-responsive">
                    <thead class="border-b bg-gradient-to-r from-cyan-500 to-blue-500" >
                        <tr class="text-white">
                            <th scope="col" class="w-3/12 font-bold text-sm font-medium employeeing-wider text-left text-white uppercase">
                                <span class="inline-flex py-3 px-2 w-full justify-between">#ID</span>
                            </th>
                            <th scope="col" class="w-3/12 font-bold text-sm font-medium employeeing-wider text-left text-white uppercase">
                                <span class="inline-flex py-3 px-6 w-full justify-between">Nome</span>
                            </th>
                            <th scope="col" class="w-3/12 font-bold text-sm font-medium employeeing-wider text-left text-white uppercase">
                                <span class="inline-flex py-3 px-6 w-full justify-between">Cargo</span>
                            </th>
                            <th scope="col" class="w-3/12 font-bold text-sm font-medium employeeing-wider text-left text-white uppercase">
                                <span class="inline-flex py-3 px-6 w-full justify-between">Idade</span>
                            </th>
                            <th scope="col" class="w-3/12 font-bold text-sm font-medium employeeing-wider text-left text-white uppercase">
                                <span class="inline-flex py-3 px-6 w-full justify-between">Gestor</span>
                            </th>
                            <th scope="col" class="w-3/12 font-bold text-sm font-medium employeeing-wider text-left text-white uppercase">
                                <span class="inline-flex py-3 px-6 w-full justify-between">Ponto</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="point in points" :key="point.id" class="border-b hover:bg-gray-100">
                            <td class="px-2 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ point.id }}
                            </td>
                            <td class="text-md text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                {{ point.name }}
                            </td>
                            <td class="text-md text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                {{ point.job }}
                            </td>
                            <td class="text-md text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                {{ age(point.birthday) }}
                            </td>
                            <td class="text-md text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                {{ point.admin }}
                            </td>
                            <td class="text-md text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                {{ $moment( point.point_date ).format("DD/MM/YYYY HH:mm:ss") }}
                            </td>
                        </tr>

                        <tr v-if="!points.length">
                            <td colspan="6" class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center"> Sem Dados </td>
                        </tr>
                    </tbody>
                </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
  import _ from "lodash"

  export default {
    layout: 'DashboardAdmin',
    async asyncData({ $axios }) {
      return {
        points: await $axios.$get('/admin/point/listPoint'),
      }
    },
    data(){
      return {
        params: {
          start_date: new Date(),
          end_date: new Date(),
        },
      }
    },

    watch: {
      params: {
          deep: true,
          handler: _.throttle(async function () {
              const params = _.pickBy(this.params)
              this.points = await this.$axios.$get('/admin/point/listPoint', {params})
          }, 150),
      },

    },
    methods:{
      age(value){
        const today = new Date();
        const birthDate = new Date(value);
        let age = today.getFullYear() - birthDate.getFullYear();
        const m = today.getMonth() - birthDate.getMonth();
          if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate()))
          {
              age--;
          }
        return age + ' anos';
      }
    },
  }
</script>
