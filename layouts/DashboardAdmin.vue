<template>
  <div>
    <TopBar @showMenu="isShowMenu()"  />

    <div class="flex h-full sm:h-screen pt-16">
        <SidebarAdmin :show-menu="showMenu" @showMenu="isShowMenu()"/>

        <div class="bg-gray-100 bg-opacity-70 h-full max-h-fit w-full">
          <Nuxt />
        </div>
    </div>
  </div>
</template>


<script>
  export default {
    middleware: ['auth', 'isAdmin'],
    data() {
        return {
            showMenu: false
        }
    },
    head(){
      return {
        title: `${this.$config.APP_NAME}`
      }
    },
    beforeMount() {
        window.addEventListener("resize", this.onResize);
    },
    beforeDestroy() {
        window.removeEventListener("resize", this.onResize);
    },
    methods: {
        isShowMenu(){
            this.showMenu = (window.innerWidth < 640) ? !this.showMenu : false
        },
        onResize(e) {
            if(window.innerWidth >= 640) {
                this.showMenu = false
            }
        },
    }
  }
</script>

<style>
    html {
        @apply font-sans;
    }
    .w250{
        width: 250px;
        min-width: 250px;
    }
</style>
