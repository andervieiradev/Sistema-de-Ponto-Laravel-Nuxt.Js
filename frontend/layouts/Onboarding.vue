<template>
<div class="flex max-h-fit	">
    <section class="bg-white min-h-screen w-full md:w-7/12 lg:w-7/12 xl:w-6/12 py-4 flex align-middle">
        <div class="container px-4 py-4 mx-auto my-auto">
            <div class="max-w-sm mx-auto my-auto">
                <Nuxt />
            </div>
        </div>
    </section>
    <div class="bg-black min-h-screen max-h-fit w-0 md:w-5/12 lg:w-full">
        <BackgroundOnboarding />
    </div>
</div>
</template>


<style>
    html {
      @apply font-sans;
    }
</style>
