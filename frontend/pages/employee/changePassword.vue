<template>
<div class="py-12">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">

      <div>
          <div class="md:grid md:grid-cols-3 md:gap-6">
              <div class="md:col-span-1">
                  <div class="px-4 sm:px-0">
                      <h3 class="text-lg font-medium leading-6 text-gray-900">Alterar Senha</h3>
                      <p class="mt-1 text-sm text-gray-600">Você pode mudar sua senha de acesso ao sistema.</p>
                  </div>
              </div>
              <div class="mt-5 md:mt-0 md:col-span-2">
                  <form method="POST" @submit.prevent="onChangePassword" >
                      <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                              <div class="col-span-3 ">
                                  <label for="old_password" class="block text-sm font-medium text-gray-700"> Senha Atual: </label>
                                  <div class="mt-1 flex rounded-md shadow-sm">
                                    <input id="old_password" v-model="form.old_password" type="password" name="old_password" class="focus:ring-sky-500 focus:border-sky-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Digite sua senha atual">
                                  </div>
                                  <InputError :message="errors.old_password" />
                              </div>
                              <div class="col-span-3">
                                  <label for="password" class="block text-sm font-medium text-gray-700"> Senha Atual: </label>
                                  <div class="mt-1 flex rounded-md shadow-sm">
                                    <input id="password" v-model="form.password" type="password" name="password" class="focus:ring-sky-500 focus:border-sky-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Digite sua nova senha">
                                  </div>
                                  <InputError :message="errors.password" />
                              </div>
                              <div class="col-span-3">
                                  <label for="password_confirmation" class="block text-sm font-medium text-gray-700"> Senha Atual: </label>
                                  <div class="mt-1 flex rounded-md shadow-sm">
                                    <input id="password_confirmation" v-model="form.password_confirmation" type="password" name="password_confirmation" class="focus:ring-sky-500 focus:border-sky-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Confirme sua nova senha">
                                  </div>
                                  <InputError :message="errors.password_confirmation" />
                              </div>
                            </div>
                        </div>


                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                          <button
                            type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
                            >
                            Alterar Senha

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
import InputError from '../../components/InputError.vue';

export default {
  components: { InputError },
  layout: 'DashboardEmployee',
  data() {
      return {
        form: {
          old_password: null,
          password: null,
          password_confirmation: null,
        },
        errors: []
      }
  },
  methods:{
    async onChangePassword(){
      await this.$axios.post('/employee/changePassword', this.form)
      .then(response => {

          this.form.old_password = null;
          this.form.password = null;
          this.form.password_confirmation = null;

          this.errors = [];

          this.$toast.success(response.data.message)

        }).catch(({ response }) => {

          this.$toast.error(response.data.message)
          this.errors = response.data.errors

        })
    }
  }
}
</script>
