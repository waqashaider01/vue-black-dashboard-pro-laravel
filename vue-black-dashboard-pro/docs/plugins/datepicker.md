# Date & Time Pickers

<hr>

We have created a date-time picker starting from the element-ui date picker. We have changed the colours, typography and buttons, so it can look like the rest of the dashboard.

Please check out date-picker docs for detailed info as well as ExtendedForms.vue page to see some examples. Below is a very simple example
```js
import {DatePicker, TimeSelect} from 'element-ui'
```
Global usage
```js
Vue.use(DatePicker)
Vue.use(TimeSelect)
```

For local usage
```js
export default {
  components: {
    [DatePicker.name]: DatePicker,
    [TimeSelect.name]: TimeSelect
  }
}
```

### Date picker

Wrap the date-picker in a `base-input` component in order to have an input similar to the ones in the dashboard

:::demo
```html
<template>
  <base-input>
    <el-date-picker v-model="datePicker"
                    type="date"
                    placeholder="Pick a day">
      </el-date-picker>
  </base-input>
</template>

<script>
  export default {
    data() {
      return {
        datePicker: ''
       }
    }
  }
</script>
```
:::

### Time picker

:::demo
```html
<template>
  <base-input>
    <el-time-select
        v-model="timePicker"
        :picker-options="{
          start: '00:00',
          step: '00:15',
          end: '23:59'
        }"
        placeholder="Select time">
      </el-time-select>
  </base-input>
</template>

<script>
  export default {
    data() {
      return {
        timePicker: ''
       }
    }
  }
</script>
```
:::

### DateTime picker

:::demo
```html
<template>
  <base-input>
  <el-date-picker v-model="dateTimePicker"
                    type="datetime"
                    placeholder="Select date and time">
    </el-date-picker>
</base-input>
</template>

<script>
  export default {
    data() {
      return {
        dateTimePicker: ''
       }
    }
  }
</script>
```
:::


<script>
export default {
  props: ['slot-key'],
  data(){
    return {
      datePicker: '',
      timePicker: '',
      dateTimePicker: '',
      pickerOptions1: {
        shortcuts: [{
          text: 'Today',
          onClick (picker) {
            picker.$emit('pick', new Date())
          }
        },
        {
          text: 'Yesterday',
          onClick (picker) {
            const date = new Date()
            date.setTime(date.getTime() - 3600 * 1000 * 24)
            picker.$emit('pick', date)
          }
        },
        {
          text: 'A week ago',
          onClick (picker) {
            const date = new Date()
            date.setTime(date.getTime() - 3600 * 1000 * 24 * 7)
            picker.$emit('pick', date)
          }
        }]
      }
    }
  }
}
</script>
