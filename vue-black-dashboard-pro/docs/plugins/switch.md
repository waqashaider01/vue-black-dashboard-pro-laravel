# Switch

<hr>
To use the switch component, first import it:
```js
import {BaseSwitch} from 'src/components'
```
Global usage
```js
Vue.component(BaseSwitch.name, BaseSwitch)
```

For local usage
```js
export default {
  components: {
    BaseSwitch
  }
}
```

## Simple switch

:::demo
```html
<template>
  <div>
    <base-switch v-model="switches.defaultOn"></base-switch>
    <base-switch v-model="switches.defaultOff"></base-switch>
  </div>
</template>

<script>
  export default {
    data () {
        return {
           switches: {
             defaultOn: true,
             defaultOff: false
           }
        }
      }
  }
</script>
```
:::

## With text

:::demo
```html
</desc>
<template>
  <div>
    <base-switch v-model="switches.defaultOn" on-text="ON" off-text="OFF"></base-switch>
    <base-switch v-model="switches.defaultOff" on-text="ON" off-text="OFF"></base-switch>
  </div>
</template>

<script>
  export default {
    data () {
        return {
           switches: {
             defaultOn: true,
             defaultOff: false
           }
        }
      }
  }
</script>
```
:::

### Slots

:::demo
```html
<template>
  <div>
  <base-switch v-model="switches.defaultOn">
    <i class="fa fa-check" slot="on"></i>
    <i class="fa fa-exclamation" style="color:red;" slot="off"></i>
  </base-switch>
  </div>
</template>

<script>
  export default {
    data () {
        return {
           switches: {
             defaultOn: true
           }
        }
      }
  }
</script>
```
:::

<script>
  export default {
    props: ['slot-key'],
    data () {
        return {
           switches: {
             defaultOn: true,
             defaultOff: false
           }
        }
      }
  }
</script>

## Switch Props
<props-table component-name="base-switch"/>

## Switch events
<events-table :events="[
  {name: 'input', description: 'triggers when the binding value changes', params: 'the updated value'}
]"/>

## Switch Slots
<slots-table :slots="[
          {name: 'on', description: 'Content to be displayed on switch when switch is on'},
          {name: 'off', description: 'Content to be displayed on switch when switch is off'}
          ]"/>
