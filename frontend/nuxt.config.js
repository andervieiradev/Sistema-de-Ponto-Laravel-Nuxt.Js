export default {
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: process.env.APP_NAME,
    htmlAttrs: {
      lang: 'pt-br',
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
      { name: 'format-detection', content: 'telephone=no' },
    ],
    link: [{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }],
    bodyAttrs:{
      class: 'bg-gray-100 bg-opacity-70'
    }
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
    '@/assets/css/tailwind.css',
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    { src: '~/plugins/vue-toastification.js', mode: 'client'},
    { src: '~/plugins/moment.js'},
    { src: '~/plugins/vue-datepicker.js'},
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    // https://go.nuxtjs.dev/eslint
    '@nuxtjs/eslint-module',
    '@nuxt/postcss8'
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    '@nuxtjs/auth-next',
    'cookie-universal-nuxt',
    'vue-sweetalert2/nuxt',
  ],

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
    // Workaround to avoid enforcing hard-coded localhost:3000: https://github.com/nuxt-community/axios-module/issues/308
    credentials: false,
    proxy: false,
    baseURL: process.env.API_URL,
  },

  auth: {
    strategies: {
      admin: {
        scheme: '~/schemes/adminScheme',
        endpoints: {
          login: { url: '/admin/login', method: 'post', propertyName: 'token' },
          logout: { url: '/admin/logout', method: 'post' },
          user: { url: '/admin/me', method: 'get', propertyName: 'user' }
        },
        token: {
          property : 'token' ,
          required : true ,
          type : 'Bearer'
        },
        user: {
          property: 'user',
          autoFetch : true
        }
      },
      employee: {
        scheme: '~/schemes/employeeScheme',
        endpoints: {
          login: { url: '/employee/login', method: 'post', propertyName: 'token' },
          logout: { url: '/employee/logout', method: 'post' },
          user: { url: '/employee/me', method: 'get', propertyName: 'user' }
        },
        token: {
          property : 'token' ,
          required : true ,
          type : 'Bearer'
        },
        user: {
          property: 'user',
          autoFetch : true
        }
      },

    },
    rewriteRedirects: true,
    redirect: {
      login: "/",
      logout: "/",
      home: "/",
    },
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
    postcss: {
      plugins: {
        tailwindcss: {},
        autoprefixer: {},
      },
    },
  },

  router: {
    middleware: ['auth']
  },

  eslint: { cache: false, },

  publicRuntimeConfig:{
    APP_NAME: process.env.APP_NAME,
  },
  privateRuntimeConfig:{

  },

  SSR: true
}
