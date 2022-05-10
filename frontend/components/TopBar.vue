<template>
<nav class="bg-white shadow fixed w-full z-20">
  <div class="w-ful mx-auto px-2 sm:px-4 lg:px-8 ">
    <div class="relative flex items-center sm:justify-between h-16">

        <div class="flex inset-y-0 left-0 items-center sm:hidden">
            <!-- Mobile menu button-->
            <button type="button" class="inline-flex items-center justify-start p-2 rounded-md text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false" @click="$emit('showMenu')">
                <span class="sr-only">Open main menu</span>
                <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="flex items-stretch justify-start ">
            <div class="flex-shrink-0 flex w250">
                <div class="h-6">
                    <NuxtLink to="/dashboard">
                        <Logo />
                    </NuxtLink>
                </div>
            </div>
        </div>


        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

            <!-- Profile dropdown -->
            <div class="ml-2 relative">

                <span class="flex absolute h-2 w-2 top-0 right-0 -mt-1 -mr-1">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                </span>

                <div v-click-outside="onClickOutsideShowUserMenu">
                    <button
                        id="user-menu-button"
                        type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring focus:ring-sky-200e" @click="showUserMenu = !showUserMenu">
                        <span class="sr-only">Open user menu</span>
                        <span class="h-8 w-8 rounded-full text-white font-semibold flex items-center justify-center">{{ speakerInitials }} </span>
                    </button>

                    <transition>
                        <div v-show="showUserMenu" tabindex="0" class="drop-shadow shadow origin-top-right absolute right-0 mt-2 z-50 w250 text-base list-none bg-white rounded overflow-hidden divide-y divide-gray-100 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="userData py-4 px-4 bg-gray-700 text-white" >
                                <h3 class="font-semibold">{{ $auth.user.name }}</h3>
                                <span class="text-sm">{{ $auth.user.email }}</span>
                            </div>
                            <ul class="py-1">
                                <li>
                                    <a href="#" class="block hover:font-semibold py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                        Editar Senha
                                    </a>
                                </li>
                            </ul>
                            <div class="py-1 hover:font-semibold ">
                                <a
                                  class="cursor-pointer flex py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                  @click="logout">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Sair da Conta
                                </a>
                            </div>
                        </div>
                    </transition>
                </div>
            </div>
        </div>
    </div>
  </div>
</nav>
</template>

<script>
export default {
  directives: {
      clickOutside: {
          bind (el, binding, vnode) {
          el.clickOutsideEvent = function (event) {
                // here I check that click was outside the el and his childrens
                if (!(el === event.target || el.contains(event.target))) {
                // and if it did, call method provided in attribute value
                vnode.context[binding.expression](event);
                }
            };
            document.body.addEventListener('click', el.clickOutsideEvent)
          },
          unbind (el) {
            document.body.removeEventListener('click', el.clickOutsideEvent)
          },
      }
  },
  emits: ['showMenu'],
  data() {
    return {
      user: this.$auth.user,
      showUserMenu: false,
      speakerInitials: '',
    }
  },
  mounted(){
      this.speakerInitials = this.user.name ? this.user.name.split(' ', 2)[0].slice(0, 1) : ''
  },
  methods: {
      onClickOutsideShowUserMenu (event) {
          this.showUserMenu = false
      },
      async logout() {
          await this.$auth.logout();
          this.$router.push("/");
      },
  },
}
</script>

<style scoped>
    .v-enter-active,
    .v-leave-active {
    transition: opacity 0.2s ease;
    }

    .v-enter-from,
    .v-leave-to {
    opacity: 0;
}
</style>
