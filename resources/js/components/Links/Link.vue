<template>
  <div>
    <div class="px-4 sm:px-0">
      <h3 class="text-base font-semibold leading-7 text-gray-900">Shortened Link</h3>
      <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Shortened link additional information.</p>
    </div>
    <div class="mt-6 border-t border-gray-100">
      <dl class="divide-y divide-gray-100">
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Original URL</dt>
          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><a class="cursor-pointer hover:text-indigo-600" target="_blank">{{ link.original_url }}</a></dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Short Code</dt>
          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ link.short_code }}</dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Short URL</dt>
          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><a class="cursor-pointer hover:text-indigo-600" target="_blank">{{ link.short_url }}</a></dd>
        </div>
      </dl>
    </div>
  </div>
</template>

<script>
export default {
    name: 'Link',
    mounted(){
        this.axios.get(`/links/${this.$route.params.hash}`)
            .then(response => {
                this.link = response.data;
            });
    },
    data() {
        return {
            link: {
                original_url: '',
                short_url: '',
                short_code: ''
            }
        }
    }
}
</script>
