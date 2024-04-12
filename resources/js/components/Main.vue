<template>
  <div class="min-h-full">
    <div as="nav" class="border-b border-gray-200 bg-white">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
          <div class="flex">
            <div class="flex flex-shrink-0 items-center">
              <img class="block h-8 w-auto lg:hidden" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="URL Shortener" />
              <img class="hidden h-8 w-auto lg:block" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="URL Shortener" />
            </div>
            <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
                <a
                    v-for="item in navigation"
                    :key="item.name"
                    :href="item.href"
                    :class="[item.current ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700', 'inline-flex items-center border-b-2 px-1 pt-1 text-sm font-medium']"
                    :aria-current="item.current ? 'page' : undefined"
                    @click="changeCurrent(item)"
                >
                    <router-link :to="{name: item.name}">
                        {{ item.name }}
                    </router-link>
                </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="py-10">
      <main>
        <div class="mx-auto max-w-7xl">
          <router-view></router-view>
        </div>
      </main>
    </div>
  </div>
</template>

<script>
export default {
    name: 'Main',
    data() {
        return {
            navigation: [
                { name: 'Home', href: '#', current: true },
                { name: 'Links', href: '#', current: false },
            ]
        }
    },
    mounted() {
        this.changeCurrent(this.navigation[0])
    },
    methods: {
        changeCurrent(item) {
            for(let i = 0; i < this.navigation.length; i++) {
                if(this.navigation[i].name !== item.name) {
                    this.navigation[i].current = false
                    continue;
                }
                this.navigation[i].current = true
            }
        }
    }
}
</script>
