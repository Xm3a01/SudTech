<template>
  <body class="bg-gray-300">
    <Header />
    <slot></slot>
    <Footer class=" mt-16" />
  </body>
</template>

<script>
import Header from "./Header";
import Footer from "./Footer";
export default {
  components: {
    Header,
    Footer,
  },
};
</script>