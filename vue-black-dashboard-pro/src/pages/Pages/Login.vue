<template>
<div>
  <div class="container">
  <div class="header-body text-center">
        <div class="row justify-content-center">
          <div class="text-center"  style="margin-bottom: 5px;">
            <h1 class="text-login">Log in to Vue Black Dashboard Laravel PRO Live Preview</h1>
            <p class="text-lead text-login">Log in to see how you can save more than 300 hours of work with an
            integrated Laravel API backend and ready-made CRUDs for managing:
            #users, #roles, #items, #categories, #tags.</p>
          </div>

          <div class="text-login">
            <h3 class="text-login"><strong>You can log in with 3 user types:</strong></h3>
            <div>Username <b>admin@jsonapi.com</b> Password <b>secret</b></div>
            <div>Username <b>creator@jsonapi.com</b> Password <b>secret</b></div>
            <div>Username <b>member@jsonapi.com</b> Password <b>secret</b></div>
          </div>
        </div>
    </div>
  </div>
  <div class="container mt-3">
    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
      <form @submit.prevent="handleSubmit()">
        <card class="card-login card-white">
          <template slot="header">
            <img src="/img/card-primary.png" alt="" />
            <h1 class="card-title">Log in</h1>
          </template>

          <div>
            <ValidationProvider
              name="email"
              rules="required|email"
              v-slot="{ passed, failed, errors }"
            >
            <base-input
              required
              v-model="email"
              type="email"
              placeholder="Email"
              addon-left-icon="tim-icons icon-email-85"
              :error="errors[0]"
              :class="[{ 'has-success': passed }, { 'has-danger': failed }]">
            </base-input>
            <validation-error :errors="apiValidationErrors.email" />
            </ValidationProvider>

            <ValidationProvider
              name="password"
              rules="required|min:5"
              v-slot="{ passed, failed, errors }"
            >
            <base-input
              required
              v-model="password"
              placeholder="Password"
              addon-left-icon="tim-icons icon-lock-circle"
              type="password"
              :error="errors[0]"
              :class="[{ 'has-success': passed }, { 'has-danger': failed }]">
            </base-input>
            <validation-error :errors="apiValidationErrors.password" />
          </ValidationProvider>
          </div>

          <div slot="footer">
            <base-button native-type="submit" type="primary" class="mb-3" size="lg" block>
              Get Started
            </base-button>
            <div class="pull-left">
              <h6>
                <router-link class="link footer-link" to="/register">
                  Create Account
                </router-link>
              </h6>
            </div>

            <div class="pull-right">
              <h6><a href="/password/reset" class="link footer-link">Forgot Password?</a></h6>
            </div>
          </div>
        </card>
      </form>
      <!-- </ValidationObserver> -->
    </div>
  </div>
</div>
</template>
<script>

import { extend } from "vee-validate";
import { required, email, min } from "vee-validate/dist/rules";
import formMixin from "@/mixins/form-mixin";
import ValidationError from "@/components/ValidationError.vue";

extend("email", email);
extend("min", min);

extend("required", required);

export default {
  mixins: [formMixin],
  components: {
    ValidationError,
  },
  data() {
    return {
      email: "admin@jsonapi.com",
      password: "secret",
      subscribe: true
    };
  },
  methods: {
      async handleSubmit() {
        const user = {
          data: {
            type: "token",
            attributes: {
              email: this.email,
              password: this.password
            }
          }
        }

        const requestOptions = {
          headers: {
            'Accept': 'application/vnd.api+json',
            'Content-Type': 'application/vnd.api+json',
          }
        }

        try {
          await this.$store.dispatch("login", {user, requestOptions})
        } catch (e) {
          this.$notify({
            message:'Invalid credentials!',
            icon: 'tim-icons icon-bell-55',
            type: 'danger'
          });
          this.setApiValidation(e.response.data.errors)
        }
    }
  }
};
</script>
<style>
.navbar-nav .nav-item p {
  line-height: inherit;
  margin-left: 5px;
}
</style>
