<template>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      <div class="p-2 md:p-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-3">

            <div class="flex justify-between">
                <div class="mb-4 w-96">
                    <input v-model="params.search" type="search" aria-label="Search" placeholder="Search..." class="block w-full rounded border-gray-300 shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm"/>
                </div>

                  <div class="mb-4 max-w-md">
                    <NuxtLink
                        class="inline-block px-6 py-2.5 bg-blue-500 text-white font-medium text-sm leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                        to="/admin/employees/store"
                    >Adicionar Funcionário</NuxtLink>
                </div>
            </div>

            <div class="bg-white overflow-auto shadow-xl rounded-lg scrollbar scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200 scrollbar-thumb-rounded scrollbar-thumb-rounded scrollbar-thumb-rounded-md">
                <table class="min-w-full table-responsive">
                    <thead class="border-b bg-gradient-to-r from-cyan-500 to-blue-500" >
                        <tr class="text-white">
                            <th scope="col" class="w-3/12 font-bold text-sm font-medium employeeing-wider text-left text-white uppercase">
                                <span class="inline-flex py-3 px-6 w-full justify-between" @click="sort('id')">#ID
                                    <svg v-if="params.field === 'id' && params.direction === 'asc'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z"/>
                                    </svg>

                                    <svg v-if="params.field === 'id' && params.direction === 'desc'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"/>
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="w-3/12 font-bold text-sm font-medium employeeing-wider text-left text-white uppercase">
                                <span class="inline-flex py-3 px-6 w-full justify-between" @click="sort('name')">Nome
                                    <svg v-if="params.field === 'name' && params.direction === 'asc'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z"/>
                                    </svg>

                                    <svg v-if="params.field === 'name' && params.direction === 'desc'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"/>
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="w-3/12 font-bold text-sm font-medium employeeing-wider text-left text-white uppercase">
                                <span class="inline-flex py-3 px-6 w-full justify-between" @click="sort('email')">Email
                                    <svg v-if="params.field === 'email' && params.direction === 'asc'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z"/>
                                    </svg>

                                    <svg v-if="params.field === 'email' && params.direction === 'desc'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"/>
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="w-3/12 font-bold text-sm font-medium employeeing-wider text-left text-white uppercase">
                                <span class="inline-flex py-3 px-6 w-full justify-between" @click="sort('document')">CPF
                                    <svg v-if="params.field === 'document' && params.direction === 'asc'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z"/>
                                    </svg>

                                    <svg v-if="params.field === 'document' && params.direction === 'desc'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"/>
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="w-3/12 font-bold text-sm font-medium employeeing-wider text-left text-white uppercase">
                                <span class="inline-flex py-3 px-6 w-full justify-between" @click="sort('job_position')">Cargo
                                    <svg v-if="params.field === 'job_position' && params.direction === 'asc'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z"/>
                                    </svg>

                                    <svg v-if="params.field === 'job_position' && params.direction === 'desc'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"/>
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="w-3/12 font-bold text-sm font-medium employeeing-wider text-left text-white uppercase">
                                <span class="inline-flex py-3 px-6 w-full justify-between" @click="sort('birthday')">Idade
                                    <svg v-if="params.field === 'birthday' && params.direction === 'asc'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z"/>
                                    </svg>

                                    <svg v-if="params.field === 'birthday' && params.direction === 'desc'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"/>
                                    </svg>
                                </span>
                            </th>
                            <th scope="col" class="w-3/12 font-bold text-sm font-medium employeeing-wider text-left text-white uppercase">
                                <span class="inline-flex py-3 px-6 w-full justify-between">Administrador</span>
                            </th>

                            <th scope="col" class="font-bold text-sm font-medium px-6 py-4 text-right"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="employee in employees.data" :key="employee.id" class="border-b hover:bg-gray-100">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ employee.id }}
                            </td>
                            <td class="text-md text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                {{ employee.name }}
                            </td>
                            <td class="text-md text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                {{ employee.email }}
                            </td>
                            <td class="text-md text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                {{ employee.document }}
                            </td>
                            <td class="text-md text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                {{ employee.job_position }}
                            </td>
                            <td class="text-md text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                {{ employee.age }}
                            </td>
                            <td class="text-md text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                {{ employee.admin.name }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-right">
                                <button
                                    type="button"
                                    class="mx-1 inline-block px-6 py-2.5 bg-blue-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                                    @click="editEmployee(employee)"
                                >Editar</button>
                                <button
                                    type="button"
                                    class="mx-1 inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                                    @click="deleteEmployee(employee)"
                                >Deletar</button>
                            </td>
                        </tr>

                        <tr v-if="!employees.data.length">
                            <td colspan="5" class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center"> Sem Dados </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <Pagination class="mt-10" :links="employees.links" @changePage="onChangePage" />

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
        employees: await $axios.$get('/admin/employee'),
      }
    },
    data(){
      return {
        params: {
          search: null,
          field: null,
          direction: null,
          page: null,
        },
      }
    },
    watch: {
      params: {
          deep: true,
          handler: _.throttle(async function () {
              const params = _.pickBy(this.params)
              this.employees = await this.$axios.$get('/admin/employee', {params})
          }, 150),
      },
      employees: {
        deep: true,
        handler(){
          this.params.page = this.employees.current_page
        }
      }

    },
    methods: {
       onChangePage(post){
          const paramString = post.link.split('?')[1];
          const queryString = new URLSearchParams(paramString);
          this.params.page = queryString.get('page')
      },
      sort(field) {
          this.params.field = field;
          this.params.direction = this.params.direction === 'asc' ? 'desc' : 'asc';
      },
      deleteEmployee(employee){
        this.$swal.fire({
            title: 'Deletar Funcionário?',
            text: "Tem certeza que deseja deletar esse funcionário?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sim, Deletar!'
        }).then( async (result) => {
            if (result.isConfirmed) {
              await this.$axios.delete(`/admin/employee/${employee.id}`)
                .then(response => {
                  this.$toast.success(response.data.message)

                  const idx = this.employees.data.findIndex(o => o.id === employee.id);
                  this.employees.data.splice(idx, 1);

                }).catch(({ response }) => {
                  this.$toast.error(response.data.message)
                })
            }
        })
      }
    },

  }
</script>
