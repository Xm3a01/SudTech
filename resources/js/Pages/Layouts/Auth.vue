<template>
    <div class="min-h-screen flex items-center">
        <slot />
    </div>
</template>

<script>
export default {
    props:['title'],
    watch: {
      title: {
        immediate: true,
        handler(title) {
          document.title = title
        },
      },
    },
}
</script>
