<template>
    <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-4 lg:px-8">
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <div class="space-y-6">
            <div>
            <label for="url" class="block text-sm font-medium leading-6 text-gray-900">Shorten your URL</label>
            <div class="mt-2">
                <input
                    id="url"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    name="url"
                    type="text"
                    required
                    v-model="url"
                />
            </div>
            </div>

            <div>
            <button
                :disabled="isDisabled"
                type="submit"
                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                :class="disabledClass"
                @click.prevent="shortenUrl"
                >
                    Shorten
                </button>
            </div>
        </div>

        <p v-if="shortUrl" class="mt-10 text-center text-sm text-gray-500">
            Your Shortened URL is: <a class="hover:text-indigo-500" :href="shortUrl" target="_blank">{{shortUrl}}</a>
        </p>

        <p v-if="error" class="mt-10 text-center text-sm text-red-500">
            {{ error }}
        </p>
        </div>
</div>
</template>

<script>
export default {
  name: 'Form',
  data() {
    return {
      url: '',
      isDisabled: false,
      shortUrl: '',
      error: ''
    };
  },
  computed: {
    disabledClass() {
      return this.isDisabled ? 'opacity-70 cursor-not-allowed' : ''
    }
  },
  methods: {
    shortenUrl() {
        this.isDisabled = true
        this.shortUrl = ''
        this.error = ''
        this.axios.post('check-url', {
            url: this.url
        })
        .then(response => {
            if(response.data.length) {
                this.isDisabled = false
                this.error = "The provided url is considered as a threat. Please provide a safe url."
                return
            }

            this.axios.post('shorten', {
                url: this.url
            }).then(response => {
                this.shortUrl = response.data.short_url
                this.isDisabled = false
                this.url = ''
            }).catch(error => {
                this.isDisabled = false
                this.error = error.response.data.message
                this.url = ''
            });
        })
        .catch( error => {
            this.isDisabled = false
            this.error = error.response.data.message
        })
    },
    checkUrl() {

    }
  }
};
</script>
