<template>
  <v-row class="mt-2 pa-0">
    <v-col
      cols="2"
      offset="1">
      <label class="label-position">{{ $attrs.label }}</label>
    </v-col>
    <v-col
      :cols="columnSize">
      <v-radio-group
        v-bind="$attrs"
        v-on="$listeners">
        <v-radio
          v-for="(item, index) in items"
          :key="index"
          :label="item.label"
          :value="item.value" />
      </v-radio-group>
    </v-col>
  </v-row>
</template>

<script>
import { reactive } from '@vue/composition-api'
export default {
  props: {
    columnSize: {
      type: String,
      default: '4'
    },
    items: {
      type: Array,
      default: null,
    },
  },
  setup: () => {
    const data = reactive({
      radios: ''
    })
    return {
      data,
    }
  },
}
</script>

<style scoped>
.label-position {
  line-height: 3;
  font-weight: bold;
}
</style>
