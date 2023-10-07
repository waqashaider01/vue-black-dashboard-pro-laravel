# Validations

In order to validate fields, we used one of the most popular validations libraries for vue -  [Vee-Validate](http://vee-validate.logaretm.com/)
It has good documentation and it's pretty easy to use.


```js
import Vue from 'vue'
import VeeValidate from 'vee-validate'
Vue.use(VeeValidate)
```

For detailed usage please see [Vee Validate documentation](http://vee-validate.logaretm.com/index.html#installation)
We will go through the code from the **LoginForm.vue** from **Validation Forms** to understand how validations work.

Here is the full template for that specific component.

:::demo
```html
  <ValidationObserver v-slot="{ handleSubmit }">
    <form @submit.prevent="handleSubmit(submit)">
    <card title="Login Form">
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
          label="Email address"
          :error="errors[0]"
          :class="[{ 'has-success': passed }, { 'has-danger': failed }]">
        </base-input>
       </ValidationProvider>

       <ValidationProvider
         name="password"
         rules="required|min:5"
         v-slot="{ passed, failed, errors }"
       >
       <base-input
         required
         v-model="password"
         type="password"
         label="Password"
          :error="errors[0]"
         :class="[{ 'has-success': passed }, { 'has-danger': failed }]">
       </base-input>
      </ValidationProvider>
      </div>
      <div class="d-flex justify-content-center">
        <button type="submit" native-type="submit" class="btn btn-fill btn-info btn-wd">Login</button>
      </div>
    </card>
  </form>
  </ValidationObserver>
```
:::

The main things you need to notice are

1. Each field has a `name` attribute which will be the name of the validation property.
2. Each field has a `v-validate` attribute which will contain validation rules for that specific field.
3. Each field has a text block below the input displaying errors. (In case of `base-input` component the text block is displayed with the help of `error` prop)

The javascript for this template is the following

```js

import { extend } from "vee-validate";
import { required, email, min } from "vee-validate/dist/rules";
import { configure } from 'vee-validate';

extend("email", email);
extend("required", required);
extend("min", min);

    export default {
    props: ['slot-key'],
      data () {
        return {
          email: '',
          password: '',
          modelValidations: {
            email: {
              required: true,
              email: true
            },
            password: {
              required: true,
              min: 5
            }
          }
        }
      },
      methods: {
        submit() {
          alert("Form has been submitted!");
        }
      }
    }
```

Vee-validate basically works by linking `name` attributes and `v-validate` directives to an `errors` object which is injected
and available in each component.
You can check out [available validations](http://vee-validate.logaretm.com/index.html#available-rules) from vee-validate.


## Working example

:::demo
```html
<template>
  <ValidationObserver v-slot="{ handleSubmit }">
    <form @submit.prevent="handleSubmit(submit)">
    <card title="Login Form">
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
          label="Email address"
          :error="errors[0]"
          :class="[{ 'has-success': passed }, { 'has-danger': failed }]">
        </base-input>
       </ValidationProvider>

       <ValidationProvider
         name="password"
         rules="required|min:5"
         v-slot="{ passed, failed, errors }"
       >
       <base-input
         required
         v-model="password"
         type="password"
         label="Password"
          :error="errors[0]"
         :class="[{ 'has-success': passed }, { 'has-danger': failed }]">
       </base-input>
      </ValidationProvider>
      </div>
      <div class="d-flex justify-content-center">
        <button type="submit" native-type="submit" class="btn btn-fill btn-info btn-wd">Login</button>
      </div>
    </card>
  </form>
  </ValidationObserver>
</template>
<script>

import { extend } from "vee-validate";
import { required, email, min } from "vee-validate/dist/rules";
import { configure } from 'vee-validate';

extend("email", email);
extend("required", required);
extend("min", min);

    export default {
    props: ['slot-key'],
      data () {
        return {
          email: '',
          password: '',
          modelValidations: {
            email: {
              required: true,
              email: true
            },
            password: {
              required: true,
              min: 5
            }
          }
        }
      },
      methods: {
        submit() {
          alert("Form has been submitted!");
        }
      }
    }
</script>
<style>
</style>

```
:::


You can check more examples inside **src/components/Dashboard/Forms/ValidationForms/**
There are some forms which have validations declared in a similar way

<script>

import { extend } from "vee-validate";
import { required, email, min } from "vee-validate/dist/rules";
import { configure } from 'vee-validate';

extend("email", email);
extend("required", required);
extend("min", min);

    export default {
    props: ['slot-key'],
      data () {
        return {
          email: '',
          password: '',
          modelValidations: {
            email: {
              required: true,
              email: true
            },
            password: {
              required: true,
              min: 5
            }
          }
        }
      },
      methods: {
        submit() {
          alert("Form has been submitted!");
        }
      }
    }
</script>
