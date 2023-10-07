# File upload

We created a small custom component that let's you upload & preview images.
It is very handy for avatar uploads & profile picture uploads.
 
```js
import {ImageUpload} from 'src/components'
```

Global usage

```js
Vue.component(ImageUpload.name, ImageUpload)
```

For local usage

```js
export default {
  components: {
    ImageUpload
  }
}
```


## Regular image

:::demo
```html
<template>
<div>
  <image-upload @change="onImageChange" select-text="Select Image" />  
</div>
</template>
<script>
export default {
  data() {
    return {
      images: {
        regular: null
      }
    }
  },
  methods: {
     onImageChange(file) {
        this.images.regular = file;
      }
  }
}
</script>
```
:::

:::demo
```html
<template>
<div>
   <image-upload
      type="avatar"
      select-text="Add photo"
      @change="onAvatarChange">
   </image-upload>
</div>
</template>
<script>
export default {
  data() {
    return {
      images: {
        avatar: null
      }
    }
  },
  methods: {
     onAvatarChange(file) {
      this.images.avatar = file;
     }
  }
}
</script>

```
:::

## With predefined image
:::demo
```html
<div>
  <image-upload
        type="avatar"
        src="/img/emilyz.jpg"
        select-text="Add photo">
     </image-upload>
</div>
```
:::

<script>
export default {
  props: ['slot-key'],
  data() {
    return {
      images: {
        regular: null,
        avatar: null
      }
    }
  },
  methods: {
     onImageChange(file) {
        this.images.regular = file;
      },
      onAvatarChange(file) {
        this.images.avatar = file;
      }
  }
}
</script>


## Image upload Props
<props-table component-name="image-upload"/>

## Image upload Slots
<events-table :events="[
          {name: 'change', description: 'When selected file changes', params: 'Uploaded file'}
          ]"/>
