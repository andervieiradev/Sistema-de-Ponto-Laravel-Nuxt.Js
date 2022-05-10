<template>
  <div>
    <div class="mb-6 text-center">
      <a class="inline-block mb-10 h-10" href="#">
        <Logo />
      </a>
      <h3 class="mb-4 text-xl md:text-3xl font-bold text-gray-900">Funcionário</h3>
    </div>

    <DismissableAlerts :message="errors" :type="'error'" @close="errors = null" />

    <form @submit.prevent="submit">
      <div class="mb-6">
        <label class="block mb-2 text-gray-800 font-medium" for="">E-mail</label>
        <input v-model="form.email" :class="{ error : errors }" required class="input" type="email" placeholder="Digite seu e-mail">
      </div>

      <div class="mb-4">
        <label class="block mb-2 text-gray-800 font-medium" for="">Senha</label>
        <input v-model="form.password" :class="{ error : errors }" required class="input" type="password" placeholder="Digite sua senha">
      </div>

      <button
        :disabled="form.processing"
        type="submit" class="inline-flex items-center justify-center py-3 px-7 mb-10 w-full text-base text-sky-50 font-medium text-center leading-6 bg-sky-500 hover:bg-sky-600 focus:ring-2 focus:ring-sky-500 focus:ring-opacity-50 rounded-md shadow-sm">
        <svg v-show="form.processing" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-80" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <span v-show="!form.processing">Entrar</span>
      </button>

      <p class="text-center grid">
        <NuxtLink class="inline-block text-md font-medium text-sky-500 hover:text-sky-600 hover:underline" to="/">Voltar</NuxtLink>
      </p>
    </form>
  </div>
</template>

<script>
export default {
  layout: 'Onboarding',
  auth: 'guest',

  data() {
    return {
      form: {
        email: 'teste@teste.com',
        password: 'password',
        processing: false,
      },
      errors: null
    }
  },
  methods:{
    async submit(){
      this.errors = null
      this.form.processing = true

      await this.$auth.loginWith('employee', {
        data: this.form
      }).then(response => {
        this.$router.push('/employee/dashboard')
      })
      .catch((e) => {
        this.errors = e.response.data.message
      })

      this.form.processing = false
    }
  }
}
</script>


<style scoped>
    .input{
        @apply appearance-none block w-full p-3 leading-5 text-gray-900 border border-gray-200 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-opacity-50;
    }

    .error{
        @apply border-red-700;
    }
</style>
