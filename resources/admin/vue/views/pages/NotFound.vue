<template>
  <div id="background">
    <h1>:(</h1>
    <p>
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
#background h1 {
  color: #fff;
  font-size: 100px;
  z-index: 999;
  border-bottom: 1px solid #fff;
}

#background {
  position: relative;
  width: 100%;
  height: 100vh;
  background: url("/assets/admin/images/bg.jpeg") no-repeat;
  background-size: cover;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}
#background::before {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(99, 8, 64, 0.8);
}
</style>
