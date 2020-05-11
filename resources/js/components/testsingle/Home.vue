<template>
  <div id="app">
    hrhrhrhrhrhrhrh
    <div>{{user}}</div>
    <div v-if="out">{{out}}</div>
    <button @click="logout">logout</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: "",
      out: ""
    };
  },
  mounted() {
    this.loadUser();
  },
  methods: {
    logout() {
      axios.post("logout").then(response => {
        this.out = "log out sucsess";
        this.user = response.data;
        console.log(response.data);
      });
    },
    loadUser() {
      axios
        .post("/user")
        .then(response => {
          this.user = response.data;
          console.log(this.user);
        })
        .catch(error => {
          console.log("cayyy");
        });
    }
  }
};
</script>

<style lang="scss" scoped>
</style>