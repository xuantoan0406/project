<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Register</div>
          <div class="card-body">
            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">Name</label>
              <div class="col-md-6">
                <input
                  id="name"
                  type="text"
                  class="form-control"
                  v-model="user.name"
                  required
                  autocomplete="name"
                  autofocus
                />
                <div v-if="error.name" class="error">{{ error.name[0] }}</div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
              <div class="col-md-6">
                <input id="email" type="text" class="form-control" v-model="user.email" />
                <span v-if="error.email" class="error">
                  {{
                  error.email[0]
                  }}
                </span>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">Password</label>
              <div class="col-md-6">
                <input type="password" class="form-control" v-model="user.password" />
                <span v-if="error.password" class="error">
                  {{
                  error.password[0]
                  }}
                </span>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">Confirm Password</label>
              <div class="col-md-6">
                <input type="password" class="form-control" v-model="user.cfpassword" />
                <span v-if="error.cfPassword" class="error">
                  {{
                  error.cfPassword[0]
                  }}
                </span>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary" @click="register">Register</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: {
        name: "",
        email: "",
        password: "",
        cfpassword: ""
      },
      error: []
    };
  },
  methods: {
    register() {
      axios
        .post("register", {
          name: this.user.name,
          email: this.user.email,
          password: this.user.password,
          cfPassword: this.user.cfpassword
        })
        .then(response => {
          //console.log(response.response.data.user);
          alert("register sucsess");
          this.$router.push("/logins");
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.error = error.response.data.errors;
          }
        });
    }
  }
};
</script>

<style lang="scss" scoped></style>
