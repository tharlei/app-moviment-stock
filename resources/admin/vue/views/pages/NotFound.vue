<template>
  <div
    id="background"
    class="
      h-screen
      bg-cover
      flex
      justify-center
      items-center
      flex-col
      w-full
      relative
    "
  >
    <h2 class="text-white z-50 text-5xl">:(</h2>

    <p class="mt-10 text-white opacity-80 z-50 text-base">
      A página em questão não existe...será redirecionado de volta em 3
      segundos!
    </p>
  </div>
</template>

<script>
export default {
  mounted() {
    setTimeout(() => {
      window.location = "/admin";
    }, 3000);
  },
};
</script>

<style scoped>
#background h2 {
  line-height: 1.5;
  border-bottom: 0.5px solid #fff;
}

#background {
  background: url("/assets/admin/images/bg.jpeg") no-repeat;
}

#background::before {
  @apply absolute top-0 left-0 right-0 bottom-0 opacity-60 bg-purple;
  content: "";
}
</style>
