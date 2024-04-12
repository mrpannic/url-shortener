<template>
<tr>
    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ link.original_url }}</td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
        <a class="hover:text-indigo-500" target="_blank" :href=link.short_url>{{ link.short_url }}</a>
    </td>
    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
        <a class="text-indigo-600 hover:text-indigo-900">
            <router-link :to="{ name: 'Link', params: { hash: link.short_code } }">
                View
            </router-link>
        </a>
    </td>
</tr>
</template>

<script>
export default {
    name: 'LinkItem',
    props: {
        link: Object
    }
}
</script>
