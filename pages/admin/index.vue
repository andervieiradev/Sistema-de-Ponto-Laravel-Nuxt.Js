<template>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      <div class="p-2 md:p-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-3">
            <h1 class="  text-2xl font-medium">Últimos Pontos (todos)</h1>
            <h2 class="mb-3 text-md font-normal">Todos os funcionários</h2>

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
                        <tr v-for="point in points.data" :key="point.id" class="border-b hover:bg-gray-100">
                            <td class="px-2 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ point.id }}
                            </td>
                            <td class="text-md text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                {{ point.employee.name }}
                            </td>
                            <td class="text-md text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                {{ point.employee.job_position }}
                            </td>
                            <td class="text-md text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                {{ point.employee.age }}
                            </td>
                            <td class="text-md text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                {{ point.employee.admin.name }}
                            </td>
                            <td class="text-md text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                {{ point.point_date }}
                            </td>
                        </tr>

                        <tr v-if="!points.data.length">
                            <td colspan="6" class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center"> Sem Dados </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <Pagination class="mt-10" :links="points.links" @changePage="onChangePage" />
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
        points: await $axios.$get('/admin/point/listAll'),
      }
    },
    data(){
      return {
        params: {
          page: null,
        },
      }
    },
    watch: {
      params: {
          deep: true,
          handler: _.throttle(async function () {
              const params = _.pickBy(this.params)
              this.points = await this.$axios.$get('/admin/point/listAll', {params})
          }, 150),
      },
      points: {
        deep: true,
        handler(){
          this.params.page = this.points.current_page
        }
      }

    },
    methods: {
       onChangePage(post){
          const paramString = post.link.split('?')[1];
          const queryString = new URLSearchParams(paramString);
          this.params.page = queryString.get('page')
      },
    },

  }
</script>
