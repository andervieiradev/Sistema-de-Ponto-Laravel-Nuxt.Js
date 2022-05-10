<template>
<div class="py-12">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">

      <div v-if="!user.email_verified_at" class="px-4 py-3 mb-4 bg-sky-100 rounded border border-l-4 border-sky-900 md:flex justify-between" role="alert">
          <div>
              <div class="flex items-center">
                  <svg class="mr-2 w-4 h-4 text-sky-700 font-semibold" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                  <h3 class="text-lg font-medium text-gray-700 ">Verificação de e-mail</h3>
              </div>
              <div class="mb-2 text-sm text-gray-700">
                  Confirme sua conta no e-mail que enviamos para: {{ user.email }}
              </div>
          </div>

          <div class="flex align-middle items-center ">

              <button
                  v-if="formUserVerified.btn"
                  :disabled="formUserVerified.processing"
                  type="submit"
                  class="text-white bg-sky-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center" @click.prevent="submitFormUserVerified">
                  <svg v-show="formUserVerified.processing" class="animate-spin m-auto h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                      <path class="opacity-80" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                  <span v-show="!formUserVerified.processing" class="flex">
                      <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 mr-2  h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                      </svg>
                      Reenviar E-mail
                  </span>
              </button>
          </div>
      </div>

      <div>
          <div class="md:grid md:grid-cols-3 md:gap-6">
              <div class="md:col-span-1">
                  <div class="px-4 sm:px-0">
                      <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                      <p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share.</p>
                  </div>
              </div>
              <div class="mt-5 md:mt-0 md:col-span-2">
                  <form action="#" method="POST">
                      <div class="shadow sm:rounded-md sm:overflow-hidden">
                      <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                          <div class="grid grid-cols-3 gap-6">
                          <div class="col-span-3 sm:col-span-2">
                              <label for="company-website" class="block text-sm font-medium text-gray-700"> Website </label>
                              <div class="mt-1 flex rounded-md shadow-sm">
                              <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"> http:// </span>
                              <input id="company-website" type="text" name="company-website" class="focus:ring-sky-500 focus:border-sky-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="www.example.com">
                              </div>
                          </div>
                          </div>

                          <div>
                          <label for="about" class="block text-sm font-medium text-gray-700"> About </label>
                          <div class="mt-1">
                              <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-sky-500 focus:border-sky-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="you@example.com"></textarea>
                          </div>
                          <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p>
                          </div>

                          <div>
                          <label class="block text-sm font-medium text-gray-700"> Photo </label>
                          <div class="mt-1 flex items-center">
                              <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                              <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                  <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                              </svg>
                              </span>
                              <button type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Change</button>
                          </div>
                          </div>

                          <div>
                          <label class="block text-sm font-medium text-gray-700"> Cover photo </label>
                          <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                              <div class="space-y-1 text-center">
                              <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                  <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                              </svg>
                              <div class="flex text-sm text-gray-600">
                                  <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-sky-600 hover:text-sky-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-sky-500">
                                  <span>Upload a file</span>
                                  <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                  </label>
                                  <p class="pl-1">or drag and drop</p>
                              </div>
                              <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                              </div>
                          </div>
                          </div>
                      </div>
                      <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                          <button
                            type="button"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
                             >
                            Save
                          </button>
                      </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>

      <div class="hidden sm:block" aria-hidden="true">
          <div class="py-5">
              <div class="border-t border-gray-200"></div>
          </div>
      </div>
  </div>
</div>
</template>

<script>

export default {
  layout: 'Dashboard',
  data() {
      return {
          user: this.$auth.user,
          formUserVerified: {
            btn: true,
            processing: false,
          },
          products: []
      };
  },
  methods: {
      async submitFormUserVerified(){
        this.formUserVerified.processing = true

        await this.$axios.post('/sendEmailVerification').then(response => {
            this.$toast.success(response.data.message)
            this.formUserVerified.btn = false
        })

        this.formUserVerified.processing = false
      },
  }
}
</script>
