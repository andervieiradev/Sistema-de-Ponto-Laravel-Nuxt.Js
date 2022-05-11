<template>
<div class="py-12">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">

      <div>
          <div class="md:grid md:grid-cols-3 md:gap-6">
              <div class="md:col-span-1">
                  <div class="px-4 sm:px-0">
                      <h3 class="text-lg font-medium leading-6 text-gray-900">Cadastrar Funcionário</h3>
                      <p class="mt-1 text-sm text-gray-600">Você pode cadastrar os dados de um novo funcionário.</p>
                  </div>
              </div>
              <div class="mt-5 md:mt-0 md:col-span-2">
                  <form method="POST" @submit.prevent="onStoreEmployee">
                      <div class="shadow sm:rounded-md sm:overflow-hidden">
                      <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                        <div class="grid grid-cols-4 gap-2">
                          <InputBase v-model.trim="form.name" class="col-span-3" label="Nome" type="text" name="name" placeholder="Digite o Nome do seu Funcionário" :required="true" :error="errors.name" />
                          <InputBase v-model.trim="form.email" class="col-span-4" label="Email" type="email" name="email" placeholder="Digite o Email do seu Funcionário" :required="true" :error="errors.email" />
                          <InputBase v-model.trim="form.password" class="col-span-2" label="Senha" type="password" name="password" placeholder="Digite o Senha do seu Funcionário" :required="true" :error="errors.password" />
                          <InputBase v-model.trim="form.document" v-mask="'###.###.###-##'" class="col-span-2" label="CPF" type="text" name="document" placeholder="Digite o CPF do seu Funcionário" :required="true" :error="errors.document" />
                          <InputBase v-model.trim="form.birthday" v-mask="'##/##/####'" class="col-span-2" label="Dat. Nascimento" type="text" name="birthday" placeholder="Digite a Dat. Nasciment do seu Funcionário" :required="true" :error="errors.birthday" />
                          <InputBase v-model.trim="form.job_position" class="col-span-2" label="Cargo" type="text" name="job_position" placeholder="Digite o Cargo do seu Funcionário" :required="true" :error="errors.job_position" />
                          <InputBase v-model.trim="form.cep" v-mask="'#####-###'"  :disabled="syncCorreios" :loading="syncCorreios" class="col-span-2" label="CEP" type="text" name="cep" placeholder="Digite o CEP" :required="true" :error="errors.cep" />
                          <InputBase v-model.trim="form.street" class="col-span-3" label="Rua" type="text" name="street" placeholder="Digite a Rua" :required="true" :error="errors.street" />
                          <InputBase v-model.trim="form.number" class="col-span-1" label="Nº" type="text" name="number" placeholder="Digite o Nº" :required="true" :error="errors.number" />
                          <InputBase v-model.trim="form.complement" class="col-span-2" label="Complemento" type="text" name="complement" placeholder="Digite o Complemento" :required="false" :error="errors.complement" />
                          <InputBase v-model.trim="form.neighborhood" class="col-span-2" label="Bairro" type="text" name="neighborhood" placeholder="Digite o Bairro" :required="true" :error="errors.neighborhood" />
                          <InputBase v-model.trim="form.city" class="col-span-2" label="Cidade" type="text" name="city" placeholder="Digite a Cidade" :required="true" :error="errors.city" />
                          <InputBase v-model.trim="form.state" class="col-span-1" label="Estado" type="text" name="state" placeholder="Digite o Estado " :required="true" :error="errors.state" />
                          <InputBase v-model.trim="form.country" class="col-span-1" label="Pais" type="text" name="country" placeholder="Digite o Pais" :required="true" :error="errors.country" />
                        </div>

                      </div>
                      <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                          <button
                            type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
                             >
                            Cadastrar
                          </button>
                      </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
</template>


<script>
  export default {
    layout: 'DashboardAdmin',
     data(){
      return {
        errors: [],
        form: {
          name: null,
          email: null,
          password: null,
          document: null,
          birthday: null,
          job_position: null,
          cep: null,
          street: null,
          number: null,
          complement: null,
          neighborhood: null,
          city: null,
          state: null,
          country: null
        },
        syncCorreios: false,
      }
    },
    watch: {
      'form.cep' (newVal, OldVal){
        if(newVal.length === 9){
          this.onSyncCepCorreios()
        }

      }

    },
    methods: {
      async onStoreEmployee(){
        await this.$axios.post('/admin/employee', this.form)
          .then(response => {
            this.$toast.success(response.data.message)

            return this.$nuxt.$router.push('/admin/employees');

          }).catch(({ response }) => {
            this.$toast.error(response.data.message)
            this.errors = response.data.errors
          })
      },
      async onSyncCepCorreios(){
        this.syncCorreios = true;

        await this.$axios.$get(`/admin/employee/getCep/${this.form.cep}`)
          .then(response => {


            this.form.neighborhood = response.bairro
            this.form.complement = response.complemento
            this.form.city = response.localidade
            this.form.street = response.logradouro
            this.form.state = response.uf
            this.form.country = 'Brasil'
          })

          this.syncCorreios = false;

        // eslint-disable-next-line
        console.log(getCep)
      }
    }
  }
</script>
