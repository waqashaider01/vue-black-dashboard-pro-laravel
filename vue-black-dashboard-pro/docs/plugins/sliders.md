# Sliders

<hr>
We restyled [noUI Slider](https://refreshless.com/nouislider/) and gave it a fresh look.
We have a small Vue wrapper over it which makes it very easy to use it. 

To use it, import it from the components folder

```js
import {Slider} from 'src/components'
```
Global usage

```js
Vue.use(Slider)
```

For local usage
```js
export default {
  components: {
    Slider
  }
}
```

### Simple slider with v-model

You can specify one of the known types to customize the look and feel of the slider.
Type can be `default|primary|info|danger|warning`

:::demo
```html
<template>
  <slider v-model="sliderValue">
  </slider>
</template>

<script>
  export default {
    data() {
      return {
        sliderValue: 30
       }
    }
  }
</script>
```
:::

### Range slider

:::demo
```html
<template>
  <slider v-model="rangeSlider"
          type="primary"
          :connect="true">
  </slider>
</template>

<script>
  export default {
    data() {
      return {
        rangeSlider: [20, 50]
       }
    }
  }
</script>
```
:::

### With stops

:::demo
```html
<template>
  <slider v-model="sliderValue" 
            type="success"
            :options="{step: 10}"
            >
  </slider>
</template>

<script>
  export default {
    data() {
      return {
        sliderValue: 30
       }
    }
  }
</script>
```
:::

### Disabled

:::demo
```html
<template>
  <slider v-model="disabledSliderValue" 
          type="warning"
          disabled>
  </slider>
</template>

<script>
  export default {
    data() {
      return {
        disabledSliderValue: 50,
       }
    }
  }
</script>
```
:::

## Slider Props
<props-table component-name="slider"/>

:::tip
You can pass any [noUi Slider options](https://refreshless.com/nouislider/slider-options/) via the `options` prop. 
They might overwrite `start`, `connect` and `range` props if specified in the options object.
:::

For example, in this case: 
```html
<slider :range="{min: 10, max: 50}" :options="{range: {min: 20, max: 40}}"
``` 
The options object will overwrite the `range` prop in this case.

## Switch events
<events-table :events="[
  {name: 'input', description: 'triggers when the binding value changes', params: 'the updated value'}
]"/>


<script>
 export default {
    props: ['slot-key'],
    data() {
      return {
        sliderValue: 30,
        disabledSliderValue: 50,
        rangeSlider: [20, 50]
       }
    }
  }
</script>
