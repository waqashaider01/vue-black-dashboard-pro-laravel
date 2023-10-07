# Progress

The progress bars from Bootstrap hold the same classes and functionality.
Adding this kit over your existing project will only make it look more clean and minimal.

<hr>
To use the custom radio buttons you need to import the custom made component:

```js
import {Progress} from 'src/components'
```

Global usage

```js
Vue.component(Progress.name)
```

For local usage
```js
export default {
  components: {
    [Progress.name]: Progress
  }
}
```

## Simple

:::demo
```html
<template>
 <div class="row">
  <div class="col-12">
  <base-progress :value="60"></base-progress>
</div>
 </div>
</template>

<script>
  export default {}
</script>
```
:::

## Colors

:::demo
```html
<template>
 <div>
  <base-progress :value="60" type="info"></base-progress>
  <base-progress :value="60" type="success"></base-progress>
  <base-progress :value="60" type="danger"></base-progress>
  <base-progress :value="60" type="warning"></base-progress>
  <base-progress :value="60" type="primary"></base-progress>
 </div>
</template>

<script>
  export default {}
</script>
<style>
 .progress{
   margin-top: 20px;
  }
</style>
```
:::

## With text

:::demo
```html
<template>
 <div style="height: 40px;">
  <base-progress :value="60" type="danger" show-value></base-progress>
 </div>
</template>

<script>
  export default {}
</script>
<style>
 .progress{
   margin-top: 20px;
  }
</style>
```
:::

## With label

:::demo
```html
<base-progress label="Label" :value="90" value-position="right" type="success" :height="15"></base-progress>
```
:::


### Progress Props
<props-table component-name="base-progress"/>

## Progress Slots
<slots-table :slots="[
          {name: 'default', description: 'Progress value slot. By default progress percentage is displayed here'}
          ]"/>

<style>
.progress {
  margin-top: 5px;
}
</style>
